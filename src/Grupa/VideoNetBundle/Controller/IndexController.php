<?php

namespace Grupa\VideoNetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class IndexController extends Controller
{
    public function indexAction() {
		$link = $_SERVER["SCRIPT_NAME"];
		$session = new Session();
		
		$path = $session->get('path');
		
		if($path == 1) {
			return $this->redirect($this->generateUrl('grupa_video_net_cart'));
		}
		
		$em = $this->getDoctrine()->getManager();
		$lastAdded = $em->getRepository('GrupaVideoNetBundle:Movie')->findBy(
			array(),
			array('addedAt' => 'DESC'),
			10,
			0
		);
		
		$query = $em->createQuery('SELECT r as rev, m, COUNT(r) as amount FROM Grupa\VideoNetBundle\Entity\Review r JOIN r.movie m GROUP BY r.movie ORDER BY amount DESC')->setMaxResults(5);
		$mostRev = $query->getResult();
		
		$query = $em->createQuery('SELECT m as mov, COUNT(m) as amount FROM Grupa\VideoNetBundle\Entity\Movie m JOIN m.order o GROUP BY m.id ORDER BY amount DESC')->setMaxResults(5);
		$mostPurchased = $query->getResult();
		
		$trailer1 = "http://videos.hd-trailers.net/36950c9b-6630-4b93-9173-5a3601bf1b32_rEoBt0FyD5Z0o60qKlIaNEas40aGF5v1ciiDXsCvsrJdo7m77asorzMHAv3MbF0qFdJaY5pUqro-_8_0.mp4";
		$trailer2 = "http://videos.hd-trailers.net/bf2235b4-bf12-47e6-a309-18afc5fa0281_XCTMfz12XJPWOHe0XE2wNkFi17elWruNOjsjTZ1DOvPIM0Gs3SCLY0cm5O9KoJcSmJ4bCyEqWg8-_9_0.mp4";
		$trailer3 = "http://videos.hd-trailers.net/e23ab4b8-a737-46dd-a0e4-259ba36056b6_YsfXbEghC5XywlmkKiYrF0D1oWcPYHA94aPeKmTuUKJJVJBpH4AFbPzcNWMhAJHuRnKZAAatvKg-_8_0.mp4";
		$trailer4 = "http://videos.hd-trailers.net/ece8d0cf-e92e-447b-b9ac-f93cd28b716e_MgJ84MokCcXUE4G0YHr6I5MpNYbONlDYKML1NyPoSunQMbLQstsd40_B3B3tIHnj_7JwzrXaC8o-_8_0.mp4";
        return $this->render(
			'GrupaVideoNetBundle:Index:index.html.twig',
			array (
				'trailers' => array(
					'trailer1' => $trailer1,
					'trailer2' => $trailer2,
					'trailer3' => $trailer3,
					'trailer4' => $trailer4,
				),
				'link' => $link,
				'lastAdded' => $lastAdded,
				'mostRev' => $mostRev,
				'mostPurchased' => $mostPurchased
			)
		);
    }
}
