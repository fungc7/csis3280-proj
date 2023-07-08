<?php

class ReviewCard
{
    private $reviewId;
    private $username;
    private $content;
    private $rating;
    private $reviewDate;

    public function __construct($reviewId, $username, $content, $rating, $reviewDate)
    {
        $this->reviewId = $reviewId;
        $this->username = $username;
        $this->content = $content;
        $this->rating = $rating;
        $this->reviewDate = $reviewDate;
    }

    // Getter and Setter methods for review-related attributes
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

    // Other existing getter and setter methods (for non-review attributes) remain the same

    public function render()
    {
?>
        <div class="card">
            <h6 class="font-weight-bold"><?php echo $this->getUsername(); ?></h6>
            <div class="movie-info">
                <p class="font-weight-normal"><?php echo $this->getContent(); ?></p>
                <span class="orange"><?php echo $this->getRating(); ?></span>
            </div>
            <footer class="font-weight-light"><?php echo $this->getReviewDate(); ?></footer>
        </div>
<?php
    }
}


?>