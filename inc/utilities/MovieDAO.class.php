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

    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createReservation(Movie $newMovie) {
        /*
        $insertReservation = "INSERT INTO Reservation (ReservationID, Email, Amount, TicketClassID) VALUES (:reservationId, :email, :amt, :ticketClassId)";
        // QUERY BIND EXECUTE 
        // You may want to return the last inserted id
        self::$db->query($insertReservation);
        self::$db->bind(':reservationId', $newReservation->getReservationID());
        self::$db->bind(':email', $newReservation->getEmail());
        self::$db->bind(':amt', $newReservation->getAmount());
        self::$db->bind(':ticketClassId', $newReservation->getTicketClassID());

        self::$db->execute();

        return self::$db->lastInsertedId();
        */
    }
    
    // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?  
    static function getMovie(string $MovieId)  {
       //QUERY, BIND, EXECUTE, RETURN (the single result)
       $selectMovie = "SELECT l.movieId, l.title, l.overview, l.imageUrl, l.releaseDate, l.backdropUrl, r.avgRating
        FROM
        (
            SELECT * FROM movie
            WHERE movieId = :MovieId
        ) AS l
        LEFT JOIN
        (
            SELECT movieId, AVG(rating) AS avgRating
            FROM review
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
        movie as l
        LEFT JOIN
        (
            SELECT movieId, AVG(rating) AS avgRating
            FROM review
            group by movieId
        ) AS r
        ON l.movieId = r.movieId
        ORDER BY l.releaseDate DESC
        LIMIT 9;";
        self::$db->query($selectAllMovie);
        self::$db->execute();
        return self::$db->resultSet();
    }

    // UPDATE means update   
    static function updateReservation (Movie $MovieToUpdate) {
        /*
        // QUERY, BIND, EXECUTE
        // You may want to return the rowCount
        $editReservation = "UPDATE Reservation SET Email=:email, Amount=:amount, TicketClassID=:ticketClassId ";
        $editReservation .= "WHERE ReservationID =:reservationId";

        self::$db->query($editReservation);
        self::$db->bind(":reservationId", $ReservationToUpdate->getReservationID());
        self::$db->bind(":email", $ReservationToUpdate->getEmail());
        self::$db->bind(":amount", $ReservationToUpdate->getAmount());
        self::$db->bind(":ticketClassId", $ReservationToUpdate->getTicketClassID());

        self::$db->execute();

        return self::$db->rowCount();
        */
    }
    
    // Sorry, I need to DELETE your record 
    static function deleteReservation(string $ReservationId) {
        $deleteReservation = "DELETE FROM Reservation WHERE ReservationID = :reservationId";
        // Yea...yea... it is a drill like the one before
        try {
            self::$db->query($deleteReservation);
            self::$db->bind(":reservationId", $ReservationId);
            self::$db->execute();

            if (self::$db->rowCount() != 1) {
                throw new Exception("Problem in deleting the book {$ReservationId}");
            }
        }
        catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
        return true;
    }

    // WE NEED TO USE JOIN HERE
    // Make sure to select from both tables joined at the correct column
    // You may need to also query some columns from the RoomsType class/table. 
    // Those columns are needed for cost calculation and display the rooms type detail in the main page
    static function getMovieReview() {
        
        //Prepare the Query
        $selectReview = "SELECT reviewId, username, title, content, rating, reviewDate FROM review AS re LEFT JOIN MOVIE AS mov ON re.movieId = mov.movieId LEFT JOIN User AS usr ON re.userId = usr.userId;";
        //execute the query
        self::$db->query($selectReview);
        self::$db->execute();
        //Return row results
        return self::$db->resultSet();
        
    }

}


?>