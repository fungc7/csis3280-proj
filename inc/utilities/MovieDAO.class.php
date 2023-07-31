<?php
require_once('PDOService.class.php');
/*
+---------------+------------------+--------+---------------+
| movieId | title | overview | imageUrl | backdropUrl |
+---------------+------------------+--------+---------------+
*/

class MovieDAO  {
    private static $db;

    static function initialize($className)    {
        self::$db = new PDOService($className);
    }
      
    static function getMovie(string $MovieId)  {
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

    static function getAllMovies() {

        $selectAllMovie = "SELECT * FROM Movie;";
        self::$db->query($selectAllMovie);
        self::$db->execute();
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