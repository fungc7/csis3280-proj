<?php

class Movie {
    private $movieId;
    private $title;
    private $overview;
    private $imageUrl;
    private $releaseDate;
    private $backdropUrl;
    private $avgRating;

    public function getMovieId() {
        return $this->movieId;
    }

    public function setMovieId($movieId) {
        $this->movieId = $movieId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getOverview() {
        return $this->overview;
    }

    public function setOverview($overview) {
        $this->overview = $overview;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function getReleaseDate() {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate) {
        $this->releaseDate = $releaseDate;
    }

    public function getBackdropUrl() {
        return $this->backdropUrl;
    }

    public function setBackdropUrl($backdropUrl) {
        $this->backdropUrl = $backdropUrl;
    }

    public function getAvgRating() {
        return $this->avgRating;
    }

    public function getMovieCard() : MovieCard {
        $card = new MovieCard($this->movieId, $this->overview, $this->title, $this->imageUrl, $this->backdropUrl, $this->avgRating);
        return $card;
    }
}


?>