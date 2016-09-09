<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="container mr-top">
  <div class="row white-box">
  
     
     <div class="col-md-8 col-xs-12 col-sm-12 col-md-offset-2">
    
    <!--   <h3 class="text-center blue-txt-clor mr-bottom">Password</h3>-->
    
      <div class="panel panel-primary mrtp20">
            <div class="panel-heading">
              <h3 class="panel-title text-center" style="font-size:26px;"><p class="media-heading"><?php echo PASSWORD_REMINDER; ?></p>
</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              	<div class="col-md-12 col-xs-12 col-sm-12">
                 
                <p><?php echo TO_HAVE_YOUR_PASSWORD_EMAILED; ?></p>
                 <?php if ($this->errors) { ?>
                         <div class="alert alert-danger" style="margin-left: 5px; margin-right: 5px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php
                            foreach ($this->errors as $value) {
                                echo "<li style='list-style:circle'>" . $value . "</li>";
                            }
                            ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->params[1] == 'success') { ?>
                         <div class="alert alert-success" style="margin-left: 5px; margin-right: 5px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php
                            echo "<li style='list-style:circle'>Password send in your email successfully.</li>";
                            ?>
                        </div>
                    <?php } ?>
                
                <form method="post" name="csrf_form" action='' enctype="multipart/form-data" class="form-horizontal" role="form" parsley-validate>
                    <input type="hidden" name="csrf_token" value="<?php echo $this->formtoken; ?>">
                <div class="form-group">
                <label for="textinput" class="col-sm-3 col-md-3 col-xs-12 control-label" style="line-height:30px;"><?php echo EMAIL_ADDRESS; ?></label>
                <div class="col-sm-9 col-xs-12 col-md-9">
                  <input type="text" name="data[user_email]" parsley-required="true" parsley-type="email" parsley-trigger="change" class="form-control" placeholder="">
                </div>
              </div>
              <div class="row">
                  <label for="textinput" class="col-sm-3 col-md-3 col-xs-12 control-label" style="line-height:30px;"></label>
               <div class="col-sm-9 col-xs-12 col-md-9">
              <button  type="submit" class="btn btn-primary mr-top"><?php echo SEND_PASSWORD; ?> <i class="fa fa-angle-double-right"></i></button>
                </div>
               </div>    
                
                </form>
                
            </div>
          </div>
    
    </div>
  </div>
  
  
</div>
     
     
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
<?php } ?>

