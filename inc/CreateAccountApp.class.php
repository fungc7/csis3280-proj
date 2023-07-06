<?php
require_once('inc/pages/CreateAccountPage.class.php');
require_once('inc/utilities/CreateAccountProcessor.class.php');

class CreateAccountApp {
    static $pwValidation = ['length' => '', 'capital' => '', 'small' => '', 'number' => ''];

    static function validateInput() {
        $atLeast8Chars = false;
        if (strlen($_POST['password']) >= 8)
            $atLeast8Chars = true;

        $hasCapitalLetter = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[A-Z]/")));

        $hasSmallLetter = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-z]/")));

        $hasNumber = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[0-9]/")));

        if ($atLeast8Chars)
            self::$pwValidation['length'] = 'green';
        else
            self::$pwValidation['length'] = 'red';
        
        if ($hasCapitalLetter)
            self::$pwValidation['capital'] = 'green';
        else
            self::$pwValidation['capital'] = 'red';

        if ($hasSmallLetter)
            self::$pwValidation['small'] = 'green';
        else
            self::$pwValidation['small'] = 'red';

        if ($hasNumber)
            self::$pwValidation['number'] = 'green';
        else
            self::$pwValidation['number'] = 'red';

        return $atLeast8Chars && $hasCapitalLetter && $hasSmallLetter && $hasNumber;
    }

    static function run() {
        if (empty($_POST)) {
            CreateAccountPage::show('hidden',self::$pwValidation);
        }
        else {
            if (self::validateInput()) {
                if ($_POST['action'] == 'create') {
                    $msg = CreateAccountProcessor::createAccount();
                    echo $msg;
                }
            }
            else {
                CreateAccountPage::show('',self::$pwValidation);
            }
        }

    }
}

?>