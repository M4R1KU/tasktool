<?php
require_once('ConnectionHandler.php');

Class CreateTask
{


    public function createNewTask($description, $subject, $type, $enddate, $priority)
    {
        $query = 'INSERT INTO task (description, subject_id, task_type_id, enddate, priority) VALUES ( ?, ?, ?, ?, ?)';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('siisi', $description, $this->selectSubjectId($subject), $this->selectTaskType($type), $enddate, $priority);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            if ($this->insertIntoUserTask()) {
                return true;
            }
            return false;
        }
    }

    private function selectTaskId()
    {
        $query = 'SELECT id_task FROM task ORDER BY id_task DESC LIMIT 1';

        $statement = ConnectionHandler::getConnection()->prepare($query);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            $result = $statement->get_result();
            $row = $result->fetch_row();
            return $row[0];
        }
    }

    private function insertIntoUserTask()
    {
        $query = 'INSERT INTO user_task (user_id, task_id) VALUES ( ?, ?)';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ii',$_SESSION['user-id'], $this->selectTaskId());

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            return true;
        }

    }

    private function selectSubjectId($subject)
    {
        $select1 = 'SELECT id_subject FROM subject WHERE name = ?';

        $statement = ConnectionHandler::getConnection()->prepare($select1);
        $statement->bind_param('s', $subject);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            $result = $statement->get_result();
            $row = $result->fetch_row();
            return $row[0];
        }
    }

    private function selectTaskType($type)
    {
        $select2 = 'SELECT id_task_type FROM task_type WHERE type = ?';

        $statement = ConnectionHandler::getConnection()->prepare($select2);
        $statement->bind_param('s', $type);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            $result = $statement->get_result();
            $row = $result->fetch_row();
            return $row[0];
        }
    }

}

?>