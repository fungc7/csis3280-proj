<?php
require_once('inc/pages/CreateAccountPage.class.php');
require_once('inc/utilities/CreateAccountProcessor.class.php');
require_once('inc/utilities/PasswordValidator.class.php');

class CreateAccountApp {
    static $pwValidation =['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
    static $pageMessageState = ['pwError'=> 'hidden', 'userNameExist' => 'hidden', 'emailError' => 'hidden', 'ageError' => 'hidden'];
    static $passedColor = 'mediumseagreen';
    static $failedColor = 'crimson';

    static function validateInput() {
        // Username validate implemented at the HTML REQUIRED attribute
        // email validation
        $emailValidation = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        
        if (!$emailValidation)
            self::$pageMessageState['emailError'] = "";

        // age validation
        $ageValidation = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT, ["options" => ["min_range"=> 0, "max_range"=> 120]]);

        if (!$ageValidation)
            self::$pageMessageState['ageError'] = "";

        // validate new password requirements
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
