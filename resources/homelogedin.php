<?php
require_once('lib/Task.php');
$task = new Task();

?>
<div class="col-lg-4 ctask">

    <button type="button" class="btn btn-primary btn-lg btn-ctask" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create new
        Task
    </button>
</div>
<div class="form-group col-lg-4 col-lg-offset-4 sort">
    <label for="sort" class="">Sort by...</label>
    <select class="form-control col-lg-4" id="sort" onchange="sortTasks()">
        <option value="1">Sort by priority ascending</option>
        <option value="2" selected>Sort by priority descending</option>
        <option value="3">Sort by enddate</option>
        <option value="4">Sort by task type</option>
    </select>
</div>

<div class="task-panel">

</div>

<?php

if (!empty($_POST['hidden_id'])) {

    $task->setSubject(htmlspecialchars($_POST['select-subject']));
    $task->setDescription(htmlspecialchars($_POST['description']));
    $task->setDate(htmlspecialchars($_POST['enddate']));
    $task->setType(htmlspecialchars($_POST['select-type']));
    $task->setPriority(intval(htmlspecialchars($_POST['select-priority'])));
    $task->setTaskid(intval(htmlspecialchars($_POST['hidden_id'])));

    if (!$task->updateTask()) {
        throw new Exception("Fehler gefunden: Updaten den Tasks fehlgeschlagen!");
    }

} else if (!empty($_POST['select-subject']) && !empty($_POST['description']) && !empty($_POST['enddate']) && !empty($_POST['select-type']) && !empty($_POST['select-priority'])){

    $task->setSubject(htmlspecialchars($_POST['select-subject']));
    $task->setDescription(htmlspecialchars($_POST['description']));
    $task->setDate(htmlspecialchars($_POST['enddate']));
    $task->setType(htmlspecialchars($_POST['select-type']));
    $task->setPriority(intval(htmlspecialchars($_POST['select-priority'])));

    if (!$task->createNewTask()) {
        throw new Exception("Fehler gefunden: Konnte keinen neuen Task erstellen!");
    }
}

?>

<!-- Modal for creating Tasks -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="../index.php" method="post" class="create-task" name="create-task">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h1 class="modal-title">Create your own Task</h1>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="select-subject">Choose the desired subject.</label>
                        <select class="form-control" id="select-subject" name="select-subject" required>
                            <option value="Mathematics">Mathematics</option>
                            <option value="German">German</option>
                            <option value="French">French</option>
                            <option value="English">English</option>
                            <option value="Science">Science</option>
                            <option value="Biology">Biology</option>
                            <option value="Chemists">Chemists</option>
                            <option value="Sport">Sport</option>
                            <option value="Physics">Physics</option>
                            <option value="History">History</option>
                            <option value="Geographics">Geographics</option>
                            <option value="Religion">Religion</option>
                            <option value="Art">Art</option>
                            <option value="Music">Music</option>
                            <option value="Psychology">Psychology</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Describe your Task</label>
                            <textarea rows="5" maxlength="300" id="description" name="description"
                                      placeholder="In this field, you can describe your Task" required></textarea><br>
                    </div>
                    <div class="form-group">
                        <label for="enddate">Enddate:</label><br>
                        <input id="enddate" type="date" name="enddate" required/><br>
                    </div>
                    <div class="form-group">
                        <label for="select-type">Set the type of the task</label>
                        <select class="form-control" id="select-type" name="select-type">
                            <option value="Exam">Exam</option>
                            <option value="Homework">Homework</option>
                            <option value="Note">Note</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="select-priority">Set the priority</label>
                        <select class="form-control" id="select-priority" name="select-priority" required>
                            <option value="3">Low</option>
                            <option value="2">Normal</option>
                            <option value="1">High</option>

                        </select>
                    </div>
                    <label for="hidden_id"></label>
                    <input hidden id="hidden_id" name="hidden_id"/>

                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="ctask-button" id="ctask-button">Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

