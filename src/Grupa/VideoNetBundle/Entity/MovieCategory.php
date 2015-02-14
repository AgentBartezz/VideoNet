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

    /**
     * Set name
     *
     * @param string $name
     * @return MovieCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Add movies
     *
     * @param \Grupa\VideoNetBundle\Entity\Movie $movies
     * @return MovieCategory
     */
    public function addMovie(\Grupa\VideoNetBundle\Entity\Movie $movies)
    {
        $this->movies[] = $movies;

        return $this;
    }

    /**
     * Remove movies
     *
     * @param \Grupa\VideoNetBundle\Entity\Movie $movies
     */
    public function removeMovie(\Grupa\VideoNetBundle\Entity\Movie $movies)
    {
        $this->movies->removeElement($movies);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovies()
    {
        return $this->movies;
    }
}
