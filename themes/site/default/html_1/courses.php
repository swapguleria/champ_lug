<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="container">
    <section class="row mr-top40">

        <div class="span12">  <h1>Welcome to NIMES - <?php echo ucfirst($this->fetch); ?> Program</h1></div>

    </section>


    <section class="row mr-top10">


        <?php if ($_GET['program'] == "") { ?>
            <div class="span8">
                <?php if ($this->course) { ?>


                    <?php foreach ($this->course as $course) { ?>
                        <table>
                            <tr style=" background: #ccc">
                                <td><b><?php echo ucwords($course['course_name']); ?></b></td>

                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><b>Courses</b></td>
                                <td><b>Eligibility</b></td>
                                <td><b>Duration</b></td>
                                <td><b>App.Fee</b></td>
                                <td><b>Pross.Fee</b></td>
                                <td><b>Exam.Fee</b></td>
                                <td><b>Course.Fee</b></td>
                                <td><b>Total Fees</b></td>

                            </tr>
                            <?php $get_all_course = get_courses_details($this->database, $course['course_id']); ?>
                            <?php foreach ($get_all_course as $get_all) { ?>
                                <tr>
                                    <td><?php echo ucwords($get_all['courses']); ?></td>
                                    <td><?php echo $get_all['minimum_qualification']; ?></td>
                                    <td><?php echo $get_all['course_duration']; ?></td>
                                    <td><?php echo $get_all['application_fee']; ?></td>
                                    <td><?php echo $get_all['pross_fee']; ?></td>
                                    <td><?php echo $get_all['exam_fee']; ?></td>
                                    <td><?php echo $get_all['course_fee']; ?></td>
                                    <td><?php echo $get_all['total_fee']; ?></td>

                <!--                                        <td><?php //echo $get_all['course_duration'];  ?></td>-->


                                </tr>
                            <?php } ?>
                        </table>


                    <?php } ?>

                    </tbody>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-danger">
                        There are no details..
                    </div>
                <?php } ?>
            </div>

            <div class="span4">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        OUR COURSES
                    </a>
                    <?php foreach ($this->course_category as $course_category) { ?>
                        <a href="<?php echo main_url . '/courses/?course_id=' . $course_category['course_category_id']; ?>" class="list-group-item"> <?php echo $course_category['course_category_name']; ?></a>
                    <?php } ?>

                </div>
            </div>

        <?php } elseif ($_GET['program']) { ?>
            <div class="span12" id="courses_shows">
                <!--<ul style="list-style:none; display:block;">-->
                <div style=" margin-left: 30px;">
                    <?php foreach ($this->all_courses as $all_courses) { ?>
                        <!--<li >-->

                        <a class="btn btn-lg" style="<?php if ($_GET['courses_id'] == $all_courses['course_id']) { ?> background:#fff; color: #a5833b;<?php } else { ?> background:#a5833b;color: #ffffff;<?php } ?>" href="<?php echo main_url; ?>/courses/?program=<?php echo $_GET['program']; ?>&courses_id=<?php echo $all_courses['course_id']; ?>"> <?php echo strtoupper($all_courses['course_name']); ?></a>
                        <!--</li>-->
                    <?php } ?>
                </div>
                <!--</ul>--> 
                <?php if ($this->program) { ?>      

                    <table class="table table-responsive table-bordered mr-top15" style=" margin-left: 20px; background:#ffffff;"> 


                        <?php foreach ($this->program as $key => $val) { ?>

                            <?php if ($key == "id" || $key == "course_id" || $key == "program_id") { ?>

                            <?php } elseif ($key == "courses") { ?>
                                <thead style="background: #770000; color: #ffffff;">
                                    <tr>
                                        <th style="width:15%;"><?php echo $key; ?></th> 
                                        <?php foreach ($val as $c) { ?>
                                            <th><?php echo $c; ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                            <?php } else { ?>
                                <tr>
                                    <th><?php echo ucwords(str_replace("_", " ", $key)); ?></th>
                                    <?php foreach ($val as $c) { ?>
                                        <td><?php echo $c; ?></td>

                                    <?php } ?>
                                </tr>
                            <?php } ?>


                        <?php } ?>


                    </table>

                <?php } else { ?>
                    <div class="alert alert-danger">
                        There are no details..
                    </div>
                <?php } ?>

            </div>
        <?php } ?>


    </section>
</div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>