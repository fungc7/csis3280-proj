<?php
require_once('inc/entities/User.class.php');

class LoginProcessor {
    static function checkLogin(): bool {
        UserDAO::initialize('User');
        $usernameEmail = $_POST["username-email"];
        $maskedPw = hash("sha256", $_POST["password"]);
        $users = UserDAO::getUser($usernameEmail);
        if (count($users) > 0) {
            if ($users[0]->verifyPassword($maskedPw)) {
                $_SESSION['user'] = $users[0]->getUsername();
                $_SESSION['userid'] = $users[0]->getUserId();
                return true;
            }
        }
        return false;
    }
    static function logout () {
        $_SESSION['loggedin'] = false;
    }
    static function updateLoginStatus(bool $loginRes) {
        if ($loginRes) 
            $_SESSION['loggedin'] = true;
        else
            $_SESSION['loggedin'] = false;
    }
}

?>