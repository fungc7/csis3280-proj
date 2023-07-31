<?php
require_once('PDOService.class.php');
require_once('inc/entities/User.class.php');

class UserDAO  {
    private static $db;

    static function initialize($className)    {
        self::$db = new PDOService($className);
    }

    static function createUser(User $newUser) {
        
        $insertReservation = "INSERT INTO User (userId, username, maskedPw, email, age) VALUES (:userID, :userName, :maskedPassword, :Email, :Age)";
        self::$db->query($insertReservation);
        self::$db->bind(':userID', $newUser->getUserId());
        self::$db->bind(':userName', $newUser->getUsername());
        self::$db->bind(':maskedPassword', $newUser->getMaskedPw());
        self::$db->bind(':Email', $newUser->getEmail());
        self::$db->bind(':Age', $newUser->getAge());

        self::$db->execute();

        return self::$db->lastInsertedId();
        
    }
    
    static function getUser(string $name)  {
       $selectUser = "SELECT * FROM User WHERE username = :userName";

       self::$db->query($selectUser);
       self::$db->bind('userName', $name);
       self::$db->execute();

       return self::$db->resultSet();
    }
    
    static function getUserByEmail(string $email) {
        $selectUser = "SELECT * FROM User WHERE email = :Email";

       self::$db->query($selectUser);
       self::$db->bind('Email', $email);
       self::$db->execute();

       return self::$db->resultSet();
    }

    static function updatePassword(string $username, string $maskedPw) {
        $updatePassword = "UPDATE User 
        SET maskedPw = :MaskedPw
        WHERE username = :userName;";
        try {
            self::$db->query($updatePassword);
            self::$db->bind('MaskedPw', $maskedPw);
            self::$db->bind('userName', $username);
            self::$db->execute();
            return true;
        }
        catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

}


?>