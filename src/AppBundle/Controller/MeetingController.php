<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

class MeetingController extends Controller {
    public function sendWoofAction(User $user) {
        $sender = $this->getUser();
        if($sender->getLikesleft() < 1)
            return $this->render('AppBundle:Meeting:becomePremium.html.twig');
        $user->receiveLike($sender);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->persist($sender);
        $em->flush();

        return $this->redirect($this->generateUrl('user_find', array('id' => $user->getId())));
    }
}