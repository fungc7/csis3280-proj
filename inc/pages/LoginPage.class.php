<?php

class LoginPage {
    static function _header() {
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
        <h2>Login</h2>
    </header>
    <article>
        <?php
    }

    static function _form() {
        ?>
        <section class="main">

<!-- Start the page's add entry form -->
<section class="form1">
    <form action="?" method="post">
        <label for="username-email" name="username-email"> Username Or Email</label>
        <input type="text" name="username-email" id="username-email" placeholder="MyUserName"><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="abc@example.com"><br>
        <input type="hidden" name="action" value="create">
        <input type="submit" value="Login">
    </form>
</section>
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

    static function show() {
        self::_header();
        self::_form();
        self::_footer();
    }
}

?>