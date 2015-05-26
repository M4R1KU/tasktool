<?php

require_once('lib/Connectionhandler.php');

Class DisplayTasks
{

    public function sortByPriority()
    {

        $query = 'SELECT t.description, s.name, tt.type, t.enddate, t.priority FROM task AS LEFT JOIN subject AS s ON t.subject_id = s.id_subject LEFT JOIN task_type AS tt ON t.task_type_id = tt.id_task_type ORDER BY t.priority ASC';

        $statement = ConnectionHandler::getConnection()->prepare($query);

        $statement->execute();

        $result = $statement->get_result();

        if (!$result) {
            throw new Exception($statement->error);
        } else {
            $rows = array();
            while ($row = $result->fetch_row()) {
                $rows[] = $row;
            }

            print_r($rows);
            return true;
        }
    }

}
