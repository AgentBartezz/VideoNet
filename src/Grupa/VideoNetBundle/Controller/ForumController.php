<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class ForumController extends Controller
{
    public function forumIndexAction() {
		return $this->render(
			'GrupaVideoNetBundle:Forum:forum.index.html.twig',
			array (
				'var1' => 'jeden',
				'var2' => 'dwa',
			)
		);
    }
	
	public function forumViewAction() {
		return $this->render(
			'GrupaVideoNetBundle:Forum:forum.view.html.twig',
			array (
				'var1' => 'jeden',
				'var2' => 'dwa',
			)
		);
    }
}