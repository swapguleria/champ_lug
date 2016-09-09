
        <div class="sign-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 sign-up-head">
                        <h1><?= Get_Recent_Lugares_News ?></h1>
                    </div>
                    <!--6-->
                    <div class="col-sm-12 sign-up-form">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="<?= Name ?>">
							<input type="email" class="form-control"  placeholder="<?= Email ?>">
							<input type="submit" class="form-signup" value="<?= Sign_up ?>" />
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
                    <div class="col-sm-2 logo"> <img src="<?php echo main_url;?>/themes/site/default/images/logo-final.png" alt="" /> </div>
                    <!--2-->
                    <div class="col-sm-3">
                        <h3><?= Important_links ?></h3>
                        <ul>
                            <li>Add Your Venue</li>
                            <li>Find Venues For Me</li>
                        </ul>
                    </div>
                    <!--2-->
                    <div class="col-sm-4">
                        <h3><?= About_Us ?></h3>
                        <p>Lugares is a Spanish word that means "Places"; we find you the best Lugares to organize your events.</p>
                        <a href="#">read more</a> </div>
                    <!--2-->
                    <div class="col-sm-3">
                        <h3><?= Contact_Us ?></h3>
                        <a href="mailto:info@lugares.qa"><span>Email:</span> info@lugares.qa</a>
                        <p><?= Social_Media ?><a href="<?php echo instagram_page_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/insta.png" alt="" /></a><a href="<?php echo fb_page_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/facebook.png" alt="" /></a><a href="<?php echo googleplus_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/email.png" alt="" /></a></p>
                    </div>
                    <!--2--> 

                </div>
                <!--row--> 
            </div>
            <!--cont--> 
        </div>
        <!--footer-->
        <div class="lowerfooter">
            <div class="container">
                <div class="row">
                    <p>© 2015 Lugares All rights reserved.</p>
                </div>
                <!--row--> 
            </div>
            <!--cont--> 
        </div>
        <!--lower--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
        <script src="<?php echo main_url;?>/themes/site/default/js/bootstrap.min.js"></script> 
        <script src="<?php echo main_url;?>/themes/site/default/js/owl.carousel.js"></script> 
        <script src="<?php echo main_url; ?>/includes/site-actions/site-actions.js"></script>
        <script>
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
        </script>
    </body>
</html>
