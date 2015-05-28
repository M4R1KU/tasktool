<?php
require_once('ConnectionHandler.php');

class Subject
{
    public function showSubjects()
    {

        $query = 'SELECT name, bgcolor FROM subject';

        $statement = ConnectionHandler::getConnection()->prepare($query);

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
}
