<?php
// App constant
define('AUTHOR', 'Ivan Fung');
define('STUDENT_ID', '300371938');
define("IMAGE_URL", "https://image.tmdb.org/t/p/w1280");
define("PROJECT_NAME", "BDMI");
define("RECAPTCHA_KEY", "6LeVbmMnAAAAAG5Rbh1Xp5DZIXGmRwrsJXpXPpx4");
// DB config
define("DB_HOST", "localhost");  
define("DB_USER", "root");  
define("DB_PASS", "");  
define("DB_NAME", "MovieSite");  
define("DB_PORT", "");

// URL
define("BASE_URL", "http://localhost/bdmi/");
define("BASE_FOLDER", "/bdmi/");

// Log config
ini_set("date.timezone", "America/Vancouver");
ini_set("log_errors", 1);
ini_set("error_log", "log/error_log.txt");
?>