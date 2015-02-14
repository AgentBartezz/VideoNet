<?php
namespace Grupa\VideoNetBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Grupa\VideoNetBundle\Entity\ForumSection as ForumSection;

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
     * @ORM\OneToMany(targetEntity="ForumSection", mappedBy="category")
     */
	protected $sections;
	
	
	public function __construct()
    {
        $this->sections = new ArrayCollection();
    }
	

	/**
     * @ORM\Column(type="string", length=100, name="forum_category_name")
     */
    protected $name;
	
	/**
     * @ORM\Column(type="integer", name="category_status")
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
     * Add sections
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumSection $sections
     * @return ForumCategory
     */
    public function addSection(\Grupa\VideoNetBundle\Entity\ForumSection $sections)
    {
        $this->sections[] = $sections;

        return $this;
    }

    /**
     * Remove sections
     *
     * @param \Grupa\VideoNetBundle\Entity\ForumSection $sections
     */
    public function removeSection(\Grupa\VideoNetBundle\Entity\ForumSection $sections)
    {
        $this->sections->removeElement($sections);
    }

    /**
     * Get sections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSections()
    {
        return $this->sections;
    }
	
}
