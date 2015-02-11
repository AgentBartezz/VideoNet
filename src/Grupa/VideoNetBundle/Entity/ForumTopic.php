<?php
namespace Grupa\VideoNetBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Grupa\VideoNetBundle\Entity\ForumCategory as ForumCategory;
use Grupa\VideoNetBundle\Entity\ForumPost as ForumPost;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class ForumTopic
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\ManyToOne(targetEntity="ForumCategory", inversedBy="topics")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;
	
	/**
     * @ORM\OneToMany(targetEntity="ForumPost", mappedBy="topic")
     */
	protected $posts;
	
	public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

	/**
     * @ORM\Column(type="string", length=50, name="topic_name")
     */
    protected $name;

	/**
     * @ORM\Column(type="integer", name="topic_status")
     */
    protected $status;

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
     * Set name
     *
     * @param string $name
     * @return ForumTopic
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

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
     * Set status
     *
     * @param integer $status
     * @return ForumTopic
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
     * Set category
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumCategory $category
     * @return ForumTopic
     */
    public function setCategory(\Grupa\VideoNetBundle\Entity\ForumCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Grupa\VideoNetBundle\Entity\ForumCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add posts
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumPost $posts
     * @return ForumTopic
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
