<?php
require_once('inc/pages/CreateAccountPage.class.php');
require_once('inc/utilities/CreateAccountProcessor.class.php');

class CreateAccountApp {
    static $pwValidation = ['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
    static $pageMessageState = ['pwError'=> 'hidden', 'userNameExist' => 'hidden'];
    static $passedColor = 'mediumseagreen';
    static $failedColor = 'crimson';

    static function validateInput() {
        $atLeast8Chars = false;
        if (strlen($_POST['password']) >= 8)
            $atLeast8Chars = true;

        $hasCapitalLetter = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[A-Z]/")));

        $hasSmallLetter = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-z]/")));

        $hasNumber = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[0-9]/")));

        if ($atLeast8Chars)
            self::$pwValidation['length'] = self::$passedColor;
        else
            self::$pwValidation['length'] = self::$failedColor;
        
        if ($hasCapitalLetter)
            self::$pwValidation['capital'] = self::$passedColor;
        else
            self::$pwValidation['capital'] = self::$failedColor;

        if ($hasSmallLetter)
            self::$pwValidation['small'] = self::$passedColor;
        else
            self::$pwValidation['small'] = self::$failedColor;

        if ($hasNumber)
            self::$pwValidation['number'] = self::$passedColor;
        else
            self::$pwValidation['number'] = self::$failedColor;

        return $atLeast8Chars && $hasCapitalLetter && $hasSmallLetter && $hasNumber;
    }

    static function run() {
        if (empty($_POST)) {
            CreateAccountPage::show(self::$pageMessageState,self::$pwValidation);
        }
        else {
            if (self::validateInput()) {
                if ($_POST['action'] == 'create') {
                    if (!CreateAccountProcessor::createAccount()) {
                        self::$pageMessageState['userNameExist'] = '';
                        CreateAccountPage::show(self::$pageMessageState, self::$pwValidation);
                    }
                    else {
                        CreateAccountPage::show(self::$pageMessageState, self::$pwValidation);
                    }
                }
            }
            else {
                self::$pageMessageState['pwError'] = '';
                CreateAccountPage::show(self::$pageMessageState, self::$pwValidation);
            }
        }

    }
}

?>