<?php

namespace AppBundle\Controller;

use AppBundle\Form\AdvancedSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends Controller
{
    public function searchAction(Request $request)
    {
        $param = $request->get('search');

        $listUsers = $this
            ->getDoctrine()
            ->getRepository('UserBundle:User')
            ->findBy(array('username'=>$param));

        return $this->render('AppBundle:Search:result.html.twig', array(
            'listUsers' => $listUsers
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
                $em = $this->getDoctrine()->getManager();
                $data = $form->getData();
                // On initialise la liste de résultats
                $listResults = array();
                foreach($data as $key => $value) {
                    if(!empty($value)) {
                        if (is_array($value)) {
                            foreach ($value as $v) {
                                $listUsers = $em
                                    ->getRepository('UserBundle:User')
                                    ->findBy(array($key => $v));

                                // On ajoute chaque nouvelle liste d'utilisateurs dans la liste de résultats
                                $listResults = array_merge($listResults, $listUsers);
                            }
                        }
                        else {
                            $listUsers = $em
                                ->getRepository('UserBundle:User')
                                ->findBy(array($key => $value));

                            // On ajoute chaque nouvelle liste d'utilisateurs dans la liste de résultats
                            $listResults = array_merge($listResults, $listUsers);
                        }
                    }
                }

                return $this->render('AppBundle:Search:result.html.twig', array(
                    'listUsers' => $listResults
                ));
            }
        }

        return $this->render('AppBundle:Search:advancedSearch.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
