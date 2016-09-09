<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>


<div class="row mr-top">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" style="margin-top:20px; margin-bottom:20px; background:#fff; padding:15px; border-radius:5px; -moz-border-radius:5px; -webkit-border-radius:5px; border:1px solid #ccc;">
        <form method="post" name="csrf_form" action='' enctype="multipart/form-data" class="" role="form"  parsley-validate>
            <fieldset>
                <input type="hidden" name="csrf_token" value="<?php echo $this->formtoken; ?>">
                <h2 class="login">Login</h2>
                <hr class="colr">
                <?php if ($this->lerrors) { ?>
                    <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>
                        <?php
                        foreach ($this->lerrors as $value) {
                            echo "<li style='list-style:circle'>" . $value . "</li>";
                        }
                        ?>

                    </div>
                <?php } ?>
                <?php if ($this->params[1] == 'success') { ?>
                    <div class="alert alert-success" id="success_div"><a class="close" data-dismiss="alert" href="#">&times;</a>
                        <?php
                        echo "<li style='list-style:circle'>Login was Successfully!)</li>";
                        ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input type="email" name="ldata[email]" parsley-required="true" parsley-type="email" parsley-trigger="change" id="email" class="form-control input-lg" placeholder="Please Enter Your Email Address" autocomplete="off" style="width:100%;"> 
                </div>
                <div class="form-group">
                    <input type="password" name="ldata[password]" parsley-required="true" parsley-minlength="6" parsley-maxlength="14" id="password" class="form-control input-lg" placeholder="Please Enter your Password" autocomplete="off" style="width:100%;">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <input type="submit" name="lsubmit" class="btn btn-lg btn-warning btn-block" value="Login">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12 mr-top">
                        <h4 class="login"><a style="color:#aa2159;" href="<?php echo main_url; ?>/forgot_password"> Forgot password? </a></h4>
                        <h4 class="login">Don't have an account?<a style="color:#aa2159;" href="<?php echo main_url; ?>/register"> Sign up</a> </h4>
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
                window.location = "<?php echo main_url ?>";
            }, 2000);
        });
    </script>
    <?php
}?>