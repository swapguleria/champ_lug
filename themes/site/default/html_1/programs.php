<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="container">
    <section class="row mr-top40">

        <div class="span12">  <h1>Welcome to NIMES </h1></div>

        <div class="page container">
            <div class="row-fluid mr-top40 mr-bottom">
                <div class="span8">
                    <div class="row-fluid">
                        <div class="span6 align-center"><img alt="140x140" class="img-circle" src="http://sparkideainteractive.com/nimesindia/themes/site/default/images/professional_1.jpg" style="width: 140px; height: 140px;" />
                            <h2>Management Programs</h2>

                            <p><a class="btn" href="<?php echo main_url . '/courses/?program=management'; ?> ">View details &raquo;</a></p>
                        </div>
                        <!-- /.span6 -->

                        <div class="span6 align-center"><img alt="140x140" class="img-circle" src="http://sparkideainteractive.com/nimesindia/themes/site/default/images/engg.jpg" style="width: 140px; height: 140px;" />
                            <h2>Engineering Programs</h2>

                            <p><a class="btn" href="<?php echo main_url . '/courses/?program=engineering'; ?> ">View details &raquo;</a></p>
                        </div>
                        <!-- /.span6 --></div>

                    <div class="row-fluid">
                        <div class="span6 align-center"><img alt="140x140" class="img-circle" src="http://sparkideainteractive.com/nimesindia/themes/site/default/images/advance-program.jpg" style="width: 140px; height: 140px;" />
                            <h2>Advance & Other Programs</h2>

                            <p><a class="btn" href="<?php echo main_url . '/courses/?program=advance'; ?>  ">View details &raquo;</a></p>
                        </div>
                        <!-- /.span6 --><!-- /.span6 --></div>
                </div>

                <div class="span4"><img alt="" class="img-polaroid" src="http://sparkideainteractive.com/nimesindia/themes/site/default/images/photo2.jpg" /></div>
            </div>
        </div>               



    </section>
</div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>