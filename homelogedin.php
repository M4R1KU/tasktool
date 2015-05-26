<div class="col-lg-4 ctask">
    <button type="button" class="btn btn-primary btn-lg btn-ctask" data-toggle="modal" data-target="#myModal">Create new Task
    </button>
</div>
<div class="form-group col-lg-4 col-lg-offset-4 sort">
    <label for="sort" class="">Sort by...</label>
    <select class="form-control col-lg-4" id="sort">
        <option>Sort by priority ascending</option>
        <option>Sort by priority descending</option>
        <option>Sort by enddate</option>
        <option>Sort by task type</option>
    </select>
</div>

<?php
require_once('lib/DisplayTasks.php');
require_once('lib/CreateTask.php');
$display = new DisplayTasks();
$create = new CreateTask();


$display->sortByPriority();


$subject = null;
$description = null;
$date = null;
$type = null;
$priority = null;
if (!empty($_POST['select-subject']) && !empty($_POST['description']) && !empty($_POST['enddate']) && !empty($_POST['select-type']) && !empty($_POST['select-priority'])) {

    $subject = htmlspecialchars($_POST['select-subject']);
    $description = htmlspecialchars($_POST['description']);
    $date = htmlspecialchars($_POST['enddate']);
    $type = htmlspecialchars($_POST['select-type']);
    $priority = intval(htmlspecialchars($_POST['select-priority']));

    if ($create->createNewTask($description, $subject, $type, $date, $priority)) {
        $subject = null;
        $description = null;
        $date = null;
        $type = null;
        $priority = null;
    }


}
?>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="index.php" method="post" class="create-task" name="create-task">
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
                            <option value="3">High</option>

                        </select>
                    </div>
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