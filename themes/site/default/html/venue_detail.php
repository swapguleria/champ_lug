<?php
echo $this->render("themes/site/" . theme_name . "/html/elements/header.php");
$lang = "";
if ($_SESSION['SELECTEDLANG'] == "arabic") {
    $lang = "_ar";
}
?>
<div class="detail-main">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="Concorde_Details">
                    <div class="col-sm-12 text-center">
                        <div class="Concorde_Details_second">
                            <?php
                            if (@$this->venue['image']) {
                                $url = $this->venue['image'];
                            } else {
                                $url = "uploads/no_image.jpg";
                            }
                            ?>  <img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?w=325&h=230&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs img-thumbnail img-responsive" style="width:100%; height:auto;">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="Concorde_Details_first">
                            <h1><?= $this->venue['name'] . " " . Details ?> </h1>
                            <ul >
                                <?php
                                foreach ($this->venue_details as $key => $val) {
                                    ?>
                                    <a class="venue_detail" id="<?= $val['id'] ?>"><li class="venue_li"><?= $val['name' . $lang] ?></li></a>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="venue_detail_div">
            <h2><?= $this->venue_detail['name'] ?></h2>
            <div class="detail clearfix" >
                <div class="venue-dtl">
                    <h3><?= Type_of_venue ?></h3>
                    <ul>
                        <li><?= ucwords($this->venue_type['name' . $lang]) ?> </li>
                    </ul>

                </div>
                <div class="capacity">
                    <h3><?= Capacity ?></h3>
                    <ul>
                        <?php echo (@$this->venue_detail['banquet_capacity']) ? "<li>" . Banquet . "   : <span>" . $this->venue_detail['banquet_capacity'] . " " . Persons . " </span></li>" : " "; ?>
                        <?php echo (@$this->venue_detail['Theater_capacity']) ? "<li>" . Theatre . "   : <span>" . $this->venue_detail['Theater_capacity'] . " " . Persons . " </span></li>" : " "; ?>
                        <?php echo (@$this->venue_detail['Reception_capacity']) ? "<li>" . Reception . " : <span>" . $this->venue_detail['Reception_capacity'] . " " . Persons . " </span></li>" : " "; ?>
                        <?php echo (@$this->venue_detail['U_Shaped_capacity']) ? "<li> " . U_Shape . "  : <span>" . $this->venue_detail['U_Shaped_capacity'] . " " . Persons . " </span></li>" : " "; ?><?php echo (@$this->venue_detail['Boardroom_capacity']) ? "<li>" . Boardroom . "   : <span>" . $this->venue_detail['Boardroom_capacity'] . " " . Persons . " </span></li>" : " "; ?>

                    </ul>
                </div>

                <div class="space">
                    <h3><?= Space_Layout ?></h3>
                    <ul>
                        <li><?php echo (@$this->venue_type['space']) ? $this->venue_type['space'] . " square foot" : No_Data_Available ?></li>
                    </ul>
                </div>

                <div class="pricing">
                    <h3><?= Pricing ?></h3>
                    <ul>
                        <?php echo (@$this->venue_detail['wedding_display_content_for_price']) ? "<li>" . $this->venue_detail['wedding_display_content_for_price'] . "</li>" : "<li> " . No_Data_Available . " </li>"; ?>               <?php echo (@$this->venue_detail['meeting_display_content_for_price']) ? "<li>" . $this->venue_detail['meeting_display_content_for_price'] . "</li>" : " "; ?>                    </ul>
                </div>

                <div class="food">
                    <h3><?= Food_Drinks ?></h3>
                    <ul>
                        <?php
                        if (@$this->other_facility_ids) {
                            foreach ($this->other_facility_ids as $key1) {
                                $name = $this->database->get("venue_other_facility", "*", array("id" => $key1));
                                ?>
                                <li><?= $name['name' . $lang] ?></li>
                                <?php
                            }
                        } else {
                            echo "<li> " . No_Data_Available . "</li>";
                        }
                        ?>
                    </ul>
                </div>


                <div class="venue-dtl tech">
                    <h3><?= Technical ?></h3>
                    <ul>
                        <?php
                        if (@$this->technical_facility_ids) {
                            foreach ($this->technical_facility_ids as $key2) {

                                $name1 = $this->database->get("venue_technical_facility", "*", array("id" => $key2));
                                ?>
                                <li><?= $name1['name' . $lang] ?></li>
                                <?php
                            }
                        } else {
                            echo "<li> " . No_Data_Available . " </li>";
                        }
                        ?>
                    </ul>

                </div>
                <div class="capacity location">
                    <h3><?= Location ?></h3>
                    <ul>
                        <li><?= $this->venue['city'] ?></li>
                    </ul>
                </div>

                <div class="space download">
                    <h3><?= Downloads ?></h3>
                    <ul>
                        <?php echo (@$this->venue['pdf']) ? "<li><a href='" . main_url . "/" . $this->venue['pdf'] . "' target='_blank'>" . $this->venue['name'] . " </a></li>" : "<li>" . Pdf_Not_Available . "</li>"; ?>
                    </ul>
                </div>

                <div class="pricing atr">
                    <h3><?= Other ?></h3>
                    <ul>
                        <?php
                        if (@$this->food_facility_ids) {
                            foreach ($this->food_facility_ids as $key3) {
                                $name2 = $this->database->get("venue_food_facility", "*", array("id" => $key3));
                                ?>
                                <li><?= $name2['name' . $lang] ?></li>
                                <?php
                            }
                        } else {
                            echo "<li> " . No_Data_Available . " </li>";
                        }
                        ?>
                    </ul>
                </div>

                <div class="food cntct">
                    <h3><?= Contact ?></h3>
                    <ul>
                        <?php echo (@$this->venue['website']) ? "<li><a href=http://" . $this->venue['website'] . " target='_blank'>" . $this->venue['website'] . " </a></li>" : ""; ?>
                        <?php echo (@$this->venue_detail['contact_person']) ? "<li>" . $this->venue_detail['contact_person'] . "</li>" : ""; ?>
                        <?php echo (@$this->venue_detail['phone']) ? "<li>" . $this->venue_detail['phone'] . "</li>" : ""; ?>
                        <?php echo (@$this->venue_detail['email']) ? "<li>" . $this->venue_detail['email'] . "</li>" : ""; ?>
                    </ul><a target="">
                </div>	





            </div>
        </div>
    </div>
</div>


<?php
if ($this->review_count > 0) {
    ?>
    <div id="review_div_id" class="reviews-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="reviews-main-inner">
                        <div class="head">
                            <h3>Reviews (<?= $this->review_count ?>)</h3>
                        </div>
                        <?php
                        if ($this->params[2] == "success") {
                            header("refresh:3;url=" . main_url . "/venue_detail/" . $this->params[3]);
                            ?>
                            <div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a>
                                <?php echo Your_Review_is_Submitted_Successfully . "!" ?>       

                            </div>   
                        <?php } ?>
                        <?php
                        foreach ($this->reviews as $key => $val) {
                            ?>
                            <div class="reviews clearfix">
                                <div class="review-left">
                                    <?php
                                    for ($i = 1; $i <= $val['rating']; $i++) {
                                        ?>
                                        <i class="fa fa-star fa-2x" style="color: #FAC81A"></i>
                                        <?php
                                    } for ($i = 1; $i <= (5 - $val['rating']); $i++) {
                                        ?>
                                        <i class="fa fa-star-o fa-2x" style="color: #FAC81A"></i>
                                    <?php } ?>
        <!--<img src="<?php echo main_url; ?>/themes/site/default/images/review.png" alt="" />-->
                                    <h4><?= $val['user_name'] ?></h4>
                                    <h5><?= format_date($val['created_date']) ?></h5>
                                </div>
                                <div class="revidw-right">
                                    <p><?= $val['comment'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!--            asd<div class="row 123">
                            <div class="col-md-4" style="margin-top: 8px;">
            
                                <span data-id="codebasket_like_dislike" data-module_type="Mobilewalglpaper" data-module_id="<?php echo $id; ?>" data-main_url="<?php echo $url; ?>" data-show_text="true" data-button_size="2" data-enable="true" data-style="<?php echo like_dislike_style; ?>"></span>
            
                            </div>
            
                            <div class="col-md-4">  
            
            
                            </div>
            
                            <div class="col-md-4">
                                <div data-id="codebasket_rating" data-module_type="venue" data-module_id="<?php echo $this->venue['id'] ?>" data-main_url="<?php echo main_url; ?>" data-bigger_stars="true" data-enable="true" data-show_text="true" data-text_size="2" class="pull-right pad-right10"></div>
            
                            </div>  
                        </div> -->
<div class="write-review">
    <form id="myForm" method="POST" action="">
        <div class="container">
            <div class="row">
                <div class="reviewhead">    
                    <h3><?= Write_a_Review ?></h3>
                </div>
                <div class="reviewform col-sm-12">
                    <div class="col-md-12 text-center">

                    </div>
                    <div class="col-sm-8 col-sm-offset-2">
                        <input type="text" name="name" placeholder="<?= Your_Name ?>" required/>
                        <textarea placeholder="<?= Your_Review ?>" name="review" required></textarea>
                        <div  class="rating">
                            <span></span>
                            <ul>
                                <li id="one" class="stars fa fa-star-o fa-2x"><i></i></li>
                                <li id="two" class="stars fa fa-star-o fa-2x"><i></i></li>
                                <li id="three" class="stars fa fa-star-o fa-2x"><i></i></li>
                                <li id="four" class="stars fa fa-star-o fa-2x"><i></i></li>
                                <li id="five" class="stars fa fa-star-o fa-2x"><i></i></li>
                            </ul>

                        </div>
                        <div class="g-recaptcha" data-sitekey="<?= recaptcha_public_key ?>"></div>
                        <!--<div class="g-recaptcha"  name="recaptcha" data-sitekey="<?= recaptcha_private_key ?>"></div>-->

                        <div class="form-submit clearfix">
                            <input type="submit" class="register" name="reviews" value="<?= Submit_Review ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7382.939975909035!2d114.16638379214396!3d22.29805834609014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x340400ed82fb69dd%3A0xe2ad6a483997404!2sTsim+Sha+Tsui%2C+Hong+Kong!5e0!3m2!1sen!2sin!4v1448976507266" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
<?php
if (@$this->venue['map']) {
    ?>
    <div class="review-mapmain">
        <div class="container">
            <h1><span><?= Map_to ?> </span> <?= $this->venue['name'] ?></h1>
            <div class="review-map"><?= $this->venue['map'] ?>  </div>
        </div>
    </div>
<?php } ?>
<style>
    .stars, .venue_li {     
        cursor: pointer !important;   
    }
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        var ONE = $('#one'), TWO = $('#two'), TwoStar = $('#one, #two'), THREE = $('#three'), ThreeStar = $('#one, #two, #three'), FOUR = $('#four'), FourStar = $('#one, #two, #three, #four'), FIVE = $('#five'), FiveStar = $('#one, #two, #three, #four, #five');
//        $('#pagination_top, #pagination_bottom').bootstrapPaginator(options);
        "use strict";
        $(".venue_detail").click(function () {
            var id = $(this).attr('id');
            $(".venue_detail_div").slideToggle("slow");
            $.ajax({
                url: '<?= _admin_url ?>/common/actions',
                type: 'POST',
                data: {id: id, method: 'venu_detail_change'},
                success: function (data) {
//                    alert(data);
                    $(".venue_detail_div").empty();
                    $(".venue_detail_div").html(data);
                    $(".venue_detail_div").slideToggle("slow");
                }

            });
        });


        ONE.mouseenter(function () {
            $(this).removeClass('fa-star-o').addClass('fa-star');
            $(this).mouseleave(function () {
                $(this).removeClass('fa-star').addClass('fa-star-o');
            });
        });
        TWO.mouseenter(function () {
            TwoStar.removeClass('fa-star-o').addClass('fa-star');
            $(this).mouseleave(function () {
                TwoStar.removeClass('fa-star').addClass('fa-star-o');
            });
        });
        THREE.mouseenter(function () {
            ThreeStar.removeClass('fa-star-o').addClass('fa-star');
            $(this).mouseleave(function () {
                ThreeStar.removeClass('fa-star').addClass('fa-star-o');
            });
        });
        FOUR.mouseenter(function () {
            FourStar.removeClass('fa-star-o').addClass('fa-star');
            $(this).mouseleave(function () {
                FourStar.removeClass('fa-star').addClass('fa-star-o');
            });
        });
        FIVE.mouseenter(function () {
            FiveStar.removeClass('fa-star-o').addClass('fa-star');
            $(this).mouseleave(function () {
                FiveStar.removeClass('fa-star').addClass('fa-star-o');
            });
        });

    });

</script>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>
