<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /* @var Request */
    protected $request;

    public function preExecute(Request $request) {
        $this->request = $request;
    }

    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
}
