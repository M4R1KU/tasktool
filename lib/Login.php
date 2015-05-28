<?php
require_once('ConnectionHandler.php');

class Login
{

    public function register($name, $email, $username, $password)
    {
        $query = 'INSERT INTO user (name, email, username, password) VALUES (?, ?, ?, ?)';

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
            return false;
        }
        else {

            $query = 'SELECT id_user FROM user WHERE username = ?';

            $statement = ConnectionHandler::getConnection()->prepare($query);
            $statement->bind_param('s', $username);

            if (!$statement->execute()) {
                throw new Exception($statement->error);
            }
            else {
                $result = $statement->get_result();
                $row = $result->fetch_row();

                $_SESSION['user-id'] = intval($row[0]);
                $_SESSION['login-user'] = $username;
                header("location: /index.php");

            }


            return true;
        }
    }
}