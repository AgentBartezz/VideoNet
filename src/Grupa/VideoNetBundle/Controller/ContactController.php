<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class ContactController extends Controller
{
    public function contactAction() {
		$name = '';
		$this->get('session')->set('name', $name);
		$link = $_SERVER["SCRIPT_NAME"];

		// set and get session attributes
			return $this->render(
			'GrupaVideoNetBundle:Contact:contact.html.twig',
			array (
				'var1' => 'jeden',
				'var2' => 'dwa',
				'var3' => $name,
				'link' => $link
			)
		);
    }
}
