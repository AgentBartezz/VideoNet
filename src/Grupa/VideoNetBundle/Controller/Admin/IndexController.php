<?php

namespace Grupa\VideoNetBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller {

	public function indexAction() {
		$link = $_SERVER["SCRIPT_NAME"];
		return $this->render(
			'GrupaVideoNetBundle:Admin\Index:index.html.twig',
			array(
				'link' => $link,
			)
		);	
	}
}