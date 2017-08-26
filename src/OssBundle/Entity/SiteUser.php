<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 23/08/2017
 * Time: 14:30
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SiteUser
 * @package OssBundle\Entity
 * @ORM\Entity()
 */
class SiteUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $lastName;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $firstName;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $pseudo;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $birthday;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    private $hunterPlace;

    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\Experience")
     * @Assert\NotBlank()
     */
    private $experience;

    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\HunterType")
     * @Assert\NotBlank()
     */
    private $hunterType;

    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\Spot", mappedBy="siteUser")
     */
    private $spot;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\Comment", mappedBy="siteUser")
     */
    private $comment;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\Message", mappedBy="siteUserPost")
     */
    private $messagePost;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\Message", mappedBy="siteUserReceive")
     */
    private $messageReceive;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\FishInSpot", mappedBy="siteUser")
     */
    private $fishInSpot;
    /**
     *@ORM\OneToMany(targetEntity="OssBundle\Entity\Fish", mappedBy="siteUser")
     */
    private $fish;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->spot = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messagePost = new \Doctrine\Common\Collections\ArrayCollection();
        $this->messageReceive = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fishInSpot = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fish = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set lastName
     *
     * @param string $lastName
     *
     * @return SiteUser
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return SiteUser
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return SiteUser
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return SiteUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return SiteUser
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     *
     * @return SiteUser
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set hunterPlace
     *
     * @param string $hunterPlace
     *
     * @return SiteUser
     */
    public function setHunterPlace($hunterPlace)
    {
        $this->hunterPlace = $hunterPlace;

        return $this;
    }

    /**
     * Get hunterPlace
     *
     * @return string
     */
    public function getHunterPlace()
    {
        return $this->hunterPlace;
    }

    /**
     * Add spot
     *
     * @param \OssBundle\Entity\Spot $spot
     *
     * @return SiteUser
     */
    public function addSpot(\OssBundle\Entity\Spot $spot)
    {
        $this->spot[] = $spot;

        return $this;
    }

    /**
     * Remove spot
     *
     * @param \OssBundle\Entity\Spot $spot
     */
    public function removeSpot(\OssBundle\Entity\Spot $spot)
    {
        $this->spot->removeElement($spot);
    }

    /**
     * Get spot
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpot()
    {
        return $this->spot;
    }

    /**
     * Add comment
     *
     * @param \OssBundle\Entity\Comment $comment
     *
     * @return SiteUser
     */
    public function addComment(\OssBundle\Entity\Comment $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \OssBundle\Entity\Comment $comment
     */
    public function removeComment(\OssBundle\Entity\Comment $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Add messagePost
     *
     * @param \OssBundle\Entity\Message $messagePost
     *
     * @return SiteUser
     */
    public function addMessagePost(\OssBundle\Entity\Message $messagePost)
    {
        $this->messagePost[] = $messagePost;

        return $this;
    }

    /**
     * Remove messagePost
     *
     * @param \OssBundle\Entity\Message $messagePost
     */
    public function removeMessagePost(\OssBundle\Entity\Message $messagePost)
    {
        $this->messagePost->removeElement($messagePost);
    }

    /**
     * Get messagePost
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessagePost()
    {
        return $this->messagePost;
    }

    /**
     * Add messageReceive
     *
     * @param \OssBundle\Entity\Message $messageReceive
     *
     * @return SiteUser
     */
    public function addMessageReceive(\OssBundle\Entity\Message $messageReceive)
    {
        $this->messageReceive[] = $messageReceive;

        return $this;
    }

    /**
     * Remove messageReceive
     *
     * @param \OssBundle\Entity\Message $messageReceive
     */
    public function removeMessageReceive(\OssBundle\Entity\Message $messageReceive)
    {
        $this->messageReceive->removeElement($messageReceive);
    }

    /**
     * Get messageReceive
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessageReceive()
    {
        return $this->messageReceive;
    }

    /**
     * Add fishInSpot
     *
     * @param \OssBundle\Entity\FishInSpot $fishInSpot
     *
     * @return SiteUser
     */
    public function addFishInSpot(\OssBundle\Entity\FishInSpot $fishInSpot)
    {
        $this->fishInSpot[] = $fishInSpot;

        return $this;
    }

    /**
     * Remove fishInSpot
     *
     * @param \OssBundle\Entity\FishInSpot $fishInSpot
     */
    public function removeFishInSpot(\OssBundle\Entity\FishInSpot $fishInSpot)
    {
        $this->fishInSpot->removeElement($fishInSpot);
    }

    /**
     * Get fishInSpot
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFishInSpot()
    {
        return $this->fishInSpot;
    }

    /**
     * Add fish
     *
     * @param \OssBundle\Entity\Fish $fish
     *
     * @return SiteUser
     */
    public function addFish(\OssBundle\Entity\Fish $fish)
    {
        $this->fish[] = $fish;

        return $this;
    }

    /**
     * Remove fish
     *
     * @param \OssBundle\Entity\Fish $fish
     */
    public function removeFish(\OssBundle\Entity\Fish $fish)
    {
        $this->fish->removeElement($fish);
    }

    /**
     * Get fish
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFish()
    {
        return $this->fish;
    }

    /**
     * Set experience
     *
     * @param \OssBundle\Entity\Experience $experience
     *
     * @return SiteUser
     */
    public function setExperience(\OssBundle\Entity\Experience $experience = null)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return \OssBundle\Entity\Experience
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set hunterType
     *
     * @param \OssBundle\Entity\HunterType $hunterType
     *
     * @return SiteUser
     */
    public function setHunterType(\OssBundle\Entity\HunterType $hunterType = null)
    {
        $this->hunterType = $hunterType;

        return $this;
    }

    /**
     * Get hunterType
     *
     * @return \OssBundle\Entity\HunterType
     */
    public function getHunterType()
    {
        return $this->hunterType;
    }
}
