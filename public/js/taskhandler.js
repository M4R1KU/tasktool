/**
 * Created by bkunzm on 27.05.2015.
 */

function deleteTask(btn, tid) {

    var parent = $(btn).closest("div.panel-default");
    $(parent).hide();

    $.ajax({
        method: 'POST',
        url: '/ajax/deletetask.php',
        data: {task_id: tid}
    })
}

$(document).ready(sortAjaxRequest("/ajax/sorttaskpdesc.php"));

function sortTasks() {

    var val = document.getElementById("sort").value;

    switch (val) {
        case "1":
            sortAjaxRequest("/ajax/sorttaskpasc.php");
            break;
        case "2":
            sortAjaxRequest("/ajax/sorttaskpdesc.php");
            break;
        case "3":
            sortAjaxRequest("/ajax/sorttaskdate.php");
            break;
        case "4":
            sortAjaxRequest("/ajax/sorttasktype.php");
            break;
    }
}

function sortAjaxRequest(url) {
    console.log("fast geschafft");
    $.ajax({
        method: "POST",
        url: url,
        dataType: 'json'
    }).done(function (data) {

        $(".task-panel").empty();

        $.each(data, function (i, entry) {
            console.log(entry);

            var finished, finishedbtn = null;
            if (entry.finished) {
                finished = '<span class="glyphicon glyphicon-ok finished" aria-hidden="true"></span>';
                finishedbtn = '';
            }
            else{
                finished = '';
                finishedbtn = '<button class="btn btn-primary" onclick="setTaskFinished(this, ' + entry.id_task +')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>';
            }
            var priority = entry.priority;

            switch (priority) {
                case 1:
                    priority = 'High';
                    break;
                case 2:
                    priority = 'Normal';
                    break;
                case 3:
                    priority = 'Low';
                    break;
            }

            var row = '<div class="panel panel-default" style="border:none">' +
                            '<div class="panel-heading" style="background-color: #' + entry.bgcolor + '">' +
                                '<span class="task-title">' + entry.name + '</span>' + finished + '</div>' +
                        '<div class="panel-body"><h3><b>' + entry.type + '</b></h3>' +
                                        '<p>' + entry.description + '</p><h4>' + priority + '</h4>'+
                        '</div>' +
                        '<div class="panel-footer footer">' +
                                '<span>' + entry.enddate + '</span>' +
                                    '<div class="button-area">' +
                                        finishedbtn +
                                        '<button class="btn btn-primary" onclick="editTasks(this, ' + entry.id_task + ')">' +
                                            '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>' +
                                        '</button>' +
                                        '<button class="btn btn-primary" onclick="deleteTask(this, ' + entry.id_task + ')">' +
                                            '<span class="glyphicon glyphicon-trash" aria-hidden"true"></span>' +
                                        '</button>' +
                                    '</div>' +
                                '</div>' +

                        '</div>';
            $(".task-panel").append(row);
        });

    });
}

function setTaskFinished(btn, tid) {

    $(btn).hide();

    $.ajax({
        method: 'POST',
        url: '/ajax/settaskfinished.php',
        data: {task_id: tid}
    }).done(function (data) {
        console.log("Task marked: " + data);
        if (data) {
            $(btn).parents(".panel-footer").siblings(".panel-heading").first().append('<span class="glyphicon glyphicon-ok finished" aria-hidden="true"></span>');
        }
    })

}
function editTasks(btn, tid) {

    $.ajax({
        method: 'POST',
        url: '/ajax/edittasks.php',
        data: {task_id: tid},
        dataType: 'json'
    }).done(function (data){
        console.log(data);

        $('#select-subject').val(data.name);
        $('#description').val(data.description);
        $('#enddate').val(data.enddate);
        $('#select-type').val(data.type);
        $('#select-priority').val(data.priority);
        $('#hidden_id').val(tid);


        $('#myModal').modal({
            show: 'true'
        });
    })

}
