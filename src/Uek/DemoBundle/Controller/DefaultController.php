<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
		$this->get('session')->set('my_name', $name);
		
        return $this->render('UekDemoBundle:Default:index.html.twig', array('name' => $name));
    }
}