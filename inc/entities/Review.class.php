<?php

class Review
{
    private $reviewId;
    private $username;
    private $content;
    private $rating;
    private $reviewDate;

    public function getReviewId()
    {
        return $this->reviewId;
    }

    public function setReviewId($reviewId)
    {
        $this->reviewId = $reviewId;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }

    public function getReviewDate()
    {
        return $this->reviewDate;
    }

    public function setReviewDate($reviewDate)
    {
        $this->reviewDate = $reviewDate;
    }

    public function getReviewCard() : ReviewCard {
        $card = new ReviewCard($this->reviewId, $this->username, $this->content, $this->rating, $this->reviewDate);
        return $card;
    }
}

?>