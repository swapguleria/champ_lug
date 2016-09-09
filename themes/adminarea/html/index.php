<?php echo $this->render("themes/adminarea/html/elements/header.php")?>

<?php //pr($this->get_latest_status);?>
<h1><em>Welcome</em>, <strong><?php echo $_SESSION['admin_name'];?></strong></h1>
<hr />
<?php if($this->vars[2] == "success"){?>
<div class="alert-success" style="padding:5px;margin-bottom:20px">Done</div>

<?php }?>

<?php echo $this->render("themes/adminarea/html/elements/footer.php")?>