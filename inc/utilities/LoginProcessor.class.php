<?php

class LoginProcessor {
    static function checkLogin(): bool {
        $usernameEmail = $_POST["username-email"];
        $maskedPw = $_POST["password"];
        # 123
        if ($maskedPw != "123") {
            return false;
        }
        if ($usernameEmail != "Ivan" && $usernameEmail != "abc@example.com") {
            return false;
        }
        return true;
    } 
}

?>