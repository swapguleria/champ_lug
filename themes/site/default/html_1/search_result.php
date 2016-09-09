<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="page container">

    <section class="row mr-top40">

        <div class="span12"> <h1>Student Detail: <?php echo $this->record_info[$this->tb_primaryid]; ?></h1></div>

    </section>

    <section class="row mr-bottom">
        <div class="span4" style="margin-top:10px; padding-left: 0px;">

            <table class="table table-striped table-hover table-bordered" style="font-size:120%;">


                <tbody><tr><td width="180"><strong>Student id</strong></td><td style="word-wrap: break-word"><?php echo $this->students['student_id']; ?></td></tr>




                    <tr><td width="180"><strong>Student name</strong></td><td style="word-wrap: break-word"><?php echo ucwords($this->students['student_name']); ?></td></tr>




                    <tr><td width="180"><strong>Father name</strong></td><td style="word-wrap: break-word"><?php echo ucwords($this->students['father_name']); ?></td></tr>




                    <tr><td width="180"><strong>Date of birth</strong></td><td style="word-wrap: break-word"><?php echo $this->students['date_of_birth']; ?></td></tr>




                    <tr><td width="180"><strong>Course Name</strong></td><td style="word-wrap: break-word"><?php echo $this->course['course_name']; ?></a></td></tr>
                    <?php if ($this->stream['stream_name']) { ?>
                        <tr><td width="180"><strong>Stream Name</strong></td><td style="word-wrap: break-word"><?php echo $this->stream['stream_name']; ?></a></td></tr>
                    <?php } ?>


                    <tr><td width="180"><strong>Reg no</strong></td><td style="word-wrap: break-word"><?php echo $this->students['reg_no']; ?></td></tr>




                    <tr><td width="180"><strong>Roll no</strong></td><td style="word-wrap: break-word"><?php echo $this->students['roll_no']; ?></td></tr>




                    <tr><td width="180"><strong>Session</strong></td><td style="word-wrap: break-word"><?php echo $this->students['session']; ?></td></tr>


                </tbody></table>

        </div>

        <div class="span8" style="margin-top: 10px; padding-right: 0px;">
            <?php if ($this->course_type == "year") { ?>
                <?php foreach ($this->subject_data as $subject_data) { //pr($subject_data);?>
                    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
                        <thead>

                            <tr>
                                <th colspan="4" class=" text-center"><center><b>YEAR - <?php echo $subject_data[0]['part']; ?></b></th>

                            </tr>
                            </thead>

                            <thead>

                                <tr>
                                    <th style="font-size:14px;  width:30%;">Subject Name</th>
                                    <th style="font-size:14px;  ">Max Marks</th>
                                    <th style="font-size:14px;   ">Min Marks</th>
                                    <th class="text-center" style="font-size:14px;  ">Marks Obtained</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($subject_data as $key => $subject) {
                                if ($key === 'max' || $key === 'min' || $key === 'marks') {
                                    
                                } else {
                                    ?>
                                    <tr>
                                        <td style="font-size:14px;  width:30%;"><b><?php echo ucwords($subject['subject_name']); ?><b></b></td>
                                        <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['maximum_marks']; ?></td>
                                        <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['minimum_marks']; ?></td>
                                        <td><?php echo $subject['marks_obtain']; ?></td>

                                    </tr>
                                <?php }
                            }
                            ?>
                            <tr><td><b>Total:</b></td>
                                <td><b><?php echo $subject_data['max']; ?></b></td>
                                <td><b><?php echo $subject_data['min']; ?></b></td>
                                <td><b><?php echo $subject_data['marks']; ?></b></td>
                            </tr></table>
                <?php } ?>
            <?php } elseif ($this->course_type == "semester") { ?>
    <?php foreach ($this->subject_data as $subject_data) { //pr($subject_data);  ?>
                    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
                        <thead>

                            <tr>
                                <th colspan="4" class=" text-center"><center><b>SEMESTER - <?php echo $subject_data[0]['part']; ?></b></th>

                            </tr>
                            </thead>

                            <thead>

                                <tr>
                                    <th style="font-size:14px;  width:30%;">Subject Name</th>
                                    <th style="font-size:14px;  ">Max Marks</th>
                                    <th style="font-size:14px;   ">Min Marks</th>
                                    <th class="text-center" style="font-size:14px;  ">Marks Obtained</th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($subject_data as $key => $subject) {
                                if ($key === 'max' || $key === 'min' || $key === 'marks') {
                                    
                                } else {
                                    ?>
                                    <tr>
                                        <td style="font-size:14px;  width:30%;"><b><?php echo ucwords($subject['subject_name']); ?><b></b></td>
                                        <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['maximum_marks']; ?></td>
                                        <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['minimum_marks']; ?></td>
                                        <td><?php echo $subject['marks_obtain']; ?></td>

                                    </tr>
                                <?php }
                            }
                            ?>
                            <tr><td><b>Total:</b></td>
                                <td><b><?php echo $subject_data['max']; ?></b></td>
                                <td><b><?php echo $subject_data['min']; ?></b></td>
                                <td><b><?php echo $subject_data['marks']; ?></b></td>
                            </tr></table>
    <?php } ?>
<?php } ?>
        </div>

    </section>

</div>

<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>