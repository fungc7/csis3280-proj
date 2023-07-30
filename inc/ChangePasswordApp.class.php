<?php
require_once('inc/pages/ChangePasswordPage.class.php');
require_once('inc/utilities/PasswordValidator.class.php');
require_once('inc/utilities/UserDAO.class.php');
require_once('inc/entities/User.class.php');

class ChangePasswordApp {
    static $pwValidation = ['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
    static $pageMessageState = ['oldPwError'=> 'hidden', 'newPwError' => 'hidden', 'confirmPwError' => 'hidden', 'updateError' => 'hidden'];
    static $passedColor = 'mediumseagreen';
    static $failedColor = 'crimson';

    static function run($method, $changePwError = false) {
        
        switch ($method) {
            case 'GET':
                ChangePasswordPage::show(self::$pageMessageState,self::$pwValidation, $changePwError);
                break;
            case 'POST':
                if ($_POST['action'] == 'update') {
                    $confirmNewPassword = $_POST['confirmNewPassword'];
                    $newPassword = $_POST['newPassword'];
                    $oldPassword = $_POST['oldPassword'];
                    $maskedPw = hash("sha256", $oldPassword);

                    $validOldPw  = true;
                    $confirmPwError = false;
                    
                    // validate old password
                    UserDAO::initialize("User");
                    $user = UserDAO::getUser($_SESSION['user']);
                    if (count($user) > 0) {
                        if (! $user[0]->verifyPassword($maskedPw)) {
                            $validOldPw = false;
                            self::$pageMessageState['oldPwError'] = '';
                        }
                    }
                    
                    // validate new password
                    $validNewPw = PasswordValidator::validatePassword('newPassword');
                    self::$pwValidation = PasswordValidator::$pwValidation;
                    if (! $validNewPw)
                        self::$pageMessageState['newPwError'] = '';
                                        
                    // validate confirm password
                    if ($newPassword != $confirmNewPassword) {
                        self::$pageMessageState['confirmPwError'] = '';
                        $confirmPwError = true;
                    }
                    
                    // log validation result
                    error_log("validOldPw: $validOldPw, validNewPw: $validNewPw, confirmPwError: $confirmPwError");

                    // Post Pw validation handling
                    if ($validOldPw && $validNewPw && !$confirmPwError) {
                        return UserDAO::updatePassword($_SESSION['user'], hash("sha256", $newPassword));
                    }
                    else 
                        ChangePasswordPage::show(self::$pageMessageState,self::$pwValidation, $changePwError);
                }
                break;
            default:
                ChangePasswordPage::show(self::$pageMessageState, self::$pwValidation, $changePwError);
                break;
        }

    }
}
