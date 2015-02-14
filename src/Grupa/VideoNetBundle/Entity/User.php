<?php
namespace Grupa\VideoNetBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Grupa\VideoNetBundle\Entity\Orders as Orders;
use Grupa\VideoNetBundle\Entity\User as User;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Orders")
     * @ORM\JoinTable(name="UserOrders",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id", unique=true)}
     *      )
     **/
    protected $orders;
	
	/**
     * @ORM\OneToMany(targetEntity="ForumPost", mappedBy="user")
     */
	protected $posts;

    public function __construct()
    {
		parent::__construct();
        $this->orders = new ArrayCollection();
    }
	
	/**
     * @ORM\Column(type="integer", name="movie_meter_level", options={"default" = "0"})
     */
    protected $movieMeterLevel;
	
	
	
	/**
     * @ORM\Column(type="string", length=100, options={"default" = "default.png"})
     */
    protected $avatar = "default.png";

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
     * Set movieMeterLevel
     *
     * @param integer $movieMeterLevel
     * @return User
     */
    public function setMovieMeterLevel($movieMeterLevel)
    {
        $this->movieMeterLevel = $movieMeterLevel;

        return $this;
    }

    /**
     * Get movieMeterLevel
     *
     * @return integer 
     */
    public function getMovieMeterLevel()
    {
        return $this->movieMeterLevel;
    }

    /**
     * Set movieMeterRank
     *
     * @param string $movieMeterRank
     * @return User
     */
    public function setMovieMeterRank($movieMeterRank)
    {
        $this->movieMeterRank = $movieMeterRank;

        return $this;
    }

    /**
     * Get movieMeterRank
     *
     * @return string 
     */
    public function getMovieMeterRank()
    {
        return $this->movieMeterRank;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add orders
     *
     * @param \Grupa\VideoNetBundle\Entity\Orders $orders
     * @return User
     */
    public function addOrder(\Grupa\VideoNetBundle\Entity\Orders $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Grupa\VideoNetBundle\Entity\Orders $orders
     */
    public function removeOrder(\Grupa\VideoNetBundle\Entity\Orders $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
	
	/**
     * Add posts
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumPost $posts
     * @return ForumCategory
     */
    public function addPost(\Grupa\VideoNetBundle\Entity\ForumPost $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumPost $posts
     */
    public function removePost(\Grupa\VideoNetBundle\Entity\ForumPost $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }
}
