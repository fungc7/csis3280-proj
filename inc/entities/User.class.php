<?php

class User {
    private $userId;
    private $username;
    private $maskedPw;

    public function __construct($id, $name, $pwMasked)
    {   
        $this->userId = $id;
        $this->username=$name;
        $this->maskedPw = $pwMasked;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getMaskedPw() {
        return $this->maskedPw;
    }
}

?>