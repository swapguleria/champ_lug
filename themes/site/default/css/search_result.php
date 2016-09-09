<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="banner">
    <div class="header-container">
        <div class="row"> 
            <div class="planning">
                <h1><?= Planning_Made_Simple ?></h1>
                <form id="src_frm" action="search_result" method="GET">
                    <div class="row three-column">
                        <div class="col-sm-4">
                            <i id="spin_1" class="icn_spn_scr icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select name="event" class="form-control drp_dn" id="event_id" >
                                <option value="all"><?= Select_Event ?></option>
                                <?php
                                foreach ($this->event_categorys as $key => $value)
                                    {
                                    ?>
                                    <option value="<?= $value['id'] ?>"><?= $value['name' . $lang] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--4-->
                        <div class="col-sm-4">
                            <i id="spin_2" class="icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select name="venue" class="form-control drp_dn" id="venue_id" >
                                <option value="all" ><?= Select_Venue ?></option>
                                <?php
                                foreach ($this->venue_categorys as $key => $value)
                                    {
                                    ?> 
                                    <option value="<?= $value['id'] ?>"><?= $value['name' . $lang] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--4-->
                        <div class="col-sm-4">
                            <i id="spin_3" class="icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select  name="location"  class="form-control drp_dn" id="location_id" > 
                                <option value="all"><?= Location ?></option>
                                <?php
                                foreach ($this->locations as $key => $value)
                                    {
//                                pr($value);
                                    ?>  <option value="<?= $key ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--4--> 
                    </div>
                    <!--row-->

                    <div class="row two-column">
                        <div class="col-sm-5 col-sm-offset-1">
                            <i id="spin_4" class="icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select class="form-control drp_dn" id="stars_id" name="stars"   >
                                <option value="all"><?= Number_of_Stars ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <!--4-->
                        <div class="col-sm-5">
                            <i id="spin_5" class="icon-spinner icon-spin icon-large contentloader" style="display:none"></i >
                            <select class="form-control drp_dn" id="pp_id" name="pp"  >
                                <option value="all"><?= Price_Per_Person ?></option>
                                <option value="50"> Less that QR 50</option>
                                <option value="125">Less than QR 125</option>
                                <option value="200"> Less that QR 200</option>
                                <option value="250">Less than QR 250</option>
                                <option value="325"> Less that QR 325</option>
                                <option value="400">Less than QR 400</option>
                                <option value="1000"> Less that QR 1000</option>
                                <option value="1000_up">More than QR 1000</option>
                                <?php
//                                foreach ($this->price as $key => $value)
//                                    {
//                                    if ($value > 0)
//                                        {
                                ?> 
                                <!--<option><?= $value ?></option>-->

                                //<?php
//                                        }
//                                    }
                                ?> </select>
                        </div>
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
                <div id="inner">
                    <?php
                    foreach ($this->event_categorys as $key => $val)
                        {
                        ?>  
                        <div class="col-sm-4 feature-item"> 
							<div class="feature-item-inner">
								<img src="<?php echo main_url; ?><?= $val['image'] ?>" alt="" />
							</div>
                            <div class="image-hover">
                                <div class="add-to-list">
                                    <ul>
                                        <li><a href="#"><img src="<?php echo main_url; ?>/themes/site/default/images/review-icon.png" alt="" /></a></li>
                                        <li><a href="#"><img src="<?php echo main_url; ?>/themes/site/default/images/wishlist-icon.png" alt="" /></a></li>
                                    </ul>
                                    <h3><?= $val['name'] ?></h3>
                                    <img src="<?php echo main_url; ?>/themes/site/default/images/stars.png" alt="" /> </div>
                                <!--add-to-list-->
                                <div class="list">
                                    <div class="inner-list">
                                        <p><strong>Price</strong><span></span><b>50<strong>QR</strong> Per Person</b></p>
                                        <p><strong>Capacity:</strong><span></span><b>300 Person</b></p>
                                        <p><strong>Location</strong><span></span><b><?= $val['city'] ?></b></p>
                                    </div>
                                    <a href="#">+ Add To My list</a> </div>
                                <!--list--> 
                            </div>

                            <!--hover--> 

                        </div><?php } ?>
                    <div class="customNavigation"> <a class="btn prev"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-left.png" alt="" /></a> <a class="btn next"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-right.png" alt="" /></a> </div>
                </div>
            </div>
        </div>
        <!--12--> 
    </div>
    <!--row--> 
</div>
<!--cont--> 
</div>


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
//        $('#search_btn').on('click', function () {
//            var venue_id = $('#venue_id').val();
//            var location_id = $('#location_id').val();
//            var event_id = $('#event_id').val();
//            var stars_id = $('#stars_id').val();
//            var pp_id = $('#pp_id').val();
////            alert("venue_id " + venue_id + "  location_id " + location_id + "  event_id " + event_id + " stars_id " + stars_id + " pp_id " + pp_id);
//            $.ajax({
//                url: '<?= _admin_url ?>/common/actions',
//                type: 'post',
//                data: {event_id: event_id, venue_id: venue_id, location_id: location_id, stars_id: stars_id, pp_id: pp_id, method: 'search_result'},
//                success: function (data) {
////                    alert(data);
//                    $('.find').slideUp();
//                    $('.testimonial').slideUp();
//                    $('.featured').slideUp();
//                    $('#search_result').empty();
//                    $('#search_result').html(data);
//                }
//            });
//
//
//        });
    });



</script>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>