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

		if($user && $user != 'anon.') {
	// rencontre homo ou hetero ?

			$user->getGender() == 'choice.user.gender.1' ? $other = 'choice.user.gender.2' : $other ='choice.user.gender.1' ;

			if( $user->getOrientation() == 'choice.user.orientation.2')
				$other =  $user->getGender() ;
			else
				$user->getGender() == 'choice.user.gender.1' ? $other = 'choice.user.gender.2' : $other ='choice.user.gender.1' ;


			$condition = array('orientation' => $user->getOrientation(), 'gender' => $other);

			$listUsers = $this->getDoctrine()
			->getManager()
			->getRepository('UserBundle:User')
			->findBy(
				$condition,
				array('id' => 'desc'),
				3
				);

		}
		else {
			$listUsers = $this->getDoctrine()
			->getManager()
			->getRepository('UserBundle:User')
			->findBy(
				array(),
				array('id' => 'desc'),
				3
				);

		}


		return $this->render('AppBundle:Default:index.html.twig', array(
			'listUsers' => $listUsers,
			'user' => $user
			));
	}
}
