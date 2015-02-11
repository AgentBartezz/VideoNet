<?php
namespace Grupa\VideoNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Grupa\VideoNetBundle\Entity\User as User;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Orders	
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
	 
	/**
	 * @ORM\ManyToMany(targetEntity="Movie", mappedBy="order")
	 */
	protected $movies;

	public function __construct()
	{
		$this->movies = new ArrayCollection();
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Grupa\VideoNetBundle\Entity\User $user
     * @return Orders
     */
    public function setUser(\Grupa\VideoNetBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Grupa\VideoNetBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add movies
     *
     * @param \Grupa\VideoNetBundle\Entity\Movie $movies
     * @return Orders
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
