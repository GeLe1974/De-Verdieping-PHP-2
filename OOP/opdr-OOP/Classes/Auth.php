<?php

/**
 * Created by PhpStorm.
 * User: geert
 * Date: 26/09/16
 * Time: 16:41
 */

require_once 'DB.php';

class Auth
{
    private $username;
    private $password;
    private $id;

    public function __construct($username='',$password='')
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }


    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }




}