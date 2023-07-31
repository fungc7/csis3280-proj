<?php
require_once('BasePage.class.php');

class LoginPage extends BasePage{
    public static $failLoginMsg = "Incorrect Username or Password.";
    public static $postAccountCreationMsg = "Create account successful! Please try to login with the new account!";
    public static $postPasswordChangeMsg = "Update password successful! Please login again with the new password.";

    static function _body($mode) {
        ?> 
        <body>
            <script src="https://www.google.com/recaptcha/api.js" async defer ></script>
            <script>
                function enableButton() {
                    document.getElementById("submit-button").disabled = false;
                }
            </script>
            <header>
            <?= self::_logo() ?>
            </header>
            <?= self::_menuBar() ?><br> 
            <h3 style="color: white">User Login</h3>
            <?php
            switch ($mode) {
                case "success":
                    break;
                case "fail";
                    echo "<div class=\"alert alert-danger\">" . self::$failLoginMsg . "</div>";
                    break;
                case "postAccountCreation":
                    echo "<div class=\"alert alert-success\">" . self::$postAccountCreationMsg . "</div>";
                    break;
                case "postPasswordChange":
                    echo "<div class=\"alert alert-success\">" . self::$postPasswordChangeMsg . "</div>";
                    break;
                default:
                    break;
            }
            ?>
            <div class="form-group">
                <form action="<?php 
                    // if (isset($_SESSION['lastPage']))
                    //     echo $_SESSION['lastPage'];
                    // else
                        echo SimpleRoute::getBaseURL() . "/login"; 
                ?>" method="post">
                    <div class="form-outline w-50">
                        <label for="username-email" name="username-email"> Username Or Email</label>
                        <input type="text" class="form-control" name="username-email" id="username-email" placeholder="User name"><br>
                    </div>
                    <div class="form-outline w-50">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"><br>    
                    </div>
                    <input type="hidden" name="action" value="login">
                    <div class="g-recaptcha" data-sitekey=<?= RECAPTCHA_KEY ?> data-callback="enableButton"></div>
                    <input type="submit" id="submit-button" class="btn btn-dark" value="Login" disabled="disabled">
                </form>
            </div>
        </body>
        <?php
    }

    static function show($mode) {
        self::_header();
        self::_body($mode);
        self::_footer();
    }
}

?>