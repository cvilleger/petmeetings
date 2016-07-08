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
		$user = $this->get('security.token_storage')->getToken()->getUser();

		$listUsers = $this->getDoctrine()
		->getManager()
		->getRepository('UserBundle:User')
		->findBy(
			array(),
			array('startsub' => 'asc'),
			array('limit' => 3)
			);

		return $this->render('AppBundle:Default:index.html.twig', array(
			'listUsers' => $listUsers,
			'user' => $user
			));
	}
}
