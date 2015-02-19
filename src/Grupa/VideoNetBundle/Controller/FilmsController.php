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
		} 
		else if ($category == "hits") {
			$where = array('isHit' => '1');
		} 
		else {
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
			
		$link = $_SERVER["SCRIPT_NAME"];
		$categories = $em->getRepository('GrupaVideoNetBundle:MovieCategory')->findAll();
			
		return $this->render(
			'GrupaVideoNetBundle:Films:films.index.html.twig',
			array (
				'movies' => $movies,
				'categories' => $categories,
				'link' => $link,
				'category' => $category,
				'sort' => $sort,
				'direction' => $direction,
				'page' => $page
			)
		);
    }
	
	public function filmsViewAction($id) {
		$link = $_SERVER["SCRIPT_NAME"];
		$session = new Session();
		
		$reviewInfo = $session->get("reviewInfo");
			if($reviewInfo == 1) {
				$session->set("reviewInfo", 0);
			} else { $reviewInfo = 0; }
		
		$em = $this->getDoctrine()->getManager();
		$movie = $em->getRepository('GrupaVideoNetBundle:Movie')->find($id);
		$movie_id = $movie->getId();
		
		$reviews = $em->getRepository('GrupaVideoNetBundle:Review')->findBy(
				   array('movie' => $movie),
				   array('reviewTime' => 'ASC' ),
				   5,
				   0
			);;
		
		return $this->render(
			'GrupaVideoNetBundle:Films:films.view.html.twig',
			array (
				'link' => $link,
				'movie' => $movie,
				'reviews' => $reviews,
				'reviewInfo' => $reviewInfo
			)
		);
    }
	
	
	public function myMoviesAction() {
		
		return $this->render(
			'GrupaVideoNetBundle:Films:myMovies.html.twig',
			array (
				
			)
		
	}
	
	
	public function watchAction($id) {
		
		return $this->render(
			'GrupaVideoNetBundle:Films:watch.html.twig',
			array (
				
			)
		
	}
}
