<?php

namespace Grupa\VideoNetBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Grupa\VideoNetBundle\Entity\Movie;
use Grupa\VideoNetBundle\Form\MovieType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;


class MovieController extends Controller 
{
	public function moviesAction(Request $request, $page) {
		
		if(!isset($page)||(!is_numeric($page))) {
			$page = 1;
		}
		
		$offset = ($page - 1) * 20;
		$em = $this->getDoctrine()->getManager();
		$movies = $em->getRepository('GrupaVideoNetBundle:Movie')
			->findBy(
				   array(),
				   array( 'name' => 'DESC' ),
				   20,
				   $offset
			);
		
		
		
		$link = $_SERVER["SCRIPT_NAME"];
		return $this->render(
		'GrupaVideoNetBundle:Admin\Movie:movies.html.twig',
			array(
				'movies' => $movies,
				'link' => $link,
				'page' => $page
			)
		);
	}
	
	public function movieEditAction(Request $request, $id) {
		$link = $_SERVER["SCRIPT_NAME"];
		$em = $this->getDoctrine()->getManager();
		$movie = $em->getRepository('GrupaVideoNetBundle:Movie')->find($id);
		
		$form = $this->createForm(
			new MovieType(),
			$movie
		);
		
		if ($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->flush();
		}
		
		return $this->render(
		'GrupaVideoNetBundle:Admin\Movie:movie.edit.html.twig',
			array(
				'form' => $form->createView(),
				'movie' => $movie,
				'link' => $link
			)
		);
	}
	
	public function movieUpdateAction(Request $request, $id) {
		$link = $_SERVER["SCRIPT_NAME"];
		$em = $this->getDoctrine()->getManager();
		
		$form = $this->createForm(
			new MovieType(),
			$movie
		);
		
		return $this->render(
		'GrupaVideoNetBundle:Admin\Movie:movie.edit.html.twig',
			array(
				'form' => $form->createView(),
				'movie' => $movie,
				'link' => $link
			)
		);
	}
	
    public function movieAddAction(Request $request) {
		$link = $_SERVER["SCRIPT_NAME"];
		
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
				'form' => $form->createView(),
				'link' => $link
			)
		);
    }
}
