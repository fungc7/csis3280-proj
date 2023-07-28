<?php
require_once('inc/entities/User.class.php');

class LoginProcessor {
    static function checkLogin(): bool {
        UserDAO::initialize('User');
        $usernameEmail = $_POST["username-email"];
        $pw = $_POST["password"];
        if (strlen($usernameEmail) == 0 || strlen($pw) == 0)
            return false;
        $maskedPw = hash("sha256", $pw);
        $usersByName = UserDAO::getUser($usernameEmail);
        if (count($usersByName) > 0) {
            if ($usersByName[0]->verifyPassword($maskedPw)) {
                $_SESSION['user'] = $usersByName[0]->getUsername();
                $_SESSION['userid'] = $usersByName[0]->getUserId();
                return true;
            }
        }
        $usersByEmail = UserDAO::getUserByEmail($usernameEmail);
        if (count($usersByEmail) > 0 ) {
            if ($usersByEmail[0]->verifyPassword($maskedPw)) {
                $_SESSION['user'] = $usersByEmail[0]->getUsername();
                $_SESSION['userid'] = $usersByEmail[0]->getUserId();
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