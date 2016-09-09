<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="container">
<section class="row mr-top40">
   
   <div class="span12">  <h1><?php echo ucwords($this->page_info['page_title']); ?></h1></div>
   
   </section>               

<?php echo $this->page_info['page_content']; ?>
</div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>