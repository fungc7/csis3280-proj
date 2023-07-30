<?php

class ChangePasswordPage extends BasePage
{
    static function _body($hidden, $pwValidation, $changePwError)
    {
        $hideChangePwError = 'hidden';
        if ($changePwError)
            $hideChangePwError = '';
?>
        <body>
            <header>
                <?= self::_logo() ?>
            </header>
            <?= self::_menuBar() ?><br>
            <h3 style="color: white">Change Password</h3>
            
            <div class="form-group">
            <div class="alert alert-danger" <?= $hideChangePwError ?>>
            Unable to update password at this time. Please try again later.
        </div>
            <div class="alert alert-danger" <?= $hidden['oldPwError'] ?>>
            Incorrect original password.
        </div>
        <div class="alert alert-danger" <?= $hidden['newPwError']?>>
        New password does not meet all requirements
        </div>
        <div class="alert alert-danger" <?= $hidden['confirmPwError']?>>
        New passwords do not match
    </div>
                <form action="<?php echo SimpleRoute::getBaseURL() . "/changepassword" ?>" method="post">
                    <div class="form-outline w-50">
                        <label for="password" name="password">Original Password</label>
                        <input type="password" class="form-control" name="oldPassword" placeholder="Password" required>
                    </div>
                    <div class="form-outline w-50">
                        <label for="password" name="password">New Password</label>
                        <input type="password" class="form-control" name="newPassword" placeholder="Password" required>
                    </div>
                    <div class="form-outline w-50">
                        <label for="password" name="password">Confirm New Password</label>
                        <input type="password" class="form-control" name="confirmNewPassword" placeholder="Password" required>
                    </div>
                    <ul>
                        <li style="color: <?= $pwValidation['length'] ?>">New password must have at least 8 characters</li>

                        <li style="color: <?= $pwValidation['capital'] ?>">New password must contain capital letter</li>
                        <li style="color: <?= $pwValidation['small'] ?>">New password must contain smaller letter</li>
                        <li style="color: <?= $pwValidation['number'] ?>">New password must contain number</li>
                    </ul>
                    <input type="hidden" name="action" value="update">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
        </body>
<?php
    }

    static function show($pageErrMsg, $pwValidation, $changePwError)
    {
        self::_header();
        self::_body($pageErrMsg, $pwValidation, $changePwError);
        self::_footer();
    }
}

?>