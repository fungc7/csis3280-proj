<?php
require_once('inc/utilities/UserDAO.class.php');

class CreateAccountProcessor {
    static function checkUsernameAndEmailAvailable(): bool {
        UserDAO::initialize('User');
        $userId = hash("sha256", $_POST["username"]);
        // check username
        $res = UserDAO::getUser($_POST['username']);
        if (count($res) > 0)
            return false;
        
        // check email
        $res = UserDAO::getUserByEmail($_POST['email']);
        if (count($res) > 0)
            return false;
        return true;
    }
    static function createAccount() {
        if (self::checkUsernameAndEmailAvailable()) {
            $username = $_POST["username"];
            $userId = hash("sha256", $_POST["username"]);
            $maskedPw = hash("sha256",$_POST["password"]);
            $age = $_POST['age'];
            $email = $_POST['email'];
            $user = new User();
            $user->setUserId($userId);
            $user->setUsername($username);
            $user->setMaskedPw($maskedPw);
            $user->setEmail($email);
            $user->setAge($age);
            UserDAO::initialize('User');

            UserDAO::createUser($user);
            return true;
        }
        return false;
    } 
}

?>