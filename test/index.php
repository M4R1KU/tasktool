<!DOCTYPE html>
<html>
<head>
    <script src="../public/js/jquery-1.11.3.min.js"></script>
    <script src="../public/js/jquery-ui.min.js"></script>
    <script src="../public/js/taskhandler2.js"></script>
</head>
<body>

<h1>heiii</h1>
<?php
$rows = [];
$rows[] = [
    'id_task' => '3',
    'description' => 'heoioioioi',
    'finished' => '1',
    'enddate' => '2015-28-05',
    'priority' => '2',
    'type' => 'Exam',
    'name' => 'Chemists',
    'bgcolor' => '004422'
];

print_r($rows);
echo json_encode($rows);

echo '<button onclick="showTasks('. $rows . ')">Click Me!</button>';

?>

</body>

</html>