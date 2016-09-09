<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="container">
    <section class="row mr-top40">

        <div class="span12">  <h1>Affilation of NIMES</h1></div>

    </section>



    <section class="row mr-top40">
        <?php foreach ($this->affilation as $affilation_img) { ?>
            <div class="span3"></div>
            <div class="span6 text-center"><h1 class="text-center img-responsive"><img src="<?php echo main_url . "/" . $affilation_img['affilation_image']; ?>" alt="" /></h1></div>
            <div class="span3"></div>
        <?php } ?>

    </section>
</div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>