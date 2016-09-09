<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>


<div class="featured" id="search_results">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php
                    echo Venues, " ", Results_For;
                    echo (@$this->keyword) ? " '" . $this->keyword . "'" : '';
                    ?></span></h1>
            </div>
            <!--12--> 
        </div>
        <!--row-->
        <div class="row">
            <div class="col-sm-12">
                <?php
//                pr($this->venues);
                if ($this->all_venues)
                    {
                    ?>  
                    <!--<div id="pagination_top"></div>-->
                    <div id="inner">

                        <?php
                        foreach ($this->all_venues as $key => $val)
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


//                                    $likes = $val['likes'];
//                                    $tot_ratings = $this->database->count("comments", array("AND" => array("module_id" => $val['id'])));
//                                    $val_rating = $this->database->sum("comments", "rating", array("AND" => array("module_id" => $val['id'])));
//                                    $avg_rating = round(($val_rating / $tot_ratings), 1);
//                                    if ($avg_rating == '') {
//                                        $avg_rating = 0;
//                                    }
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
                                    ?><img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?w=300&h=260&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs thumbnail" style="width:300px;height:260px;">

                                                                                                                                                                                                                        <!--<img src="<?php echo main_url; ?><?= $val['image'] ?>" alt="" />-->
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
                                            <p><strong><?= Price . " : " ?></strong><?= $avg_price ?> QR <?= Per_Person ?></p>
                                            <p><strong><?= Capacity . " : " ?></strong><?= $capacity ?>  <?= Person ?></p>
                                            <p><strong><?= Location . " : " ?></strong><?= $val['city'] ?></p>
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
<!--                        <div class="customNavigation"> 
                            <a class="btn prev">
                                <img src="<?php echo main_url; ?>/themes/site/default/images/arrow-left.png" alt="" />
                            </a>
                            <a class="btn next">
                                <img src="<?php echo main_url; ?>/themes/site/default/images/arrow-right.png" alt="" />
                            </a>
                        </div>-->

                    </div>
                    <!--<div id="pagination_bottom"></div>-->
                    <?php
                    }
                else
                    {
                    ?>
                    <div role="alert" class="alert alert-danger">
                        <strong><?= $this->errors ?></strong>
                    </div><?php }
                ?></div>
        </div> 
        <!--12--> 
    </div>
    <!--row-->  
</div>
<style>
    .load-item{
        display: none;
    }
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
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
                $('#stars_id').html(data);
                $('#spin_4').hide();

            }
        });
    });
    });


</script>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>