<?php


namespace UserBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\ProfileController as BaseController;
use UserBundle\Entity\User;
use UserBundle\Form\UserEditType;


class ProfileController extends BaseController
{

    public function showAction()
    {
        $user = $this->getUser();
        $animal = $user->getAnimal();
        $locale = 'fr';

        return $this->render('UserBundle:Profile:show.html.twig', array(
            'user' => $user,
            'animal' => $animal,
            'locale' => $locale
        ));
    }

    public function editAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(UserEditType::class, $user);

        $form = $this->handleRequest($request);
        return $this->render('UserBundle:Profile:edit.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
