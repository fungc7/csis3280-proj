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
        $selectReview = "SELECT reviewId, username, title, content, rating, reviewDate FROM review AS re LEFT JOIN MOVIE AS mov ON re.movieId = mov.movieId LEFT JOIN User AS usr ON re.userId = usr.userId WHERE re.movieId = :movieID;";
        //execute the query
        self::$db->query($selectReview);
        self::$db->bind('movieID', $movieID);
        self::$db->execute();
        //Return row results
        return self::$db->resultSet();
        
    }

}

?>