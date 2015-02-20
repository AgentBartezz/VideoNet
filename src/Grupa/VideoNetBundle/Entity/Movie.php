<?php
namespace Grupa\VideoNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Grupa\VideoNetBundle\Entity\Review as Review;
use Grupa\VideoNetBundle\Entity\Orders as Orders;
use Grupa\VideoNetBundle\Entity\MovieCategory as MovieCategory;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Orders", inversedBy="movie")
	 * @ORM\JoinTable(name="MovieOrders")
     */
    protected $order;
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $price;
	
	/**
     * @ORM\OneToMany(targetEntity="Review", mappedBy="user")
     */
	protected $reviews;
	
   /**
     * @ORM\ManyToOne(targetEntity="MovieCategory", inversedBy="name")
     * @ORM\JoinColumn(name="category_name", referencedColumnName="name")
     */
    protected $category;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;
   
	/**
     * @ORM\Column(type="boolean", name="is_hit")
     */
    protected $isHit;
	
	/**
     * @ORM\Column(type="boolean", name="is_superhit", nullable = true)
     */
    protected $isSuperHit;
	
	/**
     * @ORM\Column(type="date", name="premiere_poland", nullable = true)
     */
    protected $premierePoland;
	
	/**
     * @ORM\Column(type="date", name="premiere_world", nullable = true)
     */
    protected $premiereWorld;
	
	/**
     * @ORM\Column(type="date", name="added_at")
     */
    protected $addedAt;
	
	/**
     * @ORM\Column(type="string", length=4, name="production_year")
     */
    protected $productionYear;
	
	/**
     * @ORM\Column(type="string", length=200, name="movie_foto", options = {"default" = "default.png"} )
     */
    protected $movieFoto = "default.png";

	/**
     * @ORM\Column(type="string", length=200, name="movie_big_foto", options = {"default" = "defaultBig.png"} )
     */
    protected $movieBigFoto = "defaultBig.png";
	
	/**
     * @ORM\Column(type="string", length=200, name="movie_video", options = {"default" = "http://v-ie.uek.krakow.pl/~s176041/movies/default.mp4"} )
     */
    protected $movieVideo = "http://v-ie.uek.krakow.pl/~s176041/movies/default.mp4";
	
	/**
     * @ORM\Column(type="integer", nullable=true )
     */
    protected $duration;
	
	/**
     * @ORM\Column(type="string", length=50, nullable=true, name="country_production" )
     */
    protected $countryProduction;
	
    /**
     * Get id
     *
     * @return integer 
     */
	 
	 /**
     * Constructor
     */
    public function __construct()
    {
		$this->reviews = new \Doctrine\Common\Collections\ArrayCollection();
        $this->order = new \Doctrine\Common\Collections\ArrayCollection();
		$this->addedAt = new \DateTime("now");
		$this->premierePoland = new \DateTime();
		$this->premiereWorld = new \DateTime();
    }
	 
	
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Movie
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
     * Set duration
     *
     * @param integer $duration
     * @return Movie
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }
	

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

	/**
     * Set countryProduction
     *
     * @param string $countryProduction
     * @return Movie
     */
    public function setCountryProduction($countryProduction)
    {
        $this->countryProduction = $countryProduction;
        return $this;
    }

    /**
     * Get countryProduction
     *
     * @return string 
     */
    public function getCountryProduction()
    {
        return $this->countryProduction;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Movie
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Movie
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Movie
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add order
     *
     * @param \Grupa\VideoNetBundle\Entity\Orders $order
     * @return Movie
     */
    public function addOrder(\Grupa\VideoNetBundle\Entity\Orders $order)
    {
		$order->addMovie($this);
        $this->order[] = $order;
        return $this;
    }

    /**
     * Remove order
     *
     * @param \Grupa\VideoNetBundle\Entity\Orders $order
     */
    public function removeOrder(\Grupa\VideoNetBundle\Entity\Orders $order)
    {
        $this->order->removeElement($order);
    }

    /**
     * Get order
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrder()
    {
        return $this->order;
    }
	
	/**
     * Set isHit
     *
     * @param string $isHit
     * @return Movie
     */
    public function setIsHit($isHit)
    {
        $this->isHit = $isHit;
        return $this;
    }

    /**
     * Get isHit
     *
     * @return string 
     */
    public function getIsHit()
    {
        return $this->isHit;
    }
	
	/**
     * Set isSuperHit
     *
     * @param string $isSuperHit
     * @return Movie
     */
    public function setIsSuperHit($isSuperHit)
    {
        $this->isSuperHit = $isSuperHit;
        return $this;
    }

    /**
     * Get isSuperHit
     *
     * @return string 
     */
    public function getIsSuperHit()
    {
        return $this->isSuperHit;
    }
	
	/**
     * Set premierePoland
     *
     * @param string $premierePoland
     * @return Movie
     */
    public function setPremierePoland($premierePoland)
    {
        $this->premierePoland = $premierePoland;
        return $this;
    }

    /**
     * Get premierePoland
     *
     * @return string 
     */
    public function getPremierePoland()
    {
        return $this->premierePoland;
    }
	
	/**
     * Set premiereWorld
     *
     * @param string $premiereWorld
     * @return Movie
     */
    public function setPremiereWorld($premiereWorld)
    {
        $this->premiereWorld = $premiereWorld;
        return $this;
    }

    /**
     * Get premierePoland
     *
     * @return string 
     */
   public function getPremiereWorld()
    {
        return $this->premiereWorld;
    }
	
	/**
     * Set productionYear
     *
     * @param string $productionYear
     * @return Movie
     */
   public function setProductionYear($productionYear)
    {
        $this->productionYear = $productionYear;
        return $this;
    }

    /**
     * Get productionYear
     *
     * @return string 
     */
    public function getProductionYear()
    {
        return $this->productionYear;
	}
	
	/**
     * Set movieFoto
     *
     * @param string $movieFoto
     * @return Movie
     */
   public function setMovieFoto($movieFoto)
    {
        $this->movieFoto = $movieFoto;
        return $this;
    }

    /**
     * Get movieFoto
     *
     * @return string 
     */
    public function getMovieFoto()
    {
        return $this->movieFoto;
	}
	
	/**
     * Set movieBigFoto
     *
     * @param string $movieBigFoto
     * @return Movie
     */
   public function setMovieBigFoto($movieBigFoto)
    {
        $this->movieBigFoto = $movieBigFoto;
        return $this;
    }

    /**
     * Get movieBigFoto
     *
     * @return string 
     */
    public function getMovieBigFoto()
    {
        return $this->movieBigFoto;
	}
	
		/**
     * Set movieVideo
     *
     * @param string $movieVideo
     * @return Movie
     */
   public function setMovieVideo($movieVideo)
    {
        $this->movieVideo = $movieVideo;
        return $this;
    }

    /**
     * Get movieVideo
     *
     * @return string 
     */
    public function getMovieVideo()
    {
        return $this->movieVideo;
	}
	
	
	/**
     * Set addedAt
     *
     * @param string $addedAt
     * @return Movie
     */
   public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;
        return $this;
    }

    /**
     * Get addedAt
     *
     * @return string 
     */
    public function getAddedAt()
    {
        return $this->addedAt;
	}
	
	
	/**
     * Add reviews
     *
     * @param \Grupa\VideoNetBundle\Entity\Review $reviews
     * @return User
     */
    public function addReview(\Grupa\VideoNetBundle\Entity\Review $reviews)
    {
        $this->reviews[] = $reviews;
        return $this;
    }

    /**
     * Remove reviews
     *
     * @param \Grupa\VideoNetBundle\Entity\Review $reviews
     */
    public function removeReview(\Grupa\VideoNetBundle\Entity\Review $reviews)
    {
        $this->reviews->removeElement($reviews);
    }

    /**
     * Get reviews
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReviews()
    {
        return $this->reviews;
    }
}
