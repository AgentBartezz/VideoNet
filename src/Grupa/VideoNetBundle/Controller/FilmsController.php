<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class FilmsController extends Controller
{
    public function filmsIndexAction() {
		return $this->render(
			'GrupaVideoNetBundle:Films:films.index.html.twig',
			array (
				'var1' => 'jeden',
				'var2' => 'dwa',
			)
		);
    }
	
	public function filmsViewAction() {
		return $this->render(
			'GrupaVideoNetBundle:Films:films.view.html.twig',
			array (
				'var1' => 'jeden',
				'var2' => 'dwa',
			)
		);
    }
}
