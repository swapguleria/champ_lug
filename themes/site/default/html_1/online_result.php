<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>
<?php //pr($this->params);  ?>
<div class="page container">

    <div class="row-fluid mr-top40 mr-bottom">
        <div class="span4"></div>

        <div class="span4">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">NIMES ONLINE RESULT</h3>
                </div>
                <div class="panel-body">
                    <?php if (isset($this->params[1]) && !empty($this->params[1])) { ?>
                        <div class="alert alert-danger">
                            <?php if ($this->params[1] == "error2") { ?>
                                <?php echo "Please Enter Your Roll Number! "; ?>
                            <?php } ?>
                            <?php if ($this->params[1] == "error1") { ?>
                                <?php echo "Please Enter Your Registration Number! "; ?>
                            <?php } ?>
                            <?php if ($this->params[1] == "error") { ?>
                                <?php echo "Please Enter Your Roll Number & Registration Number! "; ?>
                            <?php } ?>
                            <?php if ($this->params[1] == "no_rollno") { ?>
                                <?php echo "No result found for this roll Number!"; ?>
                            <?php } ?>
                        </div>
                    <?php } ?>


                    <form method="GET" class="require-validation" action="<?php echo main_url; ?>/search_result" >
                        <div class="form-row" >
                            <div class="span12 form-group required">
                                <label class="control-label">Enter your Roll Number:</label>
                                <input type="text" name="roll_no" size="20" class="form-control" style="width: 96%;">
                            </div>

                            <div class=" form-group required">
                                <label class="control-label">Enter your Regstration Number:</label>
                                <input type="text" name="reg_no" size="20" class="form-control" style="width: 96%;">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="span12 error form-group">
                                <input type="submit" name="student_result" class="btn btn-success" value="Search" />
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>

        <div class="span4"></div>     

    </div>
</div>

<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>