<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 23/08/2017
 * Time: 14:42
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class FishInSpot
 * @package OssBundle\Entity
 * @ORM\Entity()
 */
class FishInSpot
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
    private $size;
    /**
     * @ORM\Column(type="string")
     */
    private $attitude;
    /**
     * @ORM\Column(type="string")
     */
    private $existence;

    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\Spot", inversedBy="fishInSpot")
     */
    private $spot;
    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\SiteUser", inversedBy="fishInSpot")
     */
    private $siteUser;
    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\Fish", inversedBy="fishInSpot")
     */
    private $fish;

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
     * Set size
     *
     * @param string $size
     *
     * @return FishInSpot
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set attitude
     *
     * @param string $attitude
     *
     * @return FishInSpot
     */
    public function setAttitude($attitude)
    {
        $this->attitude = $attitude;

        return $this;
    }

    /**
     * Get attitude
     *
     * @return string
     */
    public function getAttitude()
    {
        return $this->attitude;
    }

    /**
     * Set existence
     *
     * @param string $existence
     *
     * @return FishInSpot
     */
    public function setExistence($existence)
    {
        $this->existence = $existence;

        return $this;
    }

    /**
     * Get existence
     *
     * @return string
     */
    public function getExistence()
    {
        return $this->existence;
    }

    /**
     * Set spot
     *
     * @param \OssBundle\Entity\Spot $spot
     *
     * @return FishInSpot
     */
    public function setSpot(\OssBundle\Entity\Spot $spot = null)
    {
        $this->spot = $spot;

        return $this;
    }

    /**
     * Get spot
     *
     * @return \OssBundle\Entity\Spot
     */
    public function getSpot()
    {
        return $this->spot;
    }

    /**
     * Set siteUser
     *
     * @param \OssBundle\Entity\SiteUser $siteUser
     *
     * @return FishInSpot
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
     * Set fish
     *
     * @param \OssBundle\Entity\Fish $fish
     *
     * @return FishInSpot
     */
    public function setFish(\OssBundle\Entity\Fish $fish = null)
    {
        $this->fish = $fish;

        return $this;
    }

    /**
     * Get fish
     *
     * @return \OssBundle\Entity\Fish
     */
    public function getFish()
    {
        return $this->fish;
    }
}
