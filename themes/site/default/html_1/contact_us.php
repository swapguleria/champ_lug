<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="page container">

    <div class="row-fluid">
        <div class="span12"> 
            <h1>National Institute of Management & Engineering Studies</h1>

            <img src="<?php echo main_url; ?>/themes/site/default/images/contact-img2.jpg" alt="" class="img-responsiveimg" /></div>   

    </div>

    <div class="row-fluid mr-top40 mr-bottom">
        <div class="span4">



            <ul class="list-group-item">
                <li><strong class="mr-top pull-left width100">Corporate Office:</strong></li> 
                <li>Sco-16-17,opposite ludhiana stock exchange.<br />
                    Fortune chamber,3rd Floor,Ludhiana-141001<br />
                    Contact-no-9888984698<br />

            </ul>

        </div>


        <div class="span4">

        </div>

        <div class="span4">
            <?php if ($this->errors) { ?>
                <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>
                    <?php
                    foreach ($this->errors as $value) {
                        echo "<li style='list-style:circle'>" . $value . "</li>";
                    }
                    ?>    

                </div>   
            <?php } ?>
            <?php if ($this->params[1] == "success") { ?>
                <div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>
                    <?php echo "Your Message Sent Successfully!" ?>       

                </div>   
            <?php } ?>
            <div class="panel panel-info" id="message_alert">
                <div class="panel-heading">
                    <h3 class="panel-title">Enquiry Form :</h3>
                </div>
                <div class="panel-body">
                    <form class="require-validation" method="post" parsley-validate>

                        <div class="form-row">
                            <div class="span12 form-group required">
                                <label class="control-label width100">Name :</label>
                                <input type="text" class="form-control width95" name="name" parsley-required="true">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="span12 form-group card required">
                                <label class="control-label width100">Mail Address :</label>
                                <input type="email" class="form-control width95" autocomplete="off" name="email" parsley-required="true">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="span12 form-group card required">
                                <label class="control-label width100">Subject :</label>
                                <input type="text" class="form-control width95" autocomplete="off" name="subject" parsley-required="true">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="span12 form-group card required">
                                <label class="control-label width100">Message :</label>
                                <textarea class="form-control card-number width95" name="message" parsley-required="true"></textarea>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="span12 error form-group">
                                <input type="submit" name="contact_submit" class="btn btn-success" value="submit" />
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
</div>

<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>
<script src="<?php echo main_url; ?>/libs/parsley-js-validations/parsley.min.js"></script>

<?php if ($this->params[1] == 'success') { ?>
    <script>
        $(function() {
            setTimeout(function() {
                window.location = "<?php echo main_url ?>/contact_us";
            }, 3000);
        });
    </script>
    <?php
}?>