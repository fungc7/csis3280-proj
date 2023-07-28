<?php
require_once('PDOService.class.php');
require_once('inc/entities/User.class.php');

class UserDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize($className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createUser(User $newUser) {
        
        $insertReservation = "INSERT INTO User (userId, username, maskedPw) VALUES (:userID, :userName, :maskedPassword)";
        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id
        self::$db->query($insertReservation);
        self::$db->bind(':userID', $newUser->getUserId());
        self::$db->bind(':userName', $newUser->getUsername());
        self::$db->bind(':maskedPassword', $newUser->getMaskedPw());

        self::$db->execute();

        return self::$db->lastInsertedId();
        
    }
    
    // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?  
    static function getUser(string $name)  {
       //QUERY, BIND, EXECUTE, RETURN (the single result)
       $selectUser = "SELECT * FROM User WHERE username = :userName";

       self::$db->query($selectUser);
       self::$db->bind('userName', $name);
       self::$db->execute();

       return self::$db->resultSet();
    }

    // GET = READ = SELECT ALLL
    // This is to get all purchases, do I even need this function? 
    static function getAllMovies() {

        // I don't need any parameter here, do I need to bind?
        $selectAllMovie = "SELECT * FROM Movie;";
        //Prepare the Query
        self::$db->query($selectAllMovie);
        //execute the query
        self::$db->execute();
        //Return results
        return self::$db->resultSet();
    }

    static function getHomePageMovies() {
        $selectAllMovie = "SELECT * FROM Movie ORDER BY releaseDate desc limit 9;";
        self::$db->query($selectAllMovie);
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