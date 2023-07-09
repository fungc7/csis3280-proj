<?php

class LoginPage {
    public static $failLoginMsg = "Incorrect Username or Password.";
    static function _header() {
        ?>
        <!-- Start the page 'header' -->
<!DOCTYPE html>
<html>
<head>
    <title>PHP Project</title>
    <meta charset="utf-8">
    <meta name="author" content="Bambang">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">     
</head>
<body>
    <header>
        <h1><a href="?page=home">Logo</a></h1>
        <h2>Login</h2>
    </header>
        <?php
    }

    static function _body($loginRes) {
        ?>  
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