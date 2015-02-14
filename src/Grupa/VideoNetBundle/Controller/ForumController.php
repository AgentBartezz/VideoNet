<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class ForumController extends Controller
{
    public function forumIndexAction() {
		$link = $_SERVER["SCRIPT_NAME"];
		
		$em = $this->getDoctrine()->getManager();
		$categories = $em->getRepository('GrupaVideoNetBundle:ForumCategory')->findAll();
		
		return $this->render(
			'GrupaVideoNetBundle:Forum:forum.index.html.twig',
			array (
				'link' => $link,
				'categories' => $categories
			)
		);
    }
	
	
	
	public function forumSectionAction($section_id, $page) {
		$link = $_SERVER["SCRIPT_NAME"];
		
		if(!isset($page)||(!is_numeric($page))) {
			$page = 1;
		} 
		$offset = ($page - 1) * 10;
		
		$em = $this->getDoctrine()->getManager();
		$section = $em->getRepository('GrupaVideoNetBundle:ForumSection')->find($section_id);
		
		return $this->render(
			'GrupaVideoNetBundle:Forum:forum.section.html.twig',
			array (
				'link' => $link,
				'section' => $section
			)
		);
    }
	
	public function forumTopicAction($section_id, $topic_id, $page) {
		$link = $_SERVER["SCRIPT_NAME"];
		
		if(!isset($page)||(!is_numeric($page))) {
			$page = 1;
		} 
		$offset = ($page - 1) * 10;
		
		$em = $this->getDoctrine()->getManager();
		$topic = $em->getRepository('GrupaVideoNetBundle:ForumTopic')->find($topic_id);
		
		$section = $topic->getSection()->getId();
		$section = $em->getRepository('GrupaVideoNetBundle:ForumSection')->find($section);
		$category = $section->getCategory()->getName();
		$section = $section->getName();
		
		return $this->render(
			'GrupaVideoNetBundle:Forum:forum.topic.html.twig',
			array (
				'topic' => $topic,
				'link' => $link,
				'section' => $section,
				'category' => $category
			)
		);
    }
}