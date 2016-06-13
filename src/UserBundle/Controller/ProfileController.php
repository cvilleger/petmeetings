<?php


namespace UserBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use UserBundle\Entity\User;
use UserBundle\Form\UserEditType;
use AppBundle\Service\UploadService;


class ProfileController extends BaseController
{
    /** @var UploadService uploadService */
    private $uploadService;
    /** @var  Request $request */
    private $request;

    /**
     * @param Request $request
     */
    public function preExecute(Request $request){
        $this->uploadService = $this->container->get('UploadService');
        $this->request = $request;
    }

    public function findAction(User $user)
    {
        $locale = 'fr';

        return $this->render('UserBundle:Profile:profile.html.twig', array(
            'user' => $user,
            'locale' => $locale
        ));
    }
    public function showAction()
    {
        $user = $this->getUser();
        $locale = 'fr';

        return $this->render('UserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'locale' => $locale
        ));
    }

    public function editAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(UserEditType::class, $user);

        $form->handleRequest($request);
        if($form->isValid()) {
            $file = $form->get('picture')->getData();
            $fileAnimal = $form->get('animal')->get('picture')->getData();

            if(!empty($file)) {
                $uniqueFileName = $this->uploadService->uploadFile($file);
                $user->setPictureName($uniqueFileName);
            }
            if(!empty($fileAnimal)) {
                $uniqueFileNameAnimal = $this->uploadService->uploadFile($file);
                $user->getAnimal()->setPictureName($uniqueFileNameAnimal);
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return $this->render('UserBundle:Profile:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
