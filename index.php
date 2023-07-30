<?php
require_once('inc/SimpleRoute.class.php');
// App
require_once('inc/HomePageApp.class.php');
require_once('inc/MovieApp.class.php');
require_once('inc/LoginApp.class.php');
require_once('inc/CreateAccountApp.class.php');
require_once('inc/ChangePasswordApp.class.php');
require_once('inc/RemoveReviewApp.class.php');
require_once('inc/SearchMovieApp.class.php');
// Utilities
require_once('inc/utilities/LoginProcessor.class.php');
// Pages
require_once('inc/pages/BasePage.class.php');
require_once('inc/pages/HomePage.class.php');
require_once('inc/pages/MoviePage.class.php');
require_once('inc/pages/NotFoundPage.class.php');
require_once('inc/pages/LoginPage.class.php');

session_start();
SimpleRoute::init("index");
$route = SimpleRoute::getRoute();
function routeToLastVisited() {
    $url = $_SESSION['lastPage'];
    header("Location: {$url}");
    exit;
}

switch($_SERVER['REQUEST_METHOD']) {

    case "POST": // Create / Insert
        switch ($route['page']) {
            case 'login':
                $loginSuccess = LoginProcessor::checkLogin();
                LoginProcessor::updateLoginStatus($loginSuccess);
                if (!$loginSuccess)
                    LoginApp::run("fail");
                else 
                    routeToLastVisited();
                break;

            case 'join':
                $res = CreateAccountApp::run("POST");
                if ($res)
                    LoginApp::run("postAccountCreation");
                break;

            case 'logout':
                LoginProcessor::logout();
                routeToLastVisited();
                break;

            case 'movie':
                if ($route['id'] != '') {
                    MovieApp::run($route['id'], "POST");
                }
                else
                    NotFoundPage::show();
                break;

            case 'changepassword':
                $changePwRes = ChangePasswordApp::run("POST");
                if ($changePwRes) {
                    LoginProcessor::logout();
                    LoginApp::run("postPasswordChange");
                }
                break;
            case 'remove':
                $reviewId = $route['id'];
                RemoveReviewApp::remove($reviewId);
                routeToLastVisited();
                break;
            default:
                NotFoundPage::show();
                break;
        }
        break;
    
    case "GET": // Read / Select
        switch ($route['page']) {
            case 'home':
                $_SESSION['lastPage'] = BASE_URL ;
                HomePageApp::run();
                break;
            case '':
                $_SESSION['lastPage'] = BASE_URL ;
                HomePageApp::run();
                break;
            case 'movie':
                if ($route['id'] != ''){
                    $_SESSION['lastPage'] = BASE_URL . "index/movie/" . $route['id'];
                    MovieApp::run($route['id']);                    
                }
                else
                    NotFoundPage::show();
                break;

            case 'login':
                // Route logged in session to home to prevent duplicated login
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
                    routeToLastVisited();
                else
                    LoginApp::run("default");
                break;

            case 'join':
                // Route logged in session to home to prevent duplicated login
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
                    routeToLastVisited();
                else
                    CreateAccountApp::run("GET");
                break;
            
            case 'changepassword':
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
                    ChangePasswordApp::run("GET");
                else
                    routeToLastVisited();
                break;
            case 'search':
                SearchMovieApp::run();
                break;
            default:
                NotFoundPage::show();
                break;
        }
        break;
}


?>