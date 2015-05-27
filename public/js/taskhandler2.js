function showTasks(data) {
    console.log("hallo scheiss script");


    $("html").empty();
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
        $("html").append(row);

    });
}
