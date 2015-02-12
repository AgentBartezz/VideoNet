<?php
namespace Grupa\VideoNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Grupa\VideoNetBundle\Entity\Movie as Movie;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class MovieCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $name;
	

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
	
	/**
      * @ORM\OneToMany(targetEntity="Movie", mappedBy="category")
      */
     protected $movies;

     public function __construct()
     {
         $this->movies = new ArrayCollection();
     }
}