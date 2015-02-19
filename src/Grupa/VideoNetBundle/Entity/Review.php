<?php
namespace Grupa\VideoNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Grupa\VideoNetBundle\Entity\Movie as Movie;
use Grupa\VideoNetBundle\Entity\User as User;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="reviews")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id")
     */
    protected $movie;
	
	/**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reviews")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;
	
	/**
     * @ORM\Column(type="string", length=1000)
     */
	protected $content;
	
	/**
     * @ORM\Column(type="datetime", name="review_time")
     */
    protected $reviewTime;
	
	/**
     * @ORM\Column(type="integer", name="review_status", options={"default" = "0" })
     */
    protected $status = "0";
	
	public function __construct()
	{
		$this->reviewTime = new \DateTime('now');
	}
	
	
	public function getId()
    {
        return $this->id;
    }
	
	/**
     * Set movie
     *
     * @param string $movie
     * @return Review
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return string 
     */
    public function getMovie()
    {
        return $this->movie;
    }
	
	/**
     * Set content
     *
     * @param string $content
     * @return Review
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }
	
	
	/**
     * Set user
     *
     * @param \DateTime $user
     * @return Review
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
     * Set status
     *
     * @param integer $status
     * @return Review
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }
	
	/**
     * Set reviewTime
     *
     * @param \DateTime $reviewTime
     * @return Review
     */
    public function setReviewTime($reviewTime)
    {
        $this->reviewTime = $reviewTime;
        return $this;
    }

    /**
     * Get reviewTime
     *
     * @return \DateTime 
     */
    public function getReviewTime()
    {
        return $this->reviewTime;
    }
	
	
}