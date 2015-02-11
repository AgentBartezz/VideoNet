<?php
namespace Grupa\VideoNetBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Grupa\VideoNetBundle\Entity\ForumTopic as ForumTopic;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class ForumCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\OneToMany(targetEntity="ForumTopic", mappedBy="category")
     */
	protected $topics;
	
	public function __construct()
    {
        $this->topics = new ArrayCollection();
    }
	
	/**
     * @ORM\Column(type="integer", name="forum_category_level")
     */
    protected $level;

	/**
     * @ORM\Column(type="integer", name="forum_category_name")
     */
    protected $name;
	
	/**
     * @ORM\Column(type="integer", name="post_status")
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
     * Set level
     *
     * @param integer $level
     * @return ForumCategory
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set name
     *
     * @param integer $name
     * @return ForumCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return integer 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return ForumCategory
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
     * Add topics
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumTopic $topics
     * @return ForumCategory
     */
    public function addTopic(\Grupa\VideoNetBundle\Entity\ForumTopic $topics)
    {
        $this->topics[] = $topics;

        return $this;
    }

    /**
     * Remove topics
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumTopic $topics
     */
    public function removeTopic(\Grupa\VideoNetBundle\Entity\ForumTopic $topics)
    {
        $this->topics->removeElement($topics);
    }

    /**
     * Get topics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopics()
    {
        return $this->topics;
    }
}
