<?php
require_once('ConnectionHandler.php');

class Login
{

    public function register($name, $email, $username, $password)
    {
        $query = 'INSERT INTO USER (name, email, username, password) VALUES (?, ?, ?, ?)';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $name, $email, $username, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            return true;
        }

    }
}
