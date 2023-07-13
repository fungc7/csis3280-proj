<?php
require_once('BasePage.class.php');

class LoginPage extends BasePage{
    public static $failLoginMsg = "Incorrect Username or Password.";

    static function _body($loginRes) {
        ?> 
        <body>
            <header>
                <h1><a href="?page=home">Logo</a></h1>
            </header>
            <?= self::_menuBar() ?><br> 
            <h3 style="color: white">User Login</h3>
            <?php
            switch ($loginRes) {
                case "success":
                    break;
                case "fail";
                    echo "<div class=\"alert alert-danger\">" . self::$failLoginMsg . "</div>";
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
                        echo htmlspecialchars($_SERVER["PHP_SELF"]); 
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

    static function show($loginRes) {
        self::_header();
        self::_body($loginRes);
        self::_footer();
    }
}

?>