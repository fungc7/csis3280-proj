<?php

class ReviewDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize($className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    static function getMovieReview(string $movieID) {
        //Prepare the Query
        $selectReview = "SELECT reviewId, username, title, content, rating, reviewDate FROM Review AS re LEFT JOIN Movie AS mov ON re.movieId = mov.movieId LEFT JOIN User AS usr ON re.userId = usr.userId WHERE re.movieId = :movieID;";
        //execute the query
        self::$db->query($selectReview);
        self::$db->bind('movieID', $movieID);
        self::$db->execute();
        //Return row results
        return self::$db->resultSet();
        
    }

    static function insertReview ($userId, $movieId, $content, $rating) {
        $insertReview = "INSERT INTO Review (reviewId, userId, movieId, content, rating, reviewDate) SELECT MAX(reviewId) + 1, :UserID, :MovieID, :Content, :Rating, CURDATE() FROM Review";
        self::$db->query($insertReview);
        self::$db->bind('UserID', $userId);
        self::$db->bind('MovieID', $movieId);
        self::$db->bind('Content', $content);
        self::$db->bind('Rating', $rating);
        self::$db->execute();

        return self::$db->lastInsertedId();
    }
}

?>