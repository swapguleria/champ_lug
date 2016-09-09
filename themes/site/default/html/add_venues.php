<?php
echo $this->render("themes/site/" . theme_name . "/html/elements/header.php");
$lang = "";
if ($_SESSION['SELECTEDLANG'] == "arabic")
    {
    $lang = "_ar";
    }
?>
<div class="about-us contact-page advertise" id="message_alert">
	<div class="container">
		<div class="add_venue-inner">
			<h1>Add Venue</h1>
		</div>
	</div>
</div>
	<div class="add_venue_contant">
		<div class="container">
			<div class="row">
				<?php
				if ($this->params[1] == "success")
					{
					header("refresh:3;url=" . main_url . "/add_venues");
					?>
					<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>
						<?php echo Your_Message_Sent_Successfully ?>       

					</div>   
				<?php } ?><div class="col-sm-8 left-contact">
					<div class="left-inner">
						<h1><?= Add_Your_Venue ?> </h1>
						<p><?php echo (@$lang) ? add_venue_ar : add_venue ?></p>
						<?php
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
						<form class="clearfix" id="advertise" action="" method="POST">
							<span>
								<input type="text" name="name" placeholder="<?= Contact . " " . Name ?>">
							</span> 
							<span>
								<input type="text"  name="phone" placeholder="<?= Phone_Number ?>">
							</span>
							<span>
								<input type="email" name="email" placeholder="<?= Email ?>">
							</span>
							<span>
								<input type="text" name="venue_name" placeholder="<?= Venue_Name ?>">
							</span> 

							<span>
								<textarea name="content"></textarea>
								<div class="g-recaptcha" data-sitekey="<?= recaptcha_public_key ?>"></div>
								<input type="submit" class="form-signup" name="submit" value="<?= send_us_a_message ?>">
							</span>

						</form>
					</div>
				</div>
				<div class="col-sm-4 right-contact text-right">
					<h1><?= Contact_Us ?></h1>
					<div class="address">
						<!--p><i class="fa fa-home"></i><?php // echo $contact_details['contact_name'];                             ?></p-->
						<p><i class="fa fa-phone"></i><?= contact_no ?></p>
						<p><i class="fa fa-envelope-o"></i> <a href="mailto:<?= contact_email ?>"><?= contact_email ?></a></p>
					</div>

					<!--                <div class="social-icon social">
										<ul>
											<li><a target="_blank" href="https://www.facebook.com/alwakalatsite?_rdr=p"><img src="images/fb-icon.png" alt="" title="" /></a></li>
											<li><a target="_blank" href="https://twitter.com/al_wakalat"><img src="images/twiiter-icon.png" alt="" title="" /></a></li>
					
											<li><a target="_blank" href="https://www.instagram.com/alwakalat/"><img src="images/insta-icon.png" alt="" title="" /></a></li>
											<li><a target="_blank" href="https://www.snapchat.com/add/alwakalat"><img src="images/snap-chat.png" alt="" title="" /></a></li>
					
										</ul>
									</div>-->

				</div>
			</div>
        </div>
    </div>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>