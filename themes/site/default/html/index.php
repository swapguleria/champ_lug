<?php
echo $this->render("themes/site/" . theme_name . "/html/elements/header.php");
$lang = "";
if ($_SESSION['SELECTEDLANG'] == "arabic") {
    $lang = "_ar";
}
?>
<style>
    .drp_dn { cursor: pointer; cursor: hand; }
</style>

<div class="banner">
    <div class="header-container">
        <div class="row"> 
            <div class="planning">
                <h1><?= Planning_Made_Simple ?></h1>
                <form id="src_frm" action="search_result#search_results" method="GET">
                    <div class="row three-column">
                        <div class="col-sm-4">
                            <i id="spin_1" class="icn_spn_ind icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select name="event" class="form-control drp_dn" id="event_id" >
                                <option value="all"><?= Select_Event ?></option>
                                <?php
                                foreach ($this->event_categorys as $key => $value) {
                                    ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name' . $lang] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--4-->
                        <div class="col-sm-4">
                            <i id="spin_2" class="icn_spn_ind icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select name="venue" class="form-control drp_dn" id="venue_id" >
                                <option value="all" ><?= Select_Venue ?></option>
                                <?php
                                foreach ($this->venue_categorys as $key => $value) {
                                    ?> 
                                    <option value="<?= $value['id'] ?>"><?= $value['name' . $lang] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--4-->
                        <div class="col-sm-4">
                            <i id="spin_3" class=" icn_spn_ind icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select  name="location"  class="form-control drp_dn" id="location_id" > 
                                <option value="all"><?= Location ?></option>
                                <?php
                                foreach ($this->locations as $key => $value) {
//                                pr($value);
                                    ?>  <option value="<?= $key ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--4--> 
                    </div>
                    <!--row-->

                    <div class="row two-column">
                        <div class="col-sm-6 col-sm-offset-3">
                            <i id="spin_4" class=" icn_spn_ind icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select class="form-control drp_dn" id="stars_id" name="stars"   >
                                <option value="all"><?= Number_of_Stars ?></option>
                                <option value="1">1 <?= Star ?></option>
                                <option value="2">2 <?= Star ?></option>
                                <option value="3">3 <?= Star ?></option>
                                <option value="4">4 <?= Star ?></option>
                                <option value="5">5 <?= Star ?></option>
                            </select>
                        </div>
                        <!--4-->
                        <!--<div class="col-sm-5">-->
<!--                            <i id="spin_5" class="icn_spn_ind icon-spinner icon-spin icon-large contentloader" style="display:none"></i >-->
<!--                            <select class="form-control drp_dn" id="pp_id" name="pp"  >
                                <option value="all"><?= Price_Per_Person ?></option>
                                <option value="50"> Less than QR   &nbsp; 50</option>
                                <option value="125"> Less than QR  &nbsp;125</option>
                                <option value="200"> Less than QR  &nbsp;200</option>
                                <option value="250"> Less than QR  &nbsp;250</option>
                                <option value="325"> Less than QR  &nbsp;325</option>
                                <option value="400"> Less than QR  &nbsp;400</option>
                                <option value="1000">Less than QR 1000</option>
                                <option value="1000_up">More than QR 1000</option>
                        <?php
//                                foreach ($this->price as $key => $value)
//                                    {
//                                    if ($value > 0)
//                                        {
                        ?> 
                                <option><?= $value ?></option>

                        <?php
//                                        }
//                                    }
                        ?> </select>-->
                        <!--</div>-->
                        <!--4--> 
                    </div>
                    <!--two-column-->

                    <div class="row two-column">


                        <input type="submit" id="search_btn" value="<?= Search ?>" />
                    </div>
                </form>
                <!--two-column--> 
            </div>
            <!--planning--> 
        </div>
        <!--row--> 
    </div>
    <!--cont--> 
</div>
<!--banner-->

<div class="find">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?= Find_and_book_the_best_lugares_for_your_event ?></h1>
            </div>
            <!--12--> 
        </div>
        <!--row-->
        <div class="row">
            <?php
            if ($this->venue_categorys_count > 0) {
                ?>  <?php
                $i = 1;
                foreach ($this->event_categorys as $key => $value) {
                    if ($i == 4) {
                        ?></div>
                    <div class="row">

                        <?php
                    }
                    ?>  <div class="col-sm-4 load-items" style="display: none">
                        <div class="find-image" style="overflow: hidden ; height: 230px">
                            <?php image ?><img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?h=230&src=<?php echo main_url . "/" . $value['image']; ?>" class="da-thumbs thumbnail" style="width:100%;height:230px;">
                            <!--<img src="<?php echo main_url; ?>/<?= $value['image'] ?>" alt="" />-->
                            <div class="image-hover"  style="height: 230px">
                                <!--                                <ul>
                                                                            <li><a href="#"><img src="<?php echo main_url; ?>/themes/site/default/images/review-icon.png" alt="" /></a></li>
                                                                    <li>
                                                                        <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                                        <div class="like_hover">
                                                                            <h5>Like 2</h5>
                                                                        </div>
                                                                    </li>
                                
                                                                </ul>-->

                                <a href="<?= main_url ?>/search_result?event=<?= $value['id'] ?>&venue=all&location=all&stars=all&pp=all#search_results"><h3><?= $value['name' . $lang] ?></h3></a>
                                <!--<img src="<?php echo main_url; ?>/themes/site/default/images/stars.png" alt="" />--> 
                                <!--hover--> 
                            </div>
                            <!--find-image--> 
                        </div> 
                    </div>
                    <?php
                    $i++;
                }
                ?>
                <div class="col-md-12">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="more_list_item">
                            <a href="javascript:void(0)" id="ViewMoreListItem">Load More</a>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div role="alert" class="alert alert-danger">
                    <strong><?= No_lugares_Found ?>.

                </div><?php }
            ?>

        </div>
        <!--row--> 
    </div>
    <!--cont--> 
</div>
<div class="featured">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?= Hotels ?></span></h1>
            </div>
            <!--12--> 
        </div>
        <!--row-->
        <div class="row">
            <div class="col-sm-12">
                <?php
                if (@$this->hotels) {
                    ?>       <div id="demo">
                        <div class="span12">
                            <div id="owl-demo" class="owl-carousel">

                                <?php
                                foreach ($this->hotels as $k => $v) {
                                    $avg_price = $banquet_capacity = $UShaped_capacity = $Boardroom_capacity = $Theater_capacity = $Reception_capacity = $capacity = $likes = $tot_ratings = $val_rating = 0;
//**************** Getting the venue detail ids ****************//
                                    $venues_id = $this->database->select("venue_details_venue", "venue_details_id", array("venue_id" => $v['id']));
//                                    pr($v);
                                    if (@$venues_id) {
                                        $price1 = $this->database->avg("venue_details", "Wedding_price_per_person_max", array("id" => $venues_id));
                                        $price2 = $this->database->avg("venue_details", "Meeting_price_per_person_max", array("id" => $venues_id));
                                        $avg_price = ($price1 > $price2) ? round($price1) : round($price2);
                                        $banquet_capacity = $this->database->sum("venue_details", "banquet_capacity", array("id" => $venues_id));
                                        $UShaped_capacity = $this->database->sum("venue_details", "U_Shaped_capacity", array("id" => $venues_id));
                                        $Boardroom_capacity = $this->database->sum("venue_details", "Boardroom_capacity", array("id" => $venues_id));
                                        $Theater_capacity = $this->database->sum("venue_details", "Theater_capacity", array("id" => $venues_id));
                                        $Reception_capacity = $this->database->sum("venue_details", "Reception_capacity", array("id" => $venues_id));
                                        $capacity = $banquet_capacity + $UShaped_capacity + $Boardroom_capacity + $Theater_capacity + $Reception_capacity;
//                                        pr($capacity);
                                        $likes = $v['likes'];
                                        $tot_ratings = $this->database->count("comments", array("AND" => array("module_id" => $v['id'])));
                                        $val_rating = $this->database->sum("comments", "rating", array("AND" => array("module_id" => $v['id'])));
                                        $avg_rating = round(($val_rating / $tot_ratings), 1);
//                                        echo rating_stars($avg_rating);
                                    }
                                    ?><div class="item">
                                        <div class="border-shadow">
                                            <div class="feature-item home-slider"> 
                                                <?php
                                                if (@$v['image']) {
                                                    $url = $v['image'];
                                                } else {
                                                    $url = "uploads/no_image.jpg";
                                                }
                                                ?> <img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?h=260&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs thumbnail" style="width:100%;height:260px;">
                                                <!--<img src="<?php echo main_url; ?>/<?= $v['image'] ?>" alt=""  />-->
                                                <div class="image-hover">
                                                    <div class="add-to-list">
                                                        <ul>
                                                            <li><a class="image-hover-coment" href="<?= main_url . "/venue_detail/" . $v['id'] . "#review_div_id" ?>"><i class="fa fa-comments-o" aria-hidden="true"></i></a><span class="img-hover-coment"><?= $tot_ratings ?></span></li>
                                                            <li><a class="image-hover-like" href="<?= main_url . "/venue_detail/" . $v['id'] ?>"><i class="fa fa-heart" aria-hidden="true"></i><span class="img-hover-like"><?= $likes ?></span></a></li>
                                                        </ul>
                                                        <h3><a href="<?= main_url . "/venue_detail/" . $v['id'] ?>"><?= ucwords($v['name']); ?></h3>
                                                        <?php
                                                        for ($i = 1; $i <= $v['stars']; $i++) {
                                                            ?>
                                                            <i class="fa fa-star " style="color: #FAC81A; font-size: 30px;"></i>
                                                            <?php
                                                        } for ($i = 1; $i <= (5 - $v['stars']); $i++) {
                                                            ?>
                                                            <i class="fa fa-star-o " style="color: #FAC81A; font-size: 30px;"></i>
                                                        <?php } ?>
        <!--<img src="<?php echo main_url; ?>/themes/site/default/images/stars.png" alt=""  />--> 
                                                    </div>
                                                    <!--add-to-list-->
                                                    <div class="list">
                                                        <div class="inner-list">
                                                            <p><strong><?= Price ?></strong><span></span><b><?= $avg_price . " " ?><strong> QR </strong> <?= Per_Person ?></b></p><p><strong><?= Capacity ?>:</strong><span></span><b><?= $capacity ?> <?= Person ?></b></p><p><strong><?= Location ?></strong><span></span><b><?= ucwords($v['city']); ?></b></p>
                                                        </div>
                                                        <!--<a href="#">+ Add To My list</a> </div>-->
                                                        <!--list--> 
                                                    </div>
                                                    <!--hover--> 
                                                </div><!--feature-item-->
                                            </div><!--border-->
                                        </div></div>
                                <?php } ?>

                            </div>
                            <div class="customNavigation"> <a class="btn prev"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-left.png" alt="" /></a> <a class="btn next"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-right.png" alt="" /></a> </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?><div role="alert" class="alert alert-danger">
                        <strong><?= Sorry ?> !</strong> <?= No ?> <?= Hotels ?> <?= Found ?>.
                    </div>
                <?php } ?>
            </div>
            <!--12--> 
        </div>
        <!--row--> 
    </div>
    <!--cont--> 
</div>
<!--featured-->

<div class="testimonial">
    <div class="container">
        <h1><?= Testimonials ?></h1>
        <div class="row">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 

                <?php
                if (@$this->testimonials) {
                    ?><!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        foreach ($this->testimonials as $key => $val) {
                            ?>
                            <li data-target="#carousel-example-generic" data-slide-to="<?= $key ?>" class="<?php if ($key == 0) echo "active"; ?>"></li>

                        <?php }
                        ?>    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        foreach ($this->testimonials as $key => $val) {
                            ?>
                            <div class="item <?php if ($key == 0) echo "active"; ?>" >
                                <h2><?= $val['description' . $lang] ?></h2>
                            </div>
                        <?php } ?>

                    </div>
                    <?php
                }else {
                    ?> <div role="alert" class="alert alert-danger">
                        <strong><?= Sorry ?>!</strong> <?= No ?> <?= " " . Testimonials ?><?= " " . Found ?>.
                    </div>
                <?php } ?>

            </div>
        </div>
        <!--row--> 
    </div>
    <!--cont--> 
</div>
<div id="search_result"></div>
<!--test-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        "use strict";
        $('#event_id').on('change', function () {
            $('#spin_2').show();
            var event_id = $('#event_id').val();
            $.ajax({
                url: '<?= _admin_url ?>/common/actions',
                type: 'POST',
                data: {event_id: event_id, method: 'event_change'},
                success: function (data) {
                    //                                                alert(data);
                    $('#venue_id').html(data);
                    $('#spin_2').hide();
                }
            });
        });
        $('#venue_id').on('change', function () {
            $('#spin_3').show();
            var venue_id = $('#venue_id').val();
            $.ajax({
                url: '<?= _admin_url ?>/common/actions',
                type: 'POST',
                data: {venue_id: venue_id, method: 'venue_change'},
                success: function (data) {
//                    alert(data);
                    $('#location_id').html(data);
                    $('#spin_3').hide();
                }
            })
        });
        $('#location_id').on('change', function () {
            $('#spin_4').show();
            var location_id = $('#location_id').val();
            $.ajax({
                url: '<?= _admin_url ?>/common/actions',
                type: 'POST',
                data: {location_id: location_id, method: 'location_change'},
                success: function (data) {
                    //                    alert(data);
                    $('#stars_id').html(data);
                    $('#spin_4').hide();

                }
            });
        });


    });



</script>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

