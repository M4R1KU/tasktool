<?php

//sql statement to sort the task by priority ascending
session_start();
require_once('../lib/ConnectionHandler.php');

$query = 'SELECT t.id_task, t.description, t.finished, t.enddate, t.priority, tt.type, s.name, s.bgcolor FROM task AS t
LEFT JOIN subject AS s ON t.subject_id = s.id_subject
LEFT JOIN task_type AS tt ON t.task_type_id = tt.id_task_type
INNER JOIN user_task AS ut ON t.id_task = ut.task_id
WHERE ut.user_id = ?
ORDER BY t.priority DESC';

$statement = ConnectionHandler::getConnection()->prepare($query);
$user_id = $_SESSION['user-id'];
$statement->bind_param('i', $user_id);

if (!$statement->execute()) {
    throw new Exception($statement->error);
}

$result = $statement->get_result();

$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);

