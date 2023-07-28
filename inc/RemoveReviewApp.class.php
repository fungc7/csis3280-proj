<?php
require_once('inc/utilities/ReviewDAO.class.php');
require_once('inc/entities/Review.class.php');

class RemoveReviewApp {

    static function remove(string $reviewId) {
        ReviewDAO::initialize("Review");
        $userId = $_POST['userId'];

        ReviewDAO::removeReview($userId, $reviewId);
        
    }

}

?>