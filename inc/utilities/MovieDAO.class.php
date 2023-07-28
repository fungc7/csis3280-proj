<?php
require_once('PDOService.class.php');
/*
+---------------+------------------+--------+---------------+
| movieId | title | overview | imageUrl | backdropUrl |
+---------------+------------------+--------+---------------+
*/

class MovieDAO  {

    // Declare Static DB member to store the database    
    private static $db;

    static function initialize($className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }
    
    // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?  
    static function getMovie(string $MovieId)  {
       //QUERY, BIND, EXECUTE, RETURN (the single result)
       $selectMovie = "SELECT l.movieId, l.title, l.overview, l.imageUrl, l.releaseDate, l.backdropUrl, r.avgRating
        FROM
        (
            SELECT * FROM Movie
            WHERE movieId = :MovieId
        ) AS l
        LEFT JOIN
        (
            SELECT movieId, AVG(rating) AS avgRating
            FROM Review
            WHERE movieId = :MovieId
        ) AS r
        ON l.movieId = r.movieId;";

       self::$db->query($selectMovie);
       self::$db->bind('MovieId', $MovieId);
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
        $selectAllMovie = "SELECT l.movieId, l.title, l.overview, l.imageUrl, l.releaseDate, l.backdropUrl, r.avgRating
        FROM
        Movie as l
        LEFT JOIN
        (
            SELECT movieId, AVG(rating) AS avgRating
            FROM Review
            group by movieId
        ) AS r
        ON l.movieId = r.movieId
        ORDER BY l.releaseDate DESC
        LIMIT 9;";
        self::$db->query($selectAllMovie);
        self::$db->execute();
        return self::$db->resultSet();
    }

    static function getMovieReview() {
        
        //Prepare the Query
        $selectReview = "SELECT reviewId, username, title, content, rating, reviewDate FROM Review AS re LEFT JOIN Movie AS mov ON re.movieId = mov.movieId LEFT JOIN User AS usr ON re.userId = usr.userId;";
        //execute the query
        self::$db->query($selectReview);
        self::$db->execute();
        //Return row results
        return self::$db->resultSet();
        
    }

    static function searchMovieByName(string $nameStr) {
        $query = "SELECT l.movieId, l.title, l.overview, l.imageUrl, l.releaseDate, l.backdropUrl, r.avgRating
        FROM
        Movie as l
        LEFT JOIN
        (
            SELECT movieId, AVG(rating) AS avgRating
            FROM Review
            group by movieId
        ) AS r
        ON l.movieId = r.movieId
        WHERE l.title COLLATE utf8mb4_general_ci LIKE CONCAT('%', :movieName, '%') ";

        //execute the query
        self::$db->query($query);
        self::$db->bind('movieName', $nameStr);
        self::$db->execute();
        //Return row results
        return self::$db->resultSet();
    }

}


?>