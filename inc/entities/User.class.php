<?php

class User {
    private $userId;
    private $username;
    private $maskedPw;
    private $email;
    private $age;

    // public function __construct($id, $name, $pwMasked)
    // {
    //     $this->userId = $id;
    //     $this->username = $name;
    //     $this->maskedPw = $pwMasked;
    // }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getMaskedPw()
    {
        return $this->maskedPw;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setUserId($id)
    {
        $this->userId = $id;
    }

    public function setUsername($name)
    {
        $this->username = $name;
    }

    public function setMaskedPw($pwMasked)
    {
        $this->maskedPw = $pwMasked;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function verifyPassword(string $maskedPw)
    {
        if ($maskedPw == $this->getMaskedPw())
            return true;
        return false;
    }
}


?>