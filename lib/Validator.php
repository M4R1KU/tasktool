<?php
require_once('lib/ConnectionHandler.php');

class Validator
{
    public function isValidMail($mail)
    {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    public function isFreeUsername($username)
    {

        $query = 'SELECT username FROM user WHERE username = ?';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $username);
        $statement->execute();

        $result = $statement->get_result();

        $user = $result->fetch_object();

        if ($user == null) {
            return true;
        } else {
            return false;
        }

    }

    public function passwordConfirm($password, $password_conf)
    {
        if ($password == $password_conf) {
            return true;
        } else {
            return false;
        }
    }
}
