<?php

require_once('lib/Connectionhandler.php');

Class DisplayTasks
{

    public function sortByPriorityAsc()
    {
        $query = 'SELECT t.description, s.name, tt.type, t.enddate, t.priority FROM task AS t
LEFT JOIN subject AS s ON t.subject_id = s.id_subject
LEFT JOIN task_type AS tt ON t.task_type_id = tt.id_task_type
INNER JOIN user_task AS ut ON t.id_task = ut.task_id
WHERE ut.user_id = ?
ORDER BY t.priority ASC';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $_SESSION['user-id']);

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
