<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 23/08/2017
 * Time: 14:27
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Comment
 * @package OssBundle\Entity
 * @ORM\Entity()
 */
class Comment
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
    private $content;
    /**
     * @ORM\Column(type="string")
     */
    private $dateAdd;
    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\Spot", inversedBy="comment")
     */
    private $spot;
    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\SiteUser", inversedBy="comment")
     */
    private $siteUser;

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
     * Set content
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateAdd
     *
     * @param string $dateAdd
     *
     * @return Comment
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
     * Set spot
     *
     * @param \OssBundle\Entity\Spot $spot
     *
     * @return Comment
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
     * @return Comment
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
}
