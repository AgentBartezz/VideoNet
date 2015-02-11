<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;


class ProfileViewController extends Controller {
	public function profileViewAction($id)
	{
		$user = $this->getDoctrine()
			->getRepository('GrupaVideoNetBundle:User')
			->find($id);
			
		if (!$user) {
			throw $this->createNotFoundException(
				'No user found for id '.$id
			);
		}
		
		return $this->render(
			'GrupaVideoNetBundle:Profile:view.html.twig',
			array (
				'user' => array(
					'username'=> $user->getUsername(),
					'id'=> $user->getId(),
					'email'=> $user->getEmail(),
					'roles' => $user->getRoles(),
					'avatar' => $user->getAvatar()
				)
			)
		);
	}
}