<?php


namespace UserBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use AppBundle\Service\PremiumService;


class SecurityController extends BaseController
{
    /* @var Request */
    protected $request;
    protected $premiumService;

    public function preExecute(Request $request) {
        $this->request = $request;
        /** @var PremiumService premiumService */
        $this->premiumService = $this->container->get('PremiumService');
        $user = $this->getUser();
        if(isset($user)) {
            if($user->getLastLogin()->format('Y-m-d') == date('Y-m-d')) {
                // Give privileges of the day
                if ($user->getLastLogin()->getDay() != new \DateTime())
                    $this->premiumService->receiveWoof($user);
            }

        }
    }
}
