<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="about-us">
    <div class="container">
        <div class="about-us-inner">
            <h1><?= Contact_Us ?></h1>
        </div>

    </div><!--container-->
</div><!--contact-us-->
<!--banner-->

<!-------banner------->

<div class="contact-us" id="message_alert">
    <div class="container">
        <div class="contact-us-inner"><?php
            if ($this->errors)
                {
                ?>
                <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>
                    <?php
                    foreach ($this->errors as $value)
                        {
                        echo "<li style='list-style:circle'>" . $value . "</li>";
                        }
                    ?>    

                </div>   
            <?php } ?>
            <?php
            if ($this->params[1] == "success")
                {
                header("refresh:3;url=" . main_url . "/contact_us");
                ?>
                <div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>
                    <?php echo Your_Message_Sent_Successfully ?>       

                </div>   
            <?php } ?>
            <form class="require-validation" method="post" parsley-validate>
                <div class="contact-us-form">
                    <p><?= Fill_The_Form_Below_And_We_Will_Get_Back_To_You_As_Soon_As_Possible ?> </p>
                    <span class="name"><input type="text" name="name" value="<?php if (@$_POST['name']) echo $_POST['name']; ?>" placeholder="<?= Name ?>"/></span>
                    <span class="email"><input type="text" name="email"  value="<?php if (@$_POST['email']) echo $_POST['email']; ?>"  placeholder="<?= Email ?>"/></span>

                    <span class="phone"><input type="text" name="phone"  value="<?php if (@$_POST['phone']) echo $_POST['phone']; ?>" placeholder="<?= Phone_Number ?>"/></span>

                    <span  class="subject"><input type="text" name="subject"  value="<?php if (@$_POST['subject']) echo $_POST['subject']; ?>" placeholder="<?= Subject ?>"/></span>
                    <textarea name="message"  placeholder="<?= Message ?>"><?php if (@$_POST['message']) echo $_POST['message']; ?></textarea>
                    <div class="g-recaptcha" data-sitekey="<?= recaptcha_public_key ?>"></div>
                    <!--<p>we would love to hear from you! <b>Thank you!</b></p>-->
                    <input type="submit" name="contact_submit" value="<?= send_us_a_message ?>" />
                    <!--<a href="#">send us a message</a>-->
                </div>

            </form> 


        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="contact-us-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3607.637522749279!2d51.509111054245!3d25.282776254169917!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45dac92c90a6fd%3A0x58eaa5889f691f9a!2sShemoukh+Twin+Towers%2C+Al+Majda+St%2C+Doha%2C+Qatar!5e0!3m2!1sen!2sin!4v1467356538097" width="1350" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div></div></div>
</div>
<!-------banner------->















<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

