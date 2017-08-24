<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 23/08/2017
 * Time: 14:07
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * Class Area
 * @package OssBundle\Entity
 * @Entity()
 */
class Area
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
    private $areaName;
    /**
     * @ORM\Column(type="integer")
     */
    private $lattitudeA;
    /**
     * @ORM\Column(type="integer")
     */
    private $lattitudeB;
    /**
     * @ORM\Column(type="integer")
     */
    private $lattitudeC;
    /**
     * @ORM\Column(type="integer")
     */
    private $lattitudeD;
    /**
     * @ORM\Column(type="integer")
     */
    private $longitudeA;
    /**
     * @ORM\Column(type="integer")
     */
    private $longitudeB;
    /**
     * @ORM\Column(type="integer")
     */
    private $longitudeC;
    /**
     * @ORM\Column(type="integer")
     */
    private $longitudeD;
    /**
     * @ORM\OneToMany(targetEntity="OssBundle\Entity\Spot", mappedBy="area")
     */
    private $spot;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->spot = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set areaName
     *
     * @param string $areaName
     *
     * @return Area
     */
    public function setAreaName($areaName)
    {
        $this->areaName = $areaName;

        return $this;
    }

    /**
     * Get areaName
     *
     * @return string
     */
    public function getAreaName()
    {
        return $this->areaName;
    }

    /**
     * Set lattitudeA
     *
     * @param integer $lattitudeA
     *
     * @return Area
     */
    public function setLattitudeA($lattitudeA)
    {
        $this->lattitudeA = $lattitudeA;

        return $this;
    }

    /**
     * Get lattitudeA
     *
     * @return integer
     */
    public function getLattitudeA()
    {
        return $this->lattitudeA;
    }

    /**
     * Set lattitudeB
     *
     * @param integer $lattitudeB
     *
     * @return Area
     */
    public function setLattitudeB($lattitudeB)
    {
        $this->lattitudeB = $lattitudeB;

        return $this;
    }

    /**
     * Get lattitudeB
     *
     * @return integer
     */
    public function getLattitudeB()
    {
        return $this->lattitudeB;
    }

    /**
     * Set lattitudeC
     *
     * @param integer $lattitudeC
     *
     * @return Area
     */
    public function setLattitudeC($lattitudeC)
    {
        $this->lattitudeC = $lattitudeC;

        return $this;
    }

    /**
     * Get lattitudeC
     *
     * @return integer
     */
    public function getLattitudeC()
    {
        return $this->lattitudeC;
    }

    /**
     * Set lattitudeD
     *
     * @param integer $lattitudeD
     *
     * @return Area
     */
    public function setLattitudeD($lattitudeD)
    {
        $this->lattitudeD = $lattitudeD;

        return $this;
    }

    /**
     * Get lattitudeD
     *
     * @return integer
     */
    public function getLattitudeD()
    {
        return $this->lattitudeD;
    }

    /**
     * Set longitudeA
     *
     * @param integer $longitudeA
     *
     * @return Area
     */
    public function setLongitudeA($longitudeA)
    {
        $this->longitudeA = $longitudeA;

        return $this;
    }

    /**
     * Get longitudeA
     *
     * @return integer
     */
    public function getLongitudeA()
    {
        return $this->longitudeA;
    }

    /**
     * Set longitudeB
     *
     * @param integer $longitudeB
     *
     * @return Area
     */
    public function setLongitudeB($longitudeB)
    {
        $this->longitudeB = $longitudeB;

        return $this;
    }

    /**
     * Get longitudeB
     *
     * @return integer
     */
    public function getLongitudeB()
    {
        return $this->longitudeB;
    }

    /**
     * Set longitudeC
     *
     * @param integer $longitudeC
     *
     * @return Area
     */
    public function setLongitudeC($longitudeC)
    {
        $this->longitudeC = $longitudeC;

        return $this;
    }

    /**
     * Get longitudeC
     *
     * @return integer
     */
    public function getLongitudeC()
    {
        return $this->longitudeC;
    }

    /**
     * Set longitudeD
     *
     * @param integer $longitudeD
     *
     * @return Area
     */
    public function setLongitudeD($longitudeD)
    {
        $this->longitudeD = $longitudeD;

        return $this;
    }

    /**
     * Get longitudeD
     *
     * @return integer
     */
    public function getLongitudeD()
    {
        return $this->longitudeD;
    }

    /**
     * Add spot
     *
     * @param \OssBundle\Entity\Spot $spot
     *
     * @return Area
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
}
