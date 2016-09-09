<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="banner">
    <div class="header-container">
        <div class="row"> 
            <div class="planning">
                <h1><?= Planning_Made_Simple ?></h1>
                <form id="src_frm" action="search_result#search_results" method="GET">
                    <div class="row three-column">
                        <div class="col-sm-4">
                            <i id="spin_1" class="icn_spn_scr icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select name="event" class="form-control drp_dn" id="event_id" >
                                <option value="all"><?= Select_Event ?></option>
                                <?php
                                foreach ($this->event_categorys as $key => $value)
                                    {
                                    if (@$this->event != "all" && $value['id'] == $this->event) $selected_event = 'selected="selected"';
                                    else $selected_event = "";
                                    ?>
                                    <option value="<?= $value['id'] ?>" <?= $selected_event ?>  ><?= ucwords($value['name' . $lang]) ?></option>
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
                                    if (@$this->venue != "all" && $value['id'] == $this->venue) $selected_venue = 'selected="selected"';
                                    else $selected_venue = "";
                                    ?> 
                                    <option value="<?= $value['id'] ?>" <?= $selected_venue ?>><?= ucwords($value['name' . $lang]) ?></option>
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
    if (@$this->location != "all" && $key == $this->location) $selected_location = 'selected="selected"';
    else $selected_location = "";
    ?>  <option value="<?= $key ?>" <?= $selected_location ?>><?= ucwords($value) ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--4--> 
                    </div>
                    <!--row-->

                    <div class="row two-column">
                        <div class="col-sm-6 col-sm-offset-3">
                            <i id="spin_4" class="icon-spinner icon-spin icon-large contentloader" style="display:none"></i>
                            <select class="form-control drp_dn" id="stars_id" name="stars"   >
                                <option value="all"><?= Number_of_Stars ?></option>
                                <option value="1" <?php echo ($this->stars != "all" && $this->stars == 1) ? 'selected="selected"' : ''; ?>>1 Star</option>
                                <option value="2" <?php echo ($this->stars != "all" && $this->stars == 2) ? 'selected="selected"' : ''; ?>>2 Star</option>
                                <option value="3" <?php echo ($this->stars != "all" && $this->stars == 3) ? 'selected="selected"' : ''; ?>>3 Star</option>
                                <option value="4" <?php echo ($this->stars != "all" && $this->stars == 4) ? 'selected="selected"' : ''; ?>>4 Star</option>
                                <option value="5" <?php echo ($this->stars != "all" && $this->stars == 5) ? 'selected="selected"' : ''; ?>>5 Star</option>
                            </select>
                        </div>
                        <!--4-->

                    </div>
                    <!--two-column-->

                    <div class="row two-column">


                        <input type="submit" onclick="addURL(this)" id="search_btn" value="<?= Search ?>" />
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

<div class="featured" id="search_results">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php
                                if (@$this->venue != "all")
                                    {
                                    echo Search_Results_For . " " . $page_title = ucwords($this->title['name' . $lang]);
                                    }
                                else
                                    {
                                    echo Search_Results_For . " " . $page_title = $this->title;
                                    }
                                ?></span></h1>
            </div>
            <!--12--> 
        </div>
        <!--row-->
        <div class="row">
            <div class="col-sm-12">
                <?php
                if ($this->total_records > 0)
                    {
                    ?>  
                    <!--<div id="pagination_top"></div>-->
                    <div id="inner">

                        <?php
                        foreach ($this->results as $key => $val)
                            {
                            $avg_price = $banquet_capacity = $UShaped_capacity = $Boardroom_capacity = $Theater_capacity = $Reception_capacity = $capacity = $likes = $tot_ratings = $val_rating = 0;
//**************** Getting the venue detail ids ****************//
                            $venues_id = $this->database->select("venue_details_venue", "venue_details_id", array("venue_id" => $val['id']));
//                                    pr($venues_id);
                            if (@$venues_id)
                                {
                                $price1 = $this->database->avg("venue_details", "Wedding_price_per_person_max", array("id" => $venues_id));

                                $price2 = $this->database->avg("venue_details", "Meeting_price_per_person_max", array("id" => $venues_id));
                                $avg_price = ($price1 > $price2) ? round($price1) : round($price2);
                                $banquet_capacity = $this->database->sum("venue_details", "banquet_capacity", array("id" => $venues_id));
                                $UShaped_capacity = $this->database->sum("venue_details", "U_Shaped_capacity", array("id" => $venues_id));
                                $Boardroom_capacity = $this->database->sum("venue_details", "Boardroom_capacity", array("id" => $venues_id));
                                $Theater_capacity = $this->database->sum("venue_details", "Theater_capacity", array("id" => $venues_id));
                                $Reception_capacity = $this->database->sum("venue_details", "Reception_capacity", array("id" => $venues_id));
                                $capacity = $banquet_capacity + $UShaped_capacity + $Boardroom_capacity + $Theater_capacity + $Reception_capacity;
//                                    pr($capacity);
                                $likes = $val['likes'];
                                $tot_ratings = $this->database->count("comments", array("AND" => array("module_id" => $val['id'])));
                                $val_rating = $this->database->sum("comments", "rating", array("AND" => array("module_id" => $val['id'])));
                                $avg_rating = round(($val_rating / $tot_ratings), 1);
                                }
                            ?>  
                            <div class="col-sm-4 feature-item load-items" style="display: none"> 
                                <div class=" thumbnail feature-item-inner">
                                    <?php
                                    if (@$v['image'])
                                        {
                                        $url = $v['image'];
                                        }
                                    else
                                        {
                                        $url = "uploads/no_image.jpg";
                                        }
                                    ?> <img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?w=300&h=260&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs thumbnail" style="width:300px;height:260px;">            <!--<img src="<?php echo main_url; ?><?= $val['image'] ?>" alt="" />-->
                                </div>
                                <div class="image-hover">
                                    <div class="add-to-list">
                                        <ul>
                                            <li>
                                                <a class="image-hover-coment" href="<?php echo main_url; ?>/venue_detail/<?= $val['id'] . "#review_div_id" ?>">
                                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                    <span class="img-hover-coment"><?= $tot_ratings ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="image-hover-like" href="<?php echo main_url; ?>/venue_detail/<?= $val['id'] ?>">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                    <span class="img-hover-like" ><?= $likes ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <h3><a href="<?php echo main_url; ?>/venue_detail/<?= $val['id'] ?>"><?= $val['name'] ?></a></h3>
                                        <?php
                                        for ($i = 1; $i <= $val['stars']; $i++)
                                            {
                                            ?>
                                            <i class="fa fa-star " style="color: #FAC81A; font-size: 15px"></i>
            <?php
            } for ($i = 1; $i <= (5 - $val['stars']); $i++)
            {
            ?>
                                            <i class="fa fa-star-o " style="color: #FAC81A; font-size: 15px"></i>
        <?php } ?>
        <!--<img src="<?php echo main_url; ?>/themes/site/default/images/stars.png" alt="" />--> 
                                    </div>
                                    <!--add-to-list-->
                                    <div class="list">
                                        <div class="inner-list">
                                            <p><strong><?= Price ?></strong><span></span><b><?= $avg_price . " " ?><strong>QR</strong> <?= Per_Person ?></b></p>
                                            <p><strong><?= Capacity ?>:</strong><span></span><b><?= $capacity . " " ?><?= Person ?></b></p>
                                            <p><strong><?= Location ?></strong><span></span><b><?= $val['city'] ?></b></p>
                                        </div>
                                        <!--<a href="#">+ Add To My list</a> </div>-->
                                        <!--list--> 
                                    </div>

                                    <!--hover--> 

                                </div>
                            </div>
                    <?php } ?>
                        <div class="col-md-12">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="more_list_item">
                            <a href="javascript:void(0)" id="ViewMoreListItem">Load More</a>
                        </div>
                    </div>
                </div>
<!--                        <div class="customNavigation"> <a class="btn prev"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-left.png" alt="" /></a> <a class="btn next"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-right.png" alt="" /></a> </div>
                    </div>
                    <div id="pagination_bottom"></div>-->
    <?php
    }
else
    {
    ?>
                    <div role="alert" class="alert alert-danger">
                        <strong><?= Sorry ?>!</strong><?= " " . No ?> <?= $page_title . " " . Found ?>.
                    </div>
<?php } ?>
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
                                    alert('location');
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

               





</script>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>