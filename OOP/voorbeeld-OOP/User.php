<?php

class User {

    protected $id = false;
    protected $username;
    protected $password;

    function __construct($username='', $password='') {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    function save() {
        $q = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $data = ['username'=>$this->getUsername(), 'password'=>$this->getPassword()];

        $conn = new PDO('sqlite:users.sqlite');
        $stmt = $conn->prepare($q);
        $stmt->execute($data);
    }

    static function getById($id) {
        $q = "SELECT * FROM users WHERE id=:id LIMIT 1";

        $conn = new PDO('sqlite:users.sqlite');
        $stmt = $conn->prepare($q);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $stmt->execute(['id'=>$id]);

        return $stmt->fetch();
    }

    static function getAllUsers() {
        $q = "SELECT * FROM users";
        $conn = new PDO('sqlite:users.sqlite');

        $stmt = $conn->prepare($q);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

}