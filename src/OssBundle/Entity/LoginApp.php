<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 04/09/2017
 * Time: 09:27
 */

namespace OssBundle\Entity;



use JMS\Serializer\Annotation as Serializer;

class LoginApp
{
    /**
     * @Serializer\Type("string")
     */
    private $login;
    /**
     * @Serializer\Type("string")
     */
    private $password;

    /**
     * LoginApp constructor.
     * @param $login
     * @param $password
     */
    public function __construct(String $login, String $password)
    {
        $this->login = $login;
        $this->password = $password;
    }


    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPasswordAsh()
    {
        return $this->passwordAsh;
    }


}