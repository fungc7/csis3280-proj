<?php
require_once('pages/LoginPage.class.php');
require_once('utilities/LoginProcessor.class.php');

class LoginApp {
    static function run() {
        LoginPage::show();

        if (!empty($_POST)) {
            $res = LoginProcessor::checkLogin();
            if ($res)
                echo 'Yes';
            else
                echo 'NO';
        }
    }
}
?>