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
 * @ORM\Table(name="subscription")
 * @ORM\Entity
 */
class Subscription
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
     * The purchase datetime in the customer timezone.
     *
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    protected $paymentDate = null;

    /**
     * The purchase datetime in the customer timezone.
     *
     * @var \DateTime
     * @ORM\Column(type="integer")
     */
    protected $year;

    /**
     * The user
     *
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subscriptions")
     */
    protected $user;

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


}
