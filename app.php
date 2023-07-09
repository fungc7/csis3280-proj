<?php
// require_once('inc/utilities/LoginProcessor.class.php');
// require_once('inc/pages/LoginPage.class.php');
require_once('inc/config.inc.php');
require_once('inc/LoginApp.class.php');
require_once('inc/CreateAccountApp.class.php');
require_once('inc/HomePageApp.class.php');
require_once('inc/MovieApp.class.php');
require_once('inc/pages/BasePage.class.php');
require_once('inc/pages/HomePage.class.php');
require_once('inc/pages/NotFoundPage.class.php');
require_once('inc/pages/MoviePage.class.php');
require_once('inc/utilities/LoginProcessor.class.php');

session_start();
$loggedFailed = false;

// login handling
if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $loginRes = LoginProcessor::checkLogin();
    LoginProcessor::updateLoginStatus($loginRes);

    if (!$loginRes) {
        LoginApp::run("fail");
        $loggedFailed = true;
    }
}

if (empty($_GET)) {
    if (! $loggedFailed)
        // error_log('Empty');
        HomePageApp::run();
}
else {
    // page router
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'join':
                CreateAccountApp::run();
                break;
            case 'login':
                LoginApp::run("default");
                break;
            case 'home':
                error_log('Home');
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