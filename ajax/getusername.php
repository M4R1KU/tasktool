<?php
//sql statement to get the usernames in the database
//Validation
require_once('../lib/ConnectionHandler.php');

$q = $_POST['username'];

$query = 'SELECT username FROM user WHERE username = ?';

$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('s', $q);
$statement->execute();

$result = $statement->get_result();

$user = $result->fetch_object();

if($user == null && $q != ""){
    echo true;
} else {
    echo false;
}