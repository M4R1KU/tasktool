<?php
require_once('lib/ConnectionHandler.php');

class Validator
{
    public function isValidMail($mail)
    {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function passwordConfirm($pw, $pwc)
    {
        if ($pw == $pwc && $this->valid_pass($pw)) {
            return true;
        } else {
            return false;
        }
    }

    public function valid_pass($candidate)
    {
        if (preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}$/', $candidate)) {
            return true;
        } else {
            return false;
        }
    }

    public
    function valid_name($name)
    {
        if (preg_match('/[A-Z][a-z]*[ ][A-Z][a-z]*/', $name)) {
            return true;
        } else {
            return false;
        }
    }
}
