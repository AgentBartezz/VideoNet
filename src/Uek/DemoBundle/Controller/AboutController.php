<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bhelak\Components\About\Repository\FeedRepository;

class AboutController extends Controller
{
    public function aboutAction() {
        return $this->render(
			'UekDemoBundle:About:about.html.twig',
			array (
				'name' => 'BH',
				'date' => new \Datetime('1991-11-11')
			)
		);
    }
}
