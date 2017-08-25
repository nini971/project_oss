<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 25/08/2017
 * Time: 11:33
 */

namespace OssBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class HunterType
 * @package OssBundle\Entity
 * @ORM\Entity()
 */
class HunterType
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

    function __toString()
    {
        return $this->name;
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
     * @return HunterType
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
}
