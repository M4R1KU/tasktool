<?php
require_once('../lib/ConnectionHandler.php');

$tid = $_POST['task_id'];

$query = 'SELECT t.description, t.enddate, t.priority, s.name, tt.type FROM task AS t
LEFT JOIN subject AS s ON t.subject_id = s.id_subject
LEFT JOIN task_type AS tt ON t.task_type_id = tt.id_task_type
WHERE t.id_task = ?';

$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('i', $tid);

if(!$statement->execute()){
    throw new Exception($statement->error);
}

$result = $statement->get_result();

$row = $result->fetch_assoc();

echo json_encode($row);