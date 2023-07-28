<?php
require_once('inc/pages/CreateAccountPage.class.php');
require_once('inc/utilities/CreateAccountProcessor.class.php');
require_once('inc/utilities/PasswordValidator.class.php');

class CreateAccountApp {
    static $pwValidation =['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
    static $pageMessageState = ['pwError'=> 'hidden', 'userNameExist' => 'hidden', 'emailError' => 'hidden'];
    static $passedColor = 'mediumseagreen';
    static $failedColor = 'crimson';

    static function validateInput() {
        $emailValidation = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        
        if (!$emailValidation)
            self::$pageMessageState['emailError'] = "";

        $noPasswordError = PasswordValidator::validatePassword('password');
        self::$pwValidation = PasswordValidator::$pwValidation;
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
                        error_log(implode(", ", self::$pwValidation));
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
