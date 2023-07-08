<?php

class BasePage {
    static $pageTitle = "";

    static function _header() {
        ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="Bambang">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title><?= self::$pageTitle ?></title>   
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
                <link href="css/style.css" rel="stylesheet">
            </head>
        <?php
    }
    static function _footer() {
        ?>
        </html>
        <?php
    }

}

?>