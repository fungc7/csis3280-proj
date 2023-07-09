<?php
require_once('pages/LoginPage.class.php');
require_once('utilities/LoginProcessor.class.php');

class LoginApp {
    static function run($mode) {
        LoginPage::show($mode);
    }
}
?>