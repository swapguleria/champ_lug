<?php echo $this->render("themes/adminarea/html/elements/header.php") ?>
<style>  
    .alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message-success
{
    background-color: #F4FDF0;
    border-color: #3C763D;
}
.alert-message-danger
{
    background-color: #fdf7f7;
    border-color: #d9534f;
}
</style>
<?php $album_info = $this->album_info; ?>
<h1><em>Contact Message</em>
</h1>
<hr />

<div class="row">
    <div class="col-md-6">
        <h3>Contact Message</h3> 
          <table class="table table-striped table-hover table-bordered" style="font-size:120%;">
            <tbody>
                <tr><td width="180"><strong>Name</strong></td><td style="word-wrap: break-word"> <?php echo $this->message['name']; ?></td></tr>
                
                
                <tr><td width="180"><strong>Email</strong></td><td style="word-wrap: break-word"><?php echo $this->message['email']; ?></td></tr>
                              
                
                <tr><td width="180"><strong>Subject</strong></td><td style="word-wrap: break-word"><?php echo $this->message['subject']; ?></td></tr>
                
                 <tr><td width="180"><strong>Message</strong></td><td style="word-wrap: break-word"><?php echo $this->message['message']; ?></td></tr>   
          
            </tbody>
        </table>
    </div>




    <div class="col-md-6">         
          <div class="about" style="overflow:hidden;">
              <h3>Reply Message</h3>
             <?php if ($this->errors){ ?>
             <div class="alert-message alert-message-danger" style="color:#333; font-weight:bold;">
                 <a class="close" data-dismiss="alert" href="#">&times;</a>
                 <?php 
                 foreach($this->errors as $value){
                     echo "<li style='list-style:circle'>". $value . "</li>";
                 }
                 ?>
             </div>
             <?php } ?>
            <?php if ($this->success) { ?>
             <div class="alert-message alert-message-success" style="color:#333; font-weight:bold;">
                 <a class="close" data-dismiss="alert" href="#">&times;</a>
                <?php echo $this->success; ?>
             </div>
             <?php } ?>
              <?php if ($this->failer) { ?>
             <div class="alert-message alert-message-danger" style="color:#333; font-weight:bold;">
                 <a class="close" data-dismiss="alert" href="#">&times;</a>
                <?php echo $this->failer; ?>
             </div>
             <?php } ?>
             <div>
                 <form method="post" name="csrf_form" action='' enctype="multipart/form-data" class="form" role="form">
            <fieldset>
                <div class="form-group">
                <label>Receiver Email</label>
                <input type="text" name="data[receiver_email]" class="input-block-level form-control" placeholder=" Email" parsley-required="true" value="<?php echo $this->message['email']; ?>">
                </div>             
                <div class="form-group">
                 <label>Message</label>
                <textarea rows="6" id="description" name="data[message]" class="input-block-level form-control ckeditor" placeholder="Description" parsley-required="true"></textarea>
                </div>
                <button type="submit" class="btn btn-info btn-lg bold font-16">Reply Message</button>
            </fieldset>
        </form>
                  </div>
            </div>
    </div>

</div>


<?php
echo $this->render("themes/adminarea/html/elements/footer.php")?>
