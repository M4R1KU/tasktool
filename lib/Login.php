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

    public function login_user($username, $password)
    {
        $query = 'SELECT username, password FROM user WHERE username = ? and password = ?';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ss', $username, $password);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        $result = $statement->get_result();

        $row = $result->fetch_object();

        if ($row == null) {
            echo '<p>false</p>';
            return false;
        }
        else {
            echo '<p>true</p>';

            $_SESSION['login-user'] = $username;

            return true;
        }
    }
}