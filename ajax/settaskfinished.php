<?php

require_once('../lib/ConnectionHandler.php');

$tid = $_POST['task_id'];

$query ='UPDATE task
SET finished = true
WHERE id_task = ?';

$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('i', $tid);

if (!$statement->execute()) {
    throw new Exception($statement->error);
}
else {
    echo true;
}

