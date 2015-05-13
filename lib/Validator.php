<?php

class Validator
{
    public function isValidMail($mail)
    {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
}
