<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="row mr-top30">

    <div class="col-md-12"><img src="<?php echo main_url.$this->blog_info['blog_big_image'];?>" class="thumbnail pull-left"></div>

<div class="col-md-12">
    <strong class="title_head"><?php echo $this->blog_info['blog_title'];?></strong>

    <?php echo $this->blog_info['blog_content']; ?>


</div>


</div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

