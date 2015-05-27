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
    }).done(function () {
        console.log("fadhfasf");
    })
}
function sortTasks() {

    var val = document.getElementById("sort").value;

    var url;
    console.log(val);

    switch (val) {
        case "1":
            url = '/ajax/sorttaskpasc.php';
            break;
        case "2":
            url = '/ajax/sorttaskpdesc.php';
            console.log("asdfghjklö");
            break;
        case "3":
            url = '/ajax/sorttaskdate.php';
            break;
        case "4":
            url = '/ajax/sorttasktype.php';
            break;
    }

    $.ajax({
        method: 'POST',
        url: url
    }).done(function (data) {
        console.log("fadlkjljkdsflkjsdfalkjdfsakjldfs");

        $(".task-panel").empty();

        $.each(data, function (i, entry) {
            console.log("hallo scheiss script");
            var finished = null;
            if (entry.finished) {
                finished = '<span class="glyphicon glyphicon-ok finished" aria-hidden="true"></span>';
            }

            var priority = null;

            switch (entry.priority) {
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
            var date;
            var a = entry.enddate;
            a.split("-");
            date = a[2] + a[1] + a[0];
            var row = null;
            row.append('<div class="panel panel-default" style="border:none>');
            row.append('<div class="panel-heading" style="background-color: #' + entry.bgcolor + '">');
            row.append('<span class="task-title">' + entry.name + '</span>');
            row.append(finished);
            row.append('</div><div class="panel-body"><h3><b>' + entry.type + '</b></h3>');
            row.append('<p>' + entry.description + '</p>');
            row.append('<h4>' + priority + '</h4>');
            row.append('</div><div class="panel-footer footer">');
            row.append('<span>' + date + '</span>');
            row.append('<div class="button-area"><button class="btn btn-primary">');
            row.append('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>');
            row.append('</button><button class="btn btn-primary" onclick="deleteTask(this, ' + entry.id_task + ')">');
            row.append('<span class="glyphicon glyphicon-trash" aria-hidden"true"></span>');
            row.append('</button></div></div></div>');
            $(".task-panel").append(row);

        });

    });
}