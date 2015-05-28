<div class="container">
    <script src="http://yui.yahooapis.com/3.18.1/build/yui/yui-min.js"></script>
    <script src="public/js/colorslider.js"></script>
    <link href="public/css/colorslider.css" rel="stylesheet" type="text/css"/>
    <h1>Subjects</h1>
    <?php
    require_once('lib/Subject.php');
    $subject = new Subject();

    $subjects = $subject->showSubjects();


    ?>

    <div class="col-lg-5 ">
        <table class="table table-responsive table-hover  subject-table">
            <tr>
                <th>Subject</th>
                <th>Color</th>
            </tr>
            <?php
            foreach ($subjects as $sub): ?>

                <tr>
                    <td><?= $sub->name ?></td>
                    <td style="background-color: #<?= $sub->bgcolor ?>"></td>
                </tr>

            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-lg-5 col-lg-offset-2 panel panel-primary" id="subject-panel">
        <div class="panel-heading" id="lnormalheading"><h1>Create your own subject</h1></div>
        <form action="#" method="POST">
            <div class="form-group panel-body">
                <!--Form for Log In-->
                <div class="form-group"><label for="subjectname">Subjectname</label>
                    <input type="text" class="form-control" name="login_username" id="login_username"
                           placeholder="Enter your subjectname"></div>

                <div class="form-group"><label for="select_color">Choose your own color</label>

                    <div>


                    </div>

                    <div class="form-group">
                        <div class="sliders yui3-skin-sam">
                            <dl>
                                <dt>R: <span id="r-val" class="val"></span></dt><dd id="r-slider"></dd>
                                <dt>G: <span id="g-val" class="val"></span></dt><dd id="g-slider"></dd>
                                <dt>B: <span id="b-val" class="val"></span></dt><dd id="b-slider"></dd>
                            </dl>
                        </div>
                        <div class="color"></div>
                        <div class="output">
                            <dl>
                                <dt>Hex:</dt><dd id="hex"></dd>
                                <dt>RGB:</dt><dd id="rgb"></dd>
                            </dl>
                        </div>
                    </div>
                    <button type="submit" name="createsubject_button" class="btn btn-primary" id="createsubject_button">
                        Create
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>


