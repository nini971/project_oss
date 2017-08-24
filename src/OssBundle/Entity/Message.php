<?php
/**
 * Created by PhpStorm.
 * User: Nico
 * Date: 23/08/2017
 * Time: 14:38
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Message
 * @package OssBundle\Entity
 * @ORM\Entity()
 */
class Message
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
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\SiteUser", inversedBy="messagePost")
     */
    private $siteUserPost;
    /**
     * @ORM\ManyToOne(targetEntity="OssBundle\Entity\SiteUser", inversedBy="messageReceive")
     */
    private $siteUserReceive;

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
     * @return Message
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
     * @return Message
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
     * Set siteUserPost
     *
     * @param \OssBundle\Entity\SiteUser $siteUserPost
     *
     * @return Message
     */
    public function setSiteUserPost(\OssBundle\Entity\SiteUser $siteUserPost = null)
    {
        $this->siteUserPost = $siteUserPost;

        return $this;
    }

    /**
     * Get siteUserPost
     *
     * @return \OssBundle\Entity\SiteUser
     */
    public function getSiteUserPost()
    {
        return $this->siteUserPost;
    }

    /**
     * Set siteUserReceive
     *
     * @param \OssBundle\Entity\SiteUser $siteUserReceive
     *
     * @return Message
     */
    public function setSiteUserReceive(\OssBundle\Entity\SiteUser $siteUserReceive = null)
    {
        $this->siteUserReceive = $siteUserReceive;

        return $this;
    }

    /**
     * Get siteUserReceive
     *
     * @return \OssBundle\Entity\SiteUser
     */
    public function getSiteUserReceive()
    {
        return $this->siteUserReceive;
    }
}
