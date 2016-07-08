<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\MeetingService;
use UserBundle\Entity\User;
use AppBundle\Entity\AcceptedWoof;
use AppBundle\Entity\Mail;
use AppBundle\Form\WriteMailType;

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

    public function answerWoofAction(User $user, $answer) {
        $sender = $this->getUser();
        if(isset($sender))
            $this->meetingService->answerWoof($user, $sender, $answer);

        return $this->redirect($this->generateUrl('fos_user_profile_show'));
    }

    public function accessAction()
    {
        $listAcceptedWoof = $this
            ->getDoctrine()
            ->getRepository('AppBundle:AcceptedWoof')
            ->findBy(array('currentUser' => $this->getUser()));
        $listWoofSend = $this
            ->getDoctrine()
            ->getRepository('AppBundle:AcceptedWoof')
            ->findBy(array('acceptedUser' => $this->getUser()));

        return $this->render('AppBundle:Mailing:home.html.twig', array(
            'listAcceptedWoof' => $listAcceptedWoof,
            'listWoofSend' => $listWoofSend
        ));
    }

    public function writeAction(AcceptedWoof $acceptedWoof, Request $request)
    {
        $mail = new Mail();
        $form = $this->createForm(WriteMailType::class, $mail);

        $form->handleRequest($request);
        if($form->isValid()) {
            $this->meetingService->saveMail($acceptedWoof, $mail);
        }

        return $this->render('AppBundle:Mailing:write.html.twig', array(
            'form' => $form->createView(),
            'acceptedWoof' => $acceptedWoof
        ));
    }
}