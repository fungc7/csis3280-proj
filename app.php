<?php
// require_once('inc/utilities/LoginProcessor.class.php');
// require_once('inc/pages/LoginPage.class.php');
require_once('inc/config.inc.php');
require_once('inc/LoginApp.class.php');
require_once('inc/CreateAccountApp.class.php');
require_once('inc/HomePageApp.class.php');
require_once('inc/MovieApp.class.php');
require_once('inc/pages/HomePage.class.php');
require_once('inc/pages/NotFoundPage.class.php');
require_once('inc/pages/MoviePage.class.php');


if (!isset( $_GET['page'] ) && !isset( $_GET['movie'] )) {
    HomePageApp::run();
}
else {
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'join':
                CreateAccountApp::run();
                break;
            case 'login':
                LoginApp::run();
                break;
            case 'home':
                HomePageApp::run();
                break;
            default:
                NotFoundPage::show();
                break;
        }
    }
    if (isset($_GET['movie'])) {
        MovieApp::run();
    }
    
} 


// ;

?>