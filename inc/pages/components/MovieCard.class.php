<?php

class MovieCard {
    private $movieId;
    private $overview;
    private $title;
    private $imageUrl;
    private $backdropUrl;
    private $avgRating;
    private $IMAGE_URL_PREFIX = IMAGE_URL;

    public function __construct($movieId, $overview, $title, $imageUrl, $backdropUrl, $avgRating)
    {
        $this->movieId = $movieId;
        $this->overview = $overview;
        $this->title = $title;
        $this->imageUrl = $imageUrl;
        $this->backdropUrl = $backdropUrl;
        $this->avgRating = $avgRating;
    }

    // getter
    function getMovieId() { return $this->movieId; }
    function getOverview() { return $this->overview;}
    function getTitle() { return $this->title; }
    function getImageUrl() { return $this->imageUrl; }
    function getBackdropUrl() { return $this->backdropUrl; }
    function getAvgRating() { return $this->avgRating; }
    // setter
    function setMovieId($movieId)  { $this->movieId = $movieId; }
    function setOverview($overview) { $this->overview = $overview; }
    function setTitle($title) { $this->title = $title; }
    function setImageUrl($url) { $this->imageUrl = $url; }
    function setBackdropUrl($url) { $this->backdropUrl = $url; }

    function render() {
        ?>
        <div class="movie card">
            <a href="<?php echo SimpleRoute::getBaseURL() . "/movie/" . $this->getMovieId(); ?>">
                <img src="<?php echo $this->IMAGE_URL_PREFIX . $this->getImageUrl();?>"/>
            </a>
            <div class="movie-info">
                <h3><?php echo $this->getTitle(); ?></h3>
                <span class="orange"><?php printf("%.1f", $this->getAvgRating()); ?></span>
            </div>
            <div class="overview">
                <h3>Overview</h3>
                <?php echo $this->getOverview(); ?>
            </div>
        </div>

        <?php
    }
    
}

?>