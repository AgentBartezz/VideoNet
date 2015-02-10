<?php
namespace Grupa\VideoNetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Grupa\VideoNetBundle\Entity\User as User;

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

    protected $user_id;
}