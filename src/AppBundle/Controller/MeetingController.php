<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\MeetingService;
use UserBundle\Entity\User;

class MeetingController extends Controller {
    protected $meetingService;

    public function preExecute(){
        /** @var MeetingService meetingService */
        $this->meetingService = $this->container->get('MeetingService');
    }

    public function sendWoofAction(User $user) {
        $sender = $this->getUser();
        if(isset($sender))
            $this->meetingService->giveWoof($sender, $user);

        return $this->redirect($this->generateUrl('user_find', array('id' => $user->getId())));
    }

    public function answerWoofAction(User $user) {
        $sender = $this->getUser();
        if(isset($sender))
            $this->meetingService->answerWoof($user, $sender);

        return $this->redirect($this->generateUrl('fos_user_profile_show'));
    }
}