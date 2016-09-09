<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="row">


    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" style="margin-top:20px; margin-bottom:20px; background:#fff; padding:15px; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; border:1px solid #ccc;">
        <form method="post" name="csrf_form" action='' enctype="multipart/form-data" class="" role="form"  parsley-validate>
            <fieldset>
                <input type="hidden" name="csrf_token" value="<?php echo $this->formtoken; ?>">
                <h2 class="login">Sign Up</h2>
                <hr class="colr">
                <?php if ($this->errors) { ?>
                    <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>
                        <?php
                        foreach ($this->errors as $value) {
                            echo "<li style='list-style:circle'>" . $value . "</li>";
                        }
                        ?>

                    </div>
                <?php } ?>
                <?php if ($this->params[1] == 'success') { ?>
                    <div class="alert alert-success" id="success_div"><a class="close" data-dismiss="alert" href="#">&times;</a>
                        <?php
                        echo "<li style='list-style:circle'>Your Registration was Successfully! You can Login now.)</li>";
                        ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-sm-6">
                            <input type="text" name="data[firstname]" parsley-required="true"  class="form-control input-lg" placeholder="First name" autocomplete="off" style="width:100%;">
                        </div>
                        <div class="col-md-6 col-xs-6 col-sm-6">
                            <input type="text" name="data[lastname]" parsley-required="true"  class="form-control input-lg" placeholder="Last name" autocomplete="off" style="width:100%;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Please Enter Your Email Address" parsley-required="true" parsley-type="email" parsley-trigger="change"  class="form-control input-lg" autocomplete="off" id="email" name="data[email]" style="width:100%;">
                </div>
                <div class="form-group">
                    <input type="password" name="data[password]" parsley-required="true" parsley-minlength="6" parsley-maxlength="14"  id="password" class="form-control input-lg" autocomplete="off" placeholder="Please enter your Password" style="width:100%;">
                </div>
                <div class="form-group">
                    <input type="password" name="data[c_password]" parsley-required="true" parsley-minlength="6" parsley-maxlength="14"  id="password" class="form-control input-lg" autocomplete="off" placeholder="Confirm Password " style="width:100%;">
                </div>


                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="submit" name="submit_user" class="btn btn-lg btn-warning btn-block btn-sign-up" value="Sign up">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

</div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

<?php if ($this->params[1] == 'success') { ?>
    <script>
        $(function() {
            setTimeout(function() {
                window.location = "<?php echo main_url ?>/login";
            }, 3000);
        });
    </script>
    <?php
}?>