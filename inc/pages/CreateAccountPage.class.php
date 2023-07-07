<?php

class CreateAccountPage {
    static function _header(){
        ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title>PHP Project</title>
                <meta charset="utf-8">
                <meta name="author" content="Bambang">
                <link href="style.css" rel="stylesheet">     
            </head>
            <body>
                <header>
                    <h1><a href="?page=home">Logo</a></h1>
                    <h2>Create Account</h2>
                </header>
        <article>
        <?php
    }
    static function _footer() {
        ?>
            <!-- Start the page's footer -->            
            </article>
    </body>

</html>

        <?php
    }
    static function _body($hidden, $validation) {
        ?>
        <section class="main">

<!-- Start the page's add entry form -->
<section class="form1">
        <h3>Enter account information below</h3>
        <h4 style="color:red; font:bold;" <?= $hidden['pwError']?>>** Unable to create account: Password entered did not meet all requirements.</h4>
        <h4 style="color:red; font:bold;" <?= $hidden['userNameExist']?>>** Unable to create account: Username already used.</h4>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" id="username" placeholder="Username" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" id="password" placeholder="" required></td>
                </tr>
                <tr>
                    <td><ul>
                        <li style="color: <?= $validation['length'] ?>">Password must have at least 8 characters</li>
                        <li style="color: <?= $validation['capital'] ?>">Password must contain capital letter</li>
                        <li style="color: <?= $validation['small'] ?>">Password must contain smaller letter</li>
                        <li style="color: <?= $validation['number'] ?>">Password must contain number</li>
                    </ul></td>
                    <td></td>
                </tr>                                                
            </table>
            <input type="hidden" name="action" value="create">
            <input type="submit" value="Create">
        </form>
    </section>
        <?php
    }
    static function show($hidden, $validation) {
        self::_header();
        self::_body($hidden, $validation);
        self::_footer();
    }
}

?>