<?php
require_once('../lib/ConnectionHandler.php');
$tid = intval($_POST['task_id']);

$query = 'DELETE FROM task WHERE id_task = ?';


$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('i', $tid);

if (!$statement->execute()) {
    throw new Exception($statement->error);
}
else {
    return true;
}