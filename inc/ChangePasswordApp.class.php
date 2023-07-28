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

                    $oldPwError = $newPwError = $confirmPwError = false;

                    // validate old password
                    UserDAO::initialize("User");
                    $user = UserDAO::getUser($_SESSION['user']);
                    if (count($user) > 0) {
                        if (! $user[0]->verifyPassword($maskedPw)) {
                            self::$pageMessageState['oldPwError'] = '';
                            $oldPwError = true;
                            return ['error' => 'OldPasswordError'];
                        }
                    }
                    
                    // validate new password
                    $noPasswordError = PasswordValidator::validatePassword('newPassword');
                    self::$pwValidation = PasswordValidator::$pwValidation;
                    if (! $noPasswordError) {
                        self::$pageMessageState['newPwError'] = '';
                        $newPwError = true;
                        return ['error' => 'NewPasswordError'];
                    }
                                        
                    // validate confirm password
                    if ($newPassword != $confirmNewPassword){
                        self::$pageMessageState['confirmPwError'] = '';
                        $confirmPwError = true;
                        return ['error' => 'ConfirmPasswordError'];
                    }
                    
                    if (!$oldPwError && !$newPwError && !$confirmPwError) {
                        $updateRes = UserDAO::updatePassword($_SESSION['user'], hash("sha256", $newPassword));
                        if ($updateRes)
                            return ['error' => null];
                        else {
                            self::$pageMessageState['updateError'] = '';
                            ChangePasswordPage::show(self::$pageMessageState,self::$pwValidation, $changePwError);
                            return ['error' => 'UpdateError'];
                        }
                    }
                    else {
                        ChangePasswordPage::show(self::$pageMessageState,self::$pwValidation, $changePwError);
                    }
                }
                return ['error' => 'BadRequest'];
                break;
            default:
                ChangePasswordPage::show(self::$pageMessageState, self::$pwValidation, $changePwError);
                break;
        }

    }
}
