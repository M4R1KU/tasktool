<?php
require_once('lib/ConnectionHandler.php');

//$q = $_GET['username'];
$q = $_POST['username'];

$query = 'SELECT username FROM user WHERE username = ?';

$statement = ConnectionHandler::getConnection()->prepare($query);
$statement->bind_param('s', $q);
$statement->execute();

$result = $statement->get_result();

$user = $result->fetch_object();

if($user == null){
    echo true;
} else {
    echo false;
}