CREATE DATABASE IF NOT EXISTs MovieSite;

USE MovieSite;

CREATE TABLE IF NOT EXISTs Movie (
    movieId INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    overview VARCHAR(2000),
    imageUrl VARCHAR(1000) NOT NULL,
    releaseDate DATE NOT NULL,
    backdropUrl VARCHAR(1000) NOT NULL
);

CREATE TABLE IF not EXISTs User (
    userId VARCHAR(256) PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    maskedPw VARCHAR(256) NOT NULL
);

CREATE TABLE IF NOT EXISTs Review (
    reviewId VARCHAR(256) PRIMARY KEY,
    userId VARCHAR(256) ,
    movieId INT,
    content VARCHAR(2000) NOT NULL,
    rating INT,
    reviewDate DATE NOT NULL,
    FOREIGN KEY (movieId) References Movie(movieId),
    FOREIGN KEY (userId) References User(userId)
);

LOAD DATA INFILE 'C:/Temp/movies.csv'
INTO TABLE movie 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA INFILE 'C:/Temp/user.csv' 
INTO TABLE user 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

LOAD DATA INFILE 'C:/Users/ivanf/Downloads/review.csv' 
INTO TABLE review 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

SELECT reviewId, username, title, content, rating, reviewDate
FROM review AS re
LEFT JOIN MOVIE AS mov ON re.movieId = mov.movieId
LEFT JOIN User AS usr ON re.userId = usr.userId;