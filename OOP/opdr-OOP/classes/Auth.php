<?php

/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 26/09/16
 * Time: 19:11
 */
include_once 'DB.php';


class Auth
{
    protected $username;
    protected $password;
    private $id;
    protected static $table = 'users';
    protected static $error='';


    public function __construct($username = '', $password = '')
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }



    static public function registerUser($username,$password){

        $password = self::hashPassword($password);

        $db= new DB;

        $query = "INSERT INTO ".self::$table." (username,password) VALUES (:username,:password)";

        $result = $db->doQuery($query,['username'=>$username,'password'=>$password]);
        $db =null;

       return $result;
    }


    static public function login($username,$password)
    {
        $pw =self::hashPassword($password);
        $db= new DB;

        $query = "SELECT * FROM ". self::$table ." WHERE username= '".$username."'";

        $result = $db->doQuery($query);

        $result = $result->fetchObject();

        if($result){
            //user bestaat
            if(password_verify($password,$result->password)){
                $_SESSION["username"] = $username;
                return true;
            }else{
                return self::$error = 'password mismatch';        }



        } else{

            //usr bestaat niet
            self::$error ='user bestaat niet';

        }

        if(!empty(self::$error)){
            return self::$error;
        }else{


            return $result;

        }

    }

    static public function checkLoggedIn(){
        if (!empty($_SESSION['username'])){
            return true;
        }else{
            return false;
        }


    }
    static public function logout()
    {
        unset($_SESSION['username']);
        exit;
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

    static public function hashPassword($password){

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        return $hashed;
    }

}