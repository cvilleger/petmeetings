<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PremiumController extends Controller
{
    public function subscribeAction()
    {
        $user = $this->getUser();
        $user->setStatus("premium");
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->render('AppBundle:Premium:subscribe.html.twig');
    }

    public function unsubscribeAction()
    {
        $user = $this->getUser();
        $user->setStatus("classic");
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->render('AppBundle:Premium:unsubscribe.html.twig');
    }
}