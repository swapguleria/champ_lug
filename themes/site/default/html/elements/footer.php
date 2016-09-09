
<div class="sign-up" id="signup_id">
    <div class="container">
        <div class="row">
            <div class="sign-up-inner col-sm-12">
                <div class="sign-up-head">
                    <h1><?= Get_Recent_Lugares_News ?></h1>
                </div>
                <!--6-->
                <div class="col-sm-12 sign-up-form">
                    <?php
                    if ($this->params[1] == "success") {
                        header("refresh:3;url=" . main_url . "/index");
                        ?>
                        <div class="alert alert-success" style="margin-top: 10px ;"><a class="close" data-dismiss="alert" href="#">&times;</a>
                            <?= Newsletter_Subscribed_Success ?>       

                        </div>   
                        <?php
                    } else if ($this->params[1] == "error") {
//                        header("refresh:3;emailurl=" . main_url . "/index");
                        ?>
                        <div class="alert alert-danger" style="margin-top: 10px ;"><a class="close" data-dismiss="alert" href="#">&times;</a>
                            <?= Newsletter_Subscribed_Fail ?>       

                        </div> 
                        <?php
                    }
                    ?>   <p><?= Newsletter ?></p>
                    <form action="index#signup_id" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control"  placeholder="<?= Name ?>" required>
                            <input type="email" name="email" class="form-control"  placeholder="<?= Email ?>" required>
                            <input type="submit" name="sign_up" class="form-signup" value="<?= Sign_Up ?>" />
                        </div>
                    </form>
                    <div class="sign-up-footer">
                        <p><?= Subscribe_your_EMAIL_here ?>...</p>
                    </div>
                </div>
            </div>
            <!--6--> 
        </div>
        <!--row--> 
    </div>
    <!--cont--> 
</div>
<!--sign-up-->

<div class="footer">
    <div class="header-container">
        <div class="row">
            <div class="col-sm-2 logo"> <img src="<?php echo main_url; ?>/themes/site/default/images/logo-final.png" alt="" /> </div>
            <!--2-->
            <div class="col-sm-3 Important_Links">
                <h3><?= Important_Links ?></h3>
                <ul>
                    <li><a href="<?= main_url ?>/add_venues"><?= Add_Your_Venue ?></a></li>
                    <li><a href="<?= main_url ?>/search_result"><?= Find_Venues_For_Me ?></a></li>
                </ul>
            </div>
            <!--2-->
            <div class="col-sm-4">
                <h3><?= About_us ?></h3>
                <p><?php
                    echo substr($this->about_us['description' . $lang], 0, 103);
                    ?> ...</p>
                <a href="<?= main_url ?>/about_us"><?= read_more ?></a> </div>
            <!--2-->
            <div class="col-sm-3">
                <h3><?= Contact_Us ?></h3>
                <a href="mailto:info@lugares.qa"><span><?= Email ?>:</span> <?= admin_email ?></a>
                <p><?= Social_Media ?><a href="<?php echo instagram_page_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/insta.png" alt="" /></a><a href="<?php echo fb_page_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/facebook.png" alt="" /></a><a href="<?php echo googleplus_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/email.png" alt="" /></a></p>
            </div>
            <!--2--> 

            <div class="back-to-top show">
                <a href="#top"><i class="fa fa-sort-asc fa-3x" aria-hidden="true"></i></a> 
            </div>

        </div>
        <!--row--> 
    </div> 
    <!--cont--> 
</div>
<!--footer-->
<div class="lowerfooter">
    <div class="container">
        <div class="row">
            <p><?= copyright ?></p>
        </div>
        <!--row--> 
    </div>
    <!--cont--> 
</div>
<!--lower--> 
       <!--<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>-->
<!--</script>  <script src="<?php echo main_url ?>/themes/site/<?php echo theme_name; ?>/js/jquery-hover-effect.js" type="text/javascript"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="<?php echo main_url; ?>/themes/site/default/js/bootstrap.min.js"></script> 
<script src="<?php echo main_url; ?>/themes/site/default/js/owl.carousel.js"></script> 
<script type="text/javascript" src="<?php echo main_url ?>/themes/adminarea/js/bootstrap-paginator.js"></script>
<script src="<?php echo main_url; ?>/includes/site-actions/site-actions.js"></script>
<style>
    #ViewMoreListItem{
        padding: 10px;
        text-align: center;
        background-color: #33739E;
        color: #fff;
        border-width: 0 1px 1px 0;
        border-style: solid;
        border-color: #fff;
        float: left;
        transition: all 600ms ease-in-out;
        -webkit-transition: all 600ms ease-in-out;
        -moz-transition: all 600ms ease-in-out;
        -o-transition: all 600ms ease-in-out;
    }

    #ViewMoreListItem:hover{
        background-color: #fff;
        color: #33739E;
    }

</style>
<script>

    function updateTextInput(val) {
        document.getElementById('textInput').value = val;
    }

    $(function () {
        $(".load-items").slice(0, 9).show();
        if ($(".load-items:hidden").length === 0) {
            $("#ViewMoreListItem").fadeOut('slow');
        }
        $("#ViewMoreListItem").on('click', function (e) {
            e.preventDefault();
            $(".load-items:hidden").slice(0, 9).slideDown();
            if ($(".load-items:hidden").length === 0) {
                $("#ViewMoreListItem").fadeOut('slow');
            }

            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1500);
        });
    });




    $(document).ready(function () {

        var owl = $("#owl-demo");

        owl.owlCarousel({
            items: 3, //10 items above 1000px browser width
            itemsDesktop: [992, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [768, 3], // 3 items betweem 900px and 601px
            itemsTablet: [639, 2], //2 items between 600 and 0;
            itemsMobile: [479, 1] // itemsMobile disabled - inherit from itemsTablet option

        });

        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })



    });

    $(document).ready(function () {

        var owl = $("#owl-demo1");

        owl.owlCarousel({
            items: 1, //10 items above 1000px browser width
            itemsDesktop: [1200, 1], //5 items between 1000px and 901px
            itemsDesktopSmall: [991, 1], // 3 items betweem 900px and 601px
            itemsTablet: [767, 1], //2 items between 600 and 0;
            itemsTabletSmall: [639, 1],
            itemsMobile: [479, 1] // itemsMobile disabled - inherit from itemsTablet option

        });

        // Custom Navigation Events
        $(".next").click(function () {
            owl.trigger('owl.next');
        })
        $(".prev").click(function () {
            owl.trigger('owl.prev');
        })



    });
</script>

<script>
    $(function () {

        $(document).on('scroll', function () {

            if ($(window).scrollTop() > 500) {
                $('.back-to-top').addClass('show');
            } else {
                $('.back-to-top').removeClass('show');
            }
        });


    });
</script>
</body>
</html>
