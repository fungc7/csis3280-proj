<?php
require_once('BasePage.class.php');

class CreateAccountPage extends BasePage {

    static function _body($hidden, $pwValidation) {
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
        <h3 style="color: white">Create Account</h3>

<!-- Start the page's add entry form -->
<div class="form-group">
        <h4>Enter account information below</h4>
        <div class="alert alert-danger" <?= $hidden['emailError'] ?>>
            Invalid email. Please check the email entered.
        </div>
        <div class="alert alert-danger" <?= $hidden['pwError']?>>Unable to create account: Password entered did not meet all requirements.</div>
        <div class="alert alert-danger" <?= $hidden['userNameExist']?>>Unable to create account: Username or Email already used.</div>
        <div class="alert alert-danger" <?= $hidden['ageError']?>>Invalid age input</div>
        <form action="<?php echo SimpleRoute::getBaseURL() . "/join" ?>" method="post">
            <div class="form-outline w-50">
                <label for="username" name="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="form-outline w-50">
                <label for="email" name="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-outline w-50">
                <label for="age" name="age">Age</label>
                <input type="text" class="form-control" name="age" id="age" placeholder="Age" required>
            </div>
            <div class="form-outline w-50">
                <label for="password" name="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <ul>
                <li style="color: <?= $pwValidation['length'] ?>">Password must have at least 8 characters</li>
                <li style="color: <?= $pwValidation['capital'] ?>">Password must contain capital letter</li>
                <li style="color: <?= $pwValidation['small'] ?>">Password must contain smaller letter</li>
                <li style="color: <?= $pwValidation['number'] ?>">Password must contain number</li>
            </ul>
            <input type="hidden" name="action" value="create">
            <div class="g-recaptcha" data-sitekey=<?= RECAPTCHA_KEY ?> data-callback="enableButton"></div>
            <input type="submit" class="btn btn-primary" id="submit-button" value="Create" disabled="disabled">
        </form>
    </div>
    </body>
        <?php
    }
    static function show($hidden, $pwValidation) {
        self::_header();
        self::_body($hidden, $pwValidation);
        self::_footer();
    }
}

?>