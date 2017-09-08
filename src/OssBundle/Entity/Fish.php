<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 23/08/2017
 * Time: 14:47
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Fish
 * @package OssBundle\Entity
 * @ORM\Entity()
 */
class Fish
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
    private $wikiLink;
    /**
     * @ORM\Column(type="string")
     */
    private $picture;
    /**
     * @ORM\Column(type="string")
     */
    private $fishName;

    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\SiteUser", inversedBy="fish")
     */
    private $siteUser;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\FishInSpot", mappedBy="fish")
     */
    private $fishInSpot;

    function __toString()
    {
        return $this->getFishName();
    }


    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set wikiLink
     *
     * @param string $wikiLink
     *
     * @return Fish
     */
    public function setWikiLink($wikiLink)
    {
        $this->wikiLink = $wikiLink;

        return $this;
    }

    /**
     * Get wikiLink
     *
     * @return string
     */
    public function getWikiLink()
    {
        return $this->wikiLink;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Fish
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set fishName
     *
     * @param string $fishName
     *
     * @return Fish
     */
    public function setFishName($fishName)
    {
        $this->fishName = $fishName;

        return $this;
    }

    /**
     * Get fishName
     *
     * @return string
     */
    public function getFishName()
    {
        return $this->fishName;
    }

    /**
     * Set siteUser
     *
     * @param \OssBundle\Entity\SiteUser $siteUser
     *
     * @return Fish
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
     * @return Fish
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
