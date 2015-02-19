<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Grupa\VideoNetBundle\Entity\Orders;
use Grupa\VideoNetBundle\Entity\User;
use Grupa\VideoNetBundle\Entity\Movie;
use Symfony\Component\Security\Core\Exception;
use Grupa\VideoNetBundle\Entity;

class OrdersController extends Controller {

	public function ordersAction() {
		$link = $_SERVER["SCRIPT_NAME"];
		$em = $this->getDoctrine()->getManager();
		$user = $this->getUser();
		$orders ="";
		if(!empty($user)) {
			$user = $this->getUser()->getId();
			$orders = $em->getRepository('GrupaVideoNetBundle:Orders')->findByUser($user);
		}
		return $this->render(
			'GrupaVideoNetBundle:Orders:orders.html.twig',
			array(
				'link' => $link,
				'orders' => $orders
			)
		);
		
	}
	
	public function orderAction($id) {
		$link = $_SERVER["SCRIPT_NAME"];
		$em = $this->getDoctrine()->getManager();
		$order = $em->getRepository('GrupaVideoNetBundle:Orders')->find($id);
		
		return $this->render(
			'GrupaVideoNetBundle:Orders:order.html.twig',
			array(
				'link' => $link,
				'order' => $order
			)
		);
		
	}
	
	
	public function ordersAddAction() {
		$link = $_SERVER["SCRIPT_NAME"];
		$session = new Session();
		$cart = $session->get('cart');
		
		try {
			if(!empty($cart) || null !== $cart) {
				$user = $this->getUser();
				$orders = new Orders();
				$orders->setUser($user);
				$em = $this->getDoctrine()->getManager();
				$em->persist($orders);
				$em->flush();
				
				foreach($cart as $id) {
					$movie = $em->find('\Grupa\VideoNetBundle\Entity\Movie', $id);
					$orders->getMovies()->add($movie);
					$movie->getOrder()->add($orders);
					$em->flush();
				}
				
				$cart = $session->set('cart', null);
				$items = $session->set('items', null);
				$session->getFlashBag()->add('orderInsertStatus', "1");
			} else {
				$session->getFlashBag()->add('orderInsertStatus', "2");
			}
		} catch(Exception $e) {
			$session->getFlashBag()->add('orderInsertStatus', "3");
		}		
		$orderInsertStatus = $session->getFlashBag()->get('orderInsertStatus');

		return $this->render(
			'GrupaVideoNetBundle:Orders:orders.add.html.twig',
			array(
				'link' => $link,
				'orderInsertStatus' => $orderInsertStatus
			)
		);
	}
	
	public function cartAction() {
		$link = $_SERVER["SCRIPT_NAME"];
		$session = new Session();
		
		$cart = $session->get('cart');
		
		if(!empty($cart) || null !== $cart) {
			foreach($cart as $item) {
				$em = $this->getDoctrine()->getManager();
				$items[] = $em->getRepository('GrupaVideoNetBundle:Movie')->findOneById($item);
			}
		}
		
		if(isset($items)) {
			$session->set('items', $items);
		} else {
			$items = null;
		}
		
		return $this->render(
			'GrupaVideoNetBundle:Orders:cart.html.twig',
			array(
				'link' => $link,
				'items' => $items
			)
		);
	}
	
	public function cartAddAction(Request $request) {
		$link = $_SERVER["SCRIPT_NAME"];
		$session = new Session();
		
		if ($request->isMethod('POST')) {
			$cart = $session->get("cart");
			
			if(empty($cart) || null === $cart) {
				$cart = array();
				$session->set('cart', $cart);
			}
			$response = "";
			$cart = $session->get('cart');
			$movie_id = $this->get('request')->request->get('movie_id');
			$movie_name = $this->get('request')->request->get('movie_name');
			if (in_array($movie_id, $cart)) {
				$response = array("status" => 0, "link" => $link);
			} else {
				$cart[] = $movie_id;
				$session->set('cart', $cart);
				$response = array("status" => 1, "link" => $link);
			}
		}
		return new JsonResponse($response); 
	}
	
	public function cartRemoveAction(Request $request) {
		$link = $_SERVER["SCRIPT_NAME"];
		$session = new Session();
		
		if ($request->isMethod('POST')) {	
			$items = $session->get('items');
			$position = $this->get('request')->request->get('movie_id');
			unset($items[$position]);
			$session->set('cart', $items);
			$session->set('items', $items);
		}
		$response = array("cart" => "Mniej o jeden");
		return new JsonResponse($response); 
	}
}	