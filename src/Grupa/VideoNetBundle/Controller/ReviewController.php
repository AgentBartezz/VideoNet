<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Grupa\VideoNetBundle\Form\ReviewType;
use Symfony\Component\HttpFoundation\Request;
use Grupa\VideoNetBundle\Entity\Movie;
use Grupa\VideoNetBundle\Entity\Review;


class ReviewController extends Controller  {
	
	public function reviewAddAction(Request $request, $id) {
		$link = $_SERVER["SCRIPT_NAME"];
		$em = $this->getDoctrine()->getManager();
		$movie = $em->getRepository('GrupaVideoNetBundle:Movie')->find($id);
		$review = new Review();
		$user = $this->getUser();
		$review->setUser($user);
		$review->setMovie($movie);
		$form = $this->createForm(
			new ReviewType(),
			$review
		);
		
		$session = new Session();
		$session->set("reviewInfo", 0);
		
		if ($request->isMethod('POST') && $form->handleRequest($request) && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($review);
			$em->flush();
			
			$session->set("reviewInfo", 1);
			return $this->redirect($this->generateUrl('grupa_video_net_films_view', array('id' => $id)), 301);
		}
		
		return $this->render(
			'GrupaVideoNetBundle:Review:review.add.html.twig',
			array (
				'movie' => $movie,
				'link' => $link,
				'form' => $form->createView()
			)
		);
	}
	
	
}