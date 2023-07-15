<?php
require_once('BasePage.class.php');

class LoginPage extends BasePage{
    public static $failLoginMsg = "Incorrect Username or Password.";
    public static $postAccountCreationMsg = "Create account successful! Please try to login with the new account!";

    static function _body($mode) {
        ?> 
        <body>
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
                    <input type="submit" class="btn btn-dark" value="Login">
                </form>
            </div>
        </body>
        <?php
    }

    static function _footer() {
        ?>
            <!-- Start the page's footer -->            
    </body>

</html>
        <?php
    }

    static function show($mode) {
        self::_header();
        self::_body($mode);
        self::_footer();
    }
}

?>