<?php
require_once('ConnectionHandler.php');

Class CreateTask
{

    public function createNewTask($description, $subject, $type, $enddate, $priority)
    {

        $query = 'INSERT INTO task (description, subject_id, task_type_id, enddate, priority) VALUES (?, (SELECT id_subject FROM subject WHERE name = ?), (SELECT id_task_type FROM task_type WHERE type = ?), ?, ?)';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('siisi', $description, $subject, $type, $enddate, $priority);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            return true;
        }
    }

}

?>