<?php

Class DisplayTasks

{

    public
    function listTasks($tasks)
    {
        foreach ($tasks as $task): ?>

            <div class="panel panel-default" style="border: none">
                <div class="panel-heading" style="background-color: #<?php echo $task->bgcolor ?>">
                    <span class="task-title"><?= $task->name ?></span>
                    <?php if ($task->finished) {
                        echo '<span class="glyphicon glyphicon-ok finished" aria-hidden="true"></span>';
                    } ?>
                </div>
                <div class="panel-body">
                    <h3><b><?= $task->type ?></b></h3>

                    <p><?= $task->description ?></p><br>
                    <h4><?php
                        switch ($task->priority) {
                            case 1:
                                echo 'High';
                                break;
                            case 2:
                                echo 'Normal';
                                break;
                            case 3:
                                echo 'Low';
                                break;
                        }
                        ?></h4>

                </div>
                <div class="panel-footer footer">
                <span><?php
                    $enddate = explode("-", $task->enddate);
                    echo $enddate[2] . '-' . $enddate[1] . '-' . $enddate[0]; ?></span>

                    <div class="button-area">
                        <button class=" btn btn-primary">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-primary" onclick="deleteTask(this, <?= $task->id_task ?>)">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>

        <?php endforeach;
    }
} ?>