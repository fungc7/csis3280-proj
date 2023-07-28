<?php

class PasswordValidator {
    static $pwValidation = ['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
    static $passedColor = 'mediumseagreen';
    static $failedColor = 'crimson';

    
    static function validatePassword($inputFieldKey) {
        $atLeast8Chars = false;
        if (strlen($_POST[$inputFieldKey]) >= 8)
            $atLeast8Chars = true;

        $hasCapitalLetter = filter_input(INPUT_POST, $inputFieldKey, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[A-Z]/")));

        $hasSmallLetter = filter_input(INPUT_POST, $inputFieldKey, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[a-z]/")));

        $hasNumber = filter_input(INPUT_POST, $inputFieldKey, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[0-9]/")));

        if ($atLeast8Chars)
            self::$pwValidation['length'] = self::$passedColor;
        else
            self::$pwValidation['length'] = self::$failedColor;

        if ($hasCapitalLetter)
            self::$pwValidation['capital'] = self::$passedColor;
        else
            self::$pwValidation['capital'] = self::$failedColor;

        if ($hasSmallLetter)
            self::$pwValidation['small'] = self::$passedColor;
        else
            self::$pwValidation['small'] = self::$failedColor;

        if ($hasNumber)
            self::$pwValidation['number'] = self::$passedColor;
        else
            self::$pwValidation['number'] = self::$failedColor;
        
        $noPasswordError = $atLeast8Chars && $hasCapitalLetter && $hasSmallLetter && $hasNumber;
        // No password error, reset the color of password critirea as default
        if ($noPasswordError)
            self::$pwValidation = ['length' => '', 'capital' => '', 'small' => '', 'number' => ''];
        return $noPasswordError;
    }
}

?>