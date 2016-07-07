<?php
namespace UserBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use UserBundle\Entity\User;
use UserBundle\Entity\Animal;
use UserBundle\Form\RegistrationFormType;
use AppBundle\Service\UploadService;


class RegistrationController extends BaseController
{
    /** @var UploadService uploadService */
    private $uploadService;
    /** @var  Request $request */
    private $request;

    /**
     * @param Request $request
     */
    public function preExecute(Request $request)
    {
        $this->uploadService = $this->container->get('UploadService');
        $this->request = $request;
    }
    
    public function registerAction(Request $request)
    {
        $user = new User();
        $user->setEnabled(true);
        $animal = new Animal();
        $user->setAnimal($animal);

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
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

        return $this->render('UserBundle:Registration:register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}