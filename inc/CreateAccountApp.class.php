<?php
require_once('inc/pages/CreateAccountPage.class.php');
require_once('inc/utilities/CreateAccountProcessor.class.php');

class CreateAccountApp {
    static $pwValidation = ['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
    static $pageMessageState = ['pwError'=> 'hidden', 'userNameExist' => 'hidden', 'emailError' => 'hidden'];
    static $passedColor = 'mediumseagreen';
    static $failedColor = 'crimson';

    static function validateInput() {
        $atLeast8Chars = false;
        if (strlen($_POST['password']) >= 8)
            $atLeast8Chars = true;
        $emailValidation = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $hasCapitalLetter = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[A-Z]/")));

        $hasSmallLetter = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-z]/")));

        $hasNumber = filter_input(INPUT_POST, 'password', FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[0-9]/")));

        if ($atLeast8Chars)
            self::$pwValidation['length'] = self::$passedColor;
        else
            self::$pwValidation['length'] = self::$failedColor;
        if (!$emailValidation)
            self::$pageMessageState['emailError'] = "";
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

        $noPasswordError = $atLeast8Chars && $hasCapitalLetter && $hasSmallLetter && $hasNumber;
        // No password error, reset the color of password critirea as default
        if ($noPasswordError)
            self::$pwValidation = ['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
        return [
            'email' => $emailValidation,
            'password' => $noPasswordError
        ];
    }

    static function run($method) {
        switch ($method) {
            case 'GET':
                CreateAccountPage::show(self::$pageMessageState,self::$pwValidation);
                break;
            case 'POST':
                if ($_POST['action'] == 'create') {
                    $validationRes = self::validateInput();
                    if ($validationRes['email'] && $validationRes['password']) {       
                        $createAccountRes = CreateAccountProcessor::createAccount();
                        if (!$createAccountRes) {
                            self::$pageMessageState['userNameExist'] = '';
                            CreateAccountPage::show(self::$pageMessageState, self::$pwValidation);
                        }
                        else
                            return true;
                    }
                    else {
                        if (!$validationRes['password'])
                            self::$pageMessageState['pwError'] = '';
                           
                        if (!$validationRes['email'])
                            self::$pageMessageState['emailError'] = '';
                        print_r(self::$pwValidation);
                        CreateAccountPage::show(self::$pageMessageState, self::$pwValidation);
                    }
                }
                return false;
                break;
            default:
                CreateAccountPage::show(self::$pageMessageState, self::$pwValidation);
                break;
        }

    }
}
