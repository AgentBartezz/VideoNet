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
	 * @ORM\ManyToMany(targetEntity="Movie", mappedBy="order")
	 */
	protected $movies;
	
	/**
     * @ORM\Column(type="datetime", name="order_time")
     */
    protected $orderTime;
	
	public function __construct()
	{
		$this->orderTime = new \DateTime('now');
		$this->movies = new ArrayCollection();
	}
	
	/**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
	
	/**
     * @ORM\Column(type="datetime", name="order_realized_time", nullable=true)
     */
    protected $orderRealizedTime;
	

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

    /**
     * Set orderTime
     *
     * @param \DateTime $orderTime
     * @return Orders
     */
    public function setOrderTime($orderTime)
    {
        $this->orderTime = $orderTime;
        return $this;
    }

    /**
     * Get orderTime
     *
     * @return \DateTime 
     */
    public function getOrderTime()
    {
        return $this->orderTime;
    }
	
    /**
     * Set user
     *
     * @param \DateTime $user
     * @return Orders
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }	
	

    /**
     * Set orderRealizedTime
     *
     * @param \DateTime $orderRealizedTime
     * @return Orders
     */
    public function setOrderRealizedTime($orderRealizedTime)
    {
        $this->orderRealizedTime = $orderRealizedTime;
        return $this;
    }

    /**
     * Get orderRealizedTime
     *
     * @return \DateTime 
     */
    public function getOrderRealizedTime()
    {
        return $this->orderRealizedTime;
    }
}
