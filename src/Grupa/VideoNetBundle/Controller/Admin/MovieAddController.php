<?php

namespace Grupa\VideoNetBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Grupa\VideoNetBundle\Entity\Movie;
use Grupa\VideoNetBundle\Form\MovieType;
use Symfony\Component\HttpFoundation\Request;


class MovieAddController extends Controller 
{
	
    public function movieAddAction(Request $request) {
		$movie = new Movie();
		$form = $this->createForm(
			new MovieType(),
			$movie
		);
		
		
		if ($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($movie);
			$em->flush();
		}
		
		return $this->render(
		'GrupaVideoNetBundle:Admin\Movie:movie.add.html.twig',
			array(
				'form' => $form->createView()
			)
		);
    }
}
