<?php

namespace AppBundle\Controller;

use AppBundle\Form\AdvancedSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\SearchService;
use UserBundle\Entity\UserRepository;

class SearchController extends Controller
{
    protected $searchService;

    public function preExecute(){
        /** @var SearchService searchService */
        $this->searchService = $this->container->get('SearchService');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchAction(Request $request)
    {
        $param = strtolower($request->get('slug'));
		$locale = 'fr';

			$em = $this->getDoctrine()->getManager();
			/** @var UserRepository $repository */
			$userRepository = $em->getRepository('UserBundle:User');
			$listUsers = $userRepository->findUsersByOneParameter($param);

			// Remove current user
			// unset($listUsers[array_search($this->getUser(), $listUsers)]); @Todo Not Working, ça efface tout

		return $this->render('AppBundle:Search:result.html.twig', array(
				'listUsers' => $listUsers,
				'locale' => $locale
		    ));
	}

		/**
		 * @param Request $request
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function advancedSearchAction(Request $request)
		{
			$form = $this->createForm(AdvancedSearchType::class);

        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') {
            if ($form->isValid()) {
                $listData = $this->searchService->cleanArray($form->getData());
                $listUsers = $this->searchService->findUsersByParameters($listData);
                $listUsers = $this->searchService->removeCurrentUser($this->getUser(), $listUsers);

					return $this->render('AppBundle:Search:result.html.twig', array(
						'listUsers' => $listUsers
						));
				}
			}

        return $this->render('AppBundle:Search:advancedSearch.html.twig', array(
            'form' => $form->createView()
        ));
    }
}