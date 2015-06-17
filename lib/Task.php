<?php

/**
 * Created by PhpStorm.
 * User: bkunzm
 * Date: 11.06.2015
 * Time: 14:35
 */
require_once('lib/ConnectionHandler.php');
class Task
{

    private $taskid;
    private $subject;
    private $description;
    private $date;
    private $type;
    private $priority;


    public function updateTask()
    {


        $query = 'UPDATE task SET description = ?, subject_id = ?, task_type_id = ?, enddate = ?, priority = ? WHERE id_task = ?';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('siisii', $this->getDescription(), $this->selectSubjectId($this->getSubject()), $this->selectTaskType($this->getType()), $this->getDate(), $this->getPriority(), $this->getTaskid());

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        } else {
            return true;
        }
    }

    public function createNewTask()
    {

        $query = 'INSERT INTO task (description, subject_id, task_type_id, enddate, priority) VALUES ( ?, ?, ?, ?, ?)';

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('siisi', $this->getDescription(), $this->selectSubjectId($this->getSubject()), $this->selectTaskType($this->getType()), $this->getDate(), $this->getPriority());

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
        $user_id = $_SESSION['user-id'];
        $statement->bind_param('ii', $user_id, $this->selectTaskId());

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

    /**
     * @return mixed
     */
    public function getTaskid()
    {
        return $this->taskid;
    }

    /**
     * @param mixed $taskid
     */
    public function setTaskid($taskid)
    {
        $this->taskid = $taskid;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }


}