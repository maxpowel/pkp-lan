<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Purchase[]
     *
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="user", cascade={"remove"})
     */
    private $subscriptions;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * It only stores the name of the file which stores the avatar subscribed
     * by the user.
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $avatar;

    /**
     * This unmapped property stores the binary contents of the file which stores
     * the avatar subscribed by the user.
     *
     * @Vich\UploadableField(mapping="user_avatars", fileNameProperty="avatar")
     *
     * @var File
     */
    private $avatarFile;

    public function __toString()
    {
        return $this->username;
    }

    public function __construct()
    {
        parent::__construct();

        $this->subscriptions = new ArrayCollection();
        $this->isActive = true;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param Subscription[] $subscriptions
     */
    public function setSubscriptions($subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * @return Subscription[]
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @param File $avatar
     */
    public function setAvatarFile(File $avatar = null)
    {
        $this->avatarFile = $avatar;
    }

    /**
     * @return File
     */
    public function getAvatarFile()
    {
        return $this->avatarFile;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized);
    }

}
