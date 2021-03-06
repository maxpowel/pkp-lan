<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Model\Shipment;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Purchase.
 *
 * @author MacFJA
 *
 * @ORM\Table(name="lan_position")
 * @ORM\Entity
 */
class LanPosition
{
    /**
     * The purchase increment id. This identifier will be use in all communication between the customer and the store.
     *
     * @var string
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id = null;

    /**
     * The purchase datetime in the customer timezone.
     *
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $createdAt = null;

    /**
     *
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    /**
     * The user
     *
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subscriptions")
     */
    protected $user;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    protected $x;

    /**
     * @var string
     * @ORM\Column(type="integer")
     */
    protected $y;


    /**
     * Constructor of the Purchase class.
     * (Initialize some fields).
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param string $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return string
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param string $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }


}
