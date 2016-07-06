<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MailingController extends Controller
{
	/* @var Request */
	protected $request;

	public function preExecute(Request $request) {
		$this->request = $request;
	}

	public function accessAction()
	{

		return $this->render('AppBundle:Mailing:home.html.twig');
	}
}
