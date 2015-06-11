<?php
require_once('ConnectionHandler.php');

class Subject
{
    public function showSubjects()
    {

        $user = $_SESSION['user-id'];

        $query = 'SELECT s.name, s.bgcolor FROM user_subject AS us
                  JOIN subject AS s ON s.id_subject = us.subject_id
                  WHERE us.user_id IS NULL OR us.user_id = ?';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $user);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            $result = $statement->get_result();

            $rows = array();

            while ($row = $result->fetch_object()) {
                $rows[] = $row;
            }

            return $rows;
        }

    }
    public function createSubject($sname, $color) {

        $user = $_SESSION['user-id'];

        $query = 'INSERT INTO subject (name, bgcolor) VALUES (?, ?)';
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("ss", $sname, $color);

        if (!$statement->execute()){
            throw new Exception($statement->error);
        } else {

        }
    }
}
