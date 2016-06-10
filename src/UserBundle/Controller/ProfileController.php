<?php


namespace UserBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use UserBundle\Entity\User;
use UserBundle\Form\UserEditType;


class ProfileController extends BaseController
{

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
