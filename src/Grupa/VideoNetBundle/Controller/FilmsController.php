<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class FilmsController extends Controller
{
    public function filmsIndexAction($category, $sort, $direction, $page) {
		
		if(!isset($page)||(!is_numeric($page))) {
			$page = 1;
		}
		
		if($category == "all") {
			$where = array();
		} else {
			$category = str_replace("_", " ", $category);
			$where = array('category' => $category);
		}
		$offset = ($page - 1) * 10;
		$em = $this->getDoctrine()->getManager();
		$movies = $em->getRepository('GrupaVideoNetBundle:Movie')
			->findBy(
				   $where,
				   array( $sort => $direction ),
				   10,
				   $offset
			);
			
		$categories = $em->getRepository('GrupaVideoNetBundle:MovieCategory')->findAll();	
			
		return $this->render(
			'GrupaVideoNetBundle:Films:films.index.html.twig',
			array (
				'movies' => $movies,
				'categories' => $categories
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
