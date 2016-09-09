<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>
 <?php //pr($this->post_data); ?>
<div class="container">
  <div class="row white-box">
  
     
     <div class="col-md-8 col-xs-12 col-sm-12 col-md-offset-2 mr-top">
     
      <div class="panel panel-primary">   
            <div class="panel-heading">
              <h3 class="panel-title text-center"  style="font-size:26px;"><p class="media-heading"><?php echo BANNERS; ?>Change Password</p>
</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              	<div class="col-md-12 col-xs-12 col-sm-12">   
                  <form class="form-horizontal" name="csrf_form" role="form" id="fileupload" action="" method="POST" enctype="multipart/form-data" parsley-validate>
               <input type="hidden" name="csrf_token" value="<?php echo $this->formtoken; ?>"> 
        <fieldset>

          <!-- Form Name -->
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
                        echo "<li style='list-style:circle'>Change Password Successfully!)</li>";
                        ?>
                    </div>
                <?php } ?>
          <!-- Text input-->        
          <div class="form-group">
              <label class="col-sm-3 col-md-3 col-xs-12 control-label" for="textinput" ><?php echo BANNERS; ?>Old Password</label>
            
            <div class="col-md-9 col-sm-6 col-xs-12">
                  <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <input type="password" name="data[old_password]" class="form-control" parsley-required="true" parsley-minlength="6" parsley-maxlength="14" autocomplete="off">
            </div>         
            </div>
            </div>   
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 col-md-3 col-xs-12 control-label" for="textinput" >New Password</label>
            
            <div class="col-md-9 col-sm-6 col-xs-12">
                  <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <input type="password" name="data[new_password]" class="form-control" parsley-required="true" parsley-minlength="6" parsley-maxlength="14" autocomplete="off">
            </div>         
            </div>
            </div>   
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 col-md-3 col-xs-12 control-label" for="textinput" >Repeat Password</label>
            
            <div class="col-md-9 col-sm-6 col-xs-12">
                  <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <input type="password" name="data[r_password]"  class="form-control" parsley-required="true" parsley-minlength="6" parsley-maxlength="14" autocomplete="off">
            </div>         
            </div>
            </div>   
          </div>
          
          
         </fieldset>
        <!-- The table listing the files available for upload/download -->
        
        <div class="pull-right">
            <button type="submit" name="" value="" class="btn btn-success">Save Password</button>
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
                window.location = "<?php echo main_url ?>/change_password";
            }, 3000);
         });
    </script>
<?php
}?>