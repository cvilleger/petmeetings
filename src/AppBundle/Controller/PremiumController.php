<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\PremiumService;


class PremiumController extends Controller
{
    protected $premiumService;

    public function preExecute(){
        /** @var PremiumService premiumService */
        $this->premiumService = $this->container->get('PremiumService');
    }

    public function viewAction()
    {
        return $this->render('AppBundle:Premium:offers.html.twig');
    }

    public function subscribeAction($offer)
    {
        $this->premiumService->changeStatus($this->getUser(), $offer);
        $this->premiumService->receiveWoof($this->getUser());

        return $this->render('AppBundle:Premium:subscribe.html.twig');
    }

    public function unsubscribeAction()
    {
        $this->premiumService->changeStatus($this->getUser(), "classic");

        return $this->render('AppBundle:Premium:unsubscribe.html.twig');
    }
}