<?php

class MovieCard {
    private $movieId;
    private $overview;
    private $title;
    private $imageUrl;
    private $backdropUrl;
    private $IMAGE_URL_PREFIX = IMAGE_URL;

    public function __construct($movieId, $overview, $title, $imageUrl, $backdropUrl)
    {
        $this->movieId = $movieId;
        $this->overview = $overview;
        $this->title = $title;
        $this->imageUrl = $imageUrl;
        $this->backdropUrl = $backdropUrl;
    }

    // getter
    function getMovieId() { return $this->movieId; }
    function getOverview() { return $this->overview;}
    function getTitle() { return $this->title; }
    function getImageUrl() { return $this->imageUrl; }
    function getBackdropUrl() { return $this->backdropUrl; }
    // setter
    function setMovieId($movieId)  { $this->movieId = $movieId; }
    function setOverview($overview) { $this->overview = $overview; }
    function setTitle($title) { $this->title = $title; }
    function setImageUrl($url) { $this->imageUrl = $url; }
    function setBackdropUrl($url) { $this->backdropUrl = $url; }

    function render() {
        ?>
        <div class="movie card">
            <a href="?movie=<?php echo $this->getMovieId(); ?>">
                <img src="<?php echo $this->IMAGE_URL_PREFIX . $this->getImageUrl();?>"/>
            </a>
            <div class="movie-info">
                <h3><?php echo $this->getTitle(); ?></h3>
                <span class="orange">6.6</span>
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