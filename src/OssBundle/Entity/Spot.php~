<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 23/08/2017
 * Time: 14:14
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Spot
 * @package OssBundle\Entity
 * @ORM\Entity()
 */
class Spot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="bigint")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\Column(type="string")
     */
    private $spotType;
    /**
     * @ORM\Column(type="string")
     */
    private $spotAcces;
    /**
     * @ORM\Column(type="string")
     */
    private $dateAdd;
    /**
     * @ORM\Column(type="integer")
     */
    private $lattitude;
    /**
     * @ORM\Column(type="integer")
     */
    private $longitude;
    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\Area", inversedBy="spot")
     */
    private $area;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\Comment", mappedBy="spot")
     */
    private $comment;
    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\SiteUser", inversedBy="spot")
     */
    private $siteUser;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\FishInSpot", mappedBy="spot")
     */
    private $fishInSpot;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fishInSpot = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Spot
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
     * Set spotType
     *
     * @param string $spotType
     *
     * @return Spot
     */
    public function setSpotType($spotType)
    {
        $this->spotType = $spotType;

        return $this;
    }

    /**
     * Get spotType
     *
     * @return string
     */
    public function getSpotType()
    {
        return $this->spotType;
    }

    /**
     * Set spotAcces
     *
     * @param string $spotAcces
     *
     * @return Spot
     */
    public function setSpotAcces($spotAcces)
    {
        $this->spotAcces = $spotAcces;

        return $this;
    }

    /**
     * Get spotAcces
     *
     * @return string
     */
    public function getSpotAcces()
    {
        return $this->spotAcces;
    }

    /**
     * Set dateAdd
     *
     * @param string $dateAdd
     *
     * @return Spot
     */
    public function setDateAdd($dateAdd)
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return string
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * Set lattitude
     *
     * @param integer $lattitude
     *
     * @return Spot
     */
    public function setLattitude($lattitude)
    {
        $this->lattitude = $lattitude;

        return $this;
    }

    /**
     * Get lattitude
     *
     * @return integer
     */
    public function getLattitude()
    {
        return $this->lattitude;
    }

    /**
     * Set longitude
     *
     * @param integer $longitude
     *
     * @return Spot
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return integer
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set area
     *
     * @param \OssBundle\Entity\Area $area
     *
     * @return Spot
     */
    public function setArea(\OssBundle\Entity\Area $area = null)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return \OssBundle\Entity\Area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Add comment
     *
     * @param \OssBundle\Entity\Comment $comment
     *
     * @return Spot
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
     * Set siteUser
     *
     * @param \OssBundle\Entity\SiteUser $siteUser
     *
     * @return Spot
     */
    public function setSiteUser(\OssBundle\Entity\SiteUser $siteUser = null)
    {
        $this->siteUser = $siteUser;

        return $this;
    }

    /**
     * Get siteUser
     *
     * @return \OssBundle\Entity\SiteUser
     */
    public function getSiteUser()
    {
        return $this->siteUser;
    }

    /**
     * Add fishInSpot
     *
     * @param \OssBundle\Entity\FishInSpot $fishInSpot
     *
     * @return Spot
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
}
