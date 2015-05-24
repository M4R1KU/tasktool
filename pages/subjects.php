<div class="container">
<h1>Subjects</h1>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
        <h2>Create your task</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create Task: </h4>
                    </div>
                    <div class="modal-body">

                        <?php


                        ?>


                        <h3>Please create your Task</h3>

                        <p>Here below you can select your Subject</p>
                    </div>
                    <div class="subject">
                        <select class="form-control" id="select">
                            <option>Mathematics</option>
                            <option>German</option>
                            <option>French</option>
                            <option>English</option>
                            <option>Science</option>
                            <option>Biology</option>
                            <option>Chemists</option>
                            <option>Sport</option>
                            <option>Physics</option>
                            <option>History</option>
                            <option>Geographics</option>
                            <option>Religion</option>
                            <option>Art</option>
                            <option>Music</option>
                            <option>Psychology</option>
                        </select>
                        <br>

                        <p>Describe your task</p>
                        <textarea rows="5" cols="50"></textarea><br>

                        <p>Select your enddate below</p>
                        <label for="enddate">Enddate: </label><input id="enddate" type="date"/><br>

                        <p>Set your priority</p>
                        <select class="form-control" id="select">
                            <option>Low</option>
                            <option>Normal</option>
                            <option>High</option>

                        </select>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Submit</button>
                    </div>
                </div>

            </div>
        </div>

    </div>

    </body>
    </html>

</div>