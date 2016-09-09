<?php
echo $this->render("themes/site/" . theme_name . "/html/elements/header.php");
?>
<style>
    /*    .totop a {
            display: none;
        }
        a, a:visited {
            color: #33739E;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }
        a:hover {
            text-decoration: none;
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
    }*/

</style>
<div class="banner event">
    <div class="container">
        <div class="row hotel-banner">
            <div class="planning col-sm-6 best">
                <h1><?= Best . " " ?> <?= ucwords($this->title) ?><?= " " . at ?> <span><?= " " . Lugares ?></span></h1>

                <form id="src_frm" action="" method="GET">
                    <div class="row three-column">
                        <div class="col-sm-4">
                            <label><?= Size ?></label>
                            <?php $max = (@$this->persons) ? $this->persons : 1; ?>
                            <input type="range"  min="0" max="1500" onchange="updateTextInput(this.value);"  step ="10" value ="<?= $max ?>">
                            <input type="text" id="textInput"  name="persons" value="<?= $max ?>"> <?= Persons ?>
                        </div>

                        <!--4-->
                        <div class="col-sm-4">
                            <label><?= Price_Per_Person ?></label>
                            <select class="form-control drp_dn" id="pp_id" name="pp"  >
                                <option value="all"><?= Price_Per_Person ?></option>
                                <option value="50" <?php echo ($this->pp != "all" && $this->pp == 50) ? 'selected="selected"' : ''; ?> > Less than QR   &nbsp; 50</option>
                                <option value="125" <?php echo ($this->pp != "all" && $this->pp == 125) ? 'selected="selected"' : ''; ?> > Less than QR  &nbsp;125</option>
                                <option value="200" <?php echo ($this->pp != "all" && $this->pp == 200) ? 'selected="selected"' : ''; ?> > Less than QR  &nbsp;200</option>
                                <option value="250" <?php echo ($this->pp != "all" && $this->pp == 250) ? 'selected="selected"' : ''; ?> > Less than QR  &nbsp;250</option>
                                <option value="325" <?php echo ($this->pp != "all" && $this->pp == 325) ? 'selected="selected"' : ''; ?> > Less than QR  &nbsp;325</option>
                                <option value="400" <?php echo ($this->pp != "all" && $this->pp == 400) ? 'selected="selected"' : ''; ?> > Less than QR  &nbsp;400</option>
                                <option value="1000" <?php echo ($this->pp != "all" && $this->pp == 1000) ? 'selected="selected"' : ''; ?> >Less than QR 1000</option>
                                <option value="1000_up" <?php echo ($this->pp != "all" && $this->pp == "1000_up") ? 'selected="selected"' : ''; ?> >More than QR 1000</option>
                            </select>
                        </div>
                        <!--4--> 
                        <!--4-->
                        <div class="col-sm-4">
                            <label><?= Number_of_Stars ?></label>
                            <select class="form-control drp_dn" id="stars_id" name="stars"   >
                                <option value="all"><?= Number_of_Stars ?></option>
                                <option value="1" <?php echo ($this->stars != "all" && $this->stars == 1) ? 'selected="selected"' : ''; ?> >1 <?= Star ?></option>
                                <option value="2" <?php echo ($this->stars != "all" && $this->stars == 2) ? 'selected="selected"' : ''; ?> >2 <?= Star ?></option>
                                <option value="3" <?php echo ($this->stars != "all" && $this->stars == 3) ? 'selected="selected"' : ''; ?> >3 <?= Star ?></option>
                                <option value="4" <?php echo ($this->stars != "all" && $this->stars == 4) ? 'selected="selected"' : ''; ?> >4 <?= Star ?></option>
                                <option value="5" <?php echo ($this->stars != "all" && $this->stars == 5) ? 'selected="selected"' : ''; ?> >5 <?= Star ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row three-column">


                        <div class="col-sm-4 top-padding">
                        </div>
                        <div class="col-sm-4 top-padding">
                            <input type="submit" value="<?= Search ?>" />
                        </div>
                        <!--two-column-->

                    </div>
                    <!--two-column-->

                </form>
            </div>
            <!--planning--> 
            <div class="col-sm-5 slider">
                <div class="for_add text-center">
                    <h3>Space<br>For Add</h3>
                </div>
            </div><!--6-->
        </div>
        <!--row--> 
    </div>
    <!--cont--> 
</div>
<!--banner-->



<?php
if (@$this->search)
    {
    ?>
    <div class="featured feature-hotel">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><?= Search . " " . Result ?> </h1>
                </div>
                <!--12--> 
            </div>
            <!--row-->
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    if ($this->venues)
                        {
                        ?>
                        <div id="inner">
                            <?php
                            foreach ($this->venue_category_details as $key => $val)
                                {
                                $avg_price = $banquet_capacity = $UShaped_capacity = $Boardroom_capacity = $Theater_capacity = $Reception_capacity = $capacity = $likes = $tot_ratings = $val_rating = 0;
//**************** Getting the venue detail ids ****************//
                                $venues_id = $this->database->select("venue_details_venue", "venue_details_id", array("venue_id" => $val['id']));
//                                    pr($venues_id);
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
                                        ?>  
                                        <img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?h=260&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs thumbnail" style="width:100%;height:260px;">
                                        <!--<img src="<?php echo main_url . "/" . $url; ?>" alt="" />-->
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
                                                    </a>
                                                    <span class="img-hover-like" ><?= $likes ?></span>
                                                </li>
                                            </ul>
                                            <h3><a href="<?= main_url ?>/venue_detail/<?= $val['id'] ?>"><?= $val['name'] ?></a></h3>
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
                                                <p><strong><?= Price ?></strong><span></span><b><?= $avg_price . " " ?><strong>QR</strong><?= Per_Person ?></b></p>
                                                <p><strong><?= Capacity ?>:</strong><span></span><b><?= $capacity . " " ?> <?= Persons ?></b></p>
                                                <p><strong><?= Location ?></strong><span></span><b><?= $val['city'] ?></b></p>
                                            </div>
                                            <!--<a href="#">+ Add To My list</a> </div>-->
                                            <!--list--> 
                                        </div>

                                        <!--hover--> 
                                    </div>
                                </div><?php } ?>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="read_more_list_item">
                                        <a href="javascript:void(0)" id="ViewMoreListItem">Load More</a>
                                    </div>
                                </div>
                            </div>
        <!--                            <div class="customNavigation"> <a class="btn prev"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-left.png" alt="" /></a> <a class="btn next"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-right.png" alt="" /></a> </div>-->

                            <div id="pagination_top" class="pagination" ></div>
                            <?php
                            }
                        else
                            {
                            ?> <div role="alert" class="alert alert-danger">
                                <strong><?= Sorry . " " ?> !</strong> <?= No . " " ?><span><?= ucwords($this->title) ?><?= " " . Found ?>.
                            </div><?php }
                        ?> </div>
                    <!--12--> 
                </div>
                <!--row--> 
            </div>
            <!--cont--> 
        </div>
        <!--featured-->
    </div><?php
    }
else
    {
    ?>

    <div class="featured feature-hotel">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><?= Featured . " " ?><span><?= ucwords($this->title) ?></span></h1>
                </div>
                <!--12--> 
            </div>
            <!--row-->
            <div class="row">
                <div class="col-sm-12">
                    <?php
                    if (@$this->venue_category_details)
                        {
                        ?>
                        <!--<div id="pagination_top" class="pagination" ></div>-->
                        <div id="inner">

                            <?php
                            foreach ($this->venue_category_details as $key => $val)
                                {
                                $price2 = $price1 = $avg_price = $banquet_capacity = $UShaped_capacity = $Boardroom_capacity = $Theater_capacity = $Reception_capacity = $capacity = $likes = $tot_ratings = $val_rating = 0;
////**************** Getting the venue detail ids ****************//
                                $venues_id = $this->database->select("venue_details_venue", "venue_details_id", array("venue_id" => $val['id']));
////                                    pr($venues_id);
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
                                <div class="load-items col-sm-4 feature-item load-items" style="display: none"> 
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
                                        ?><img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?h=260&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs thumbnail" style="width:100%;height:260px;">
                                        <!--<img src="<?php echo main_url . "/" . $url; ?>" alt="" />-->
                                    </div>
                                    <div class="image-hover event">
                                        <div class="add-to-list">
                                            <ul>
                                                <li>
                                                    <a class="image-hover-coment" href="<?php echo main_url; ?>/venue_detail/<?= $val['id'] . "#review_div_id" ?>">
                                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                        <span class="img-hover-coment"><?= $avg_rating ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="image-hover-like" href="<?php echo main_url; ?>/venue_detail/<?= $val['id'] ?>">
                                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                    <span class="img-hover-like" ><?= $likes ?></span>
                                                </li>
                                            </ul>
                                            <h3><a href="<?= main_url ?>/venue_detail/<?= $val['id'] ?>"><?= $val['name'] ?></a></h3>
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
                                                <p><strong><?= Price ?></strong><span></span><b><?= $avg_price . " " ?><strong>QR</strong><?= " " . Per_Person ?></b></p>
                                                <p><strong><?= Capacity ?>:</strong><span></span><b><?= $capacity ?>  <?= Persons ?></b></p>
                                                <p><strong><?= Location ?></strong><span></span><b><?= $val['city'] ?></b></p>
                                            </div>
                                            <!--<a href="#">+ Add To My list</a> </div>-->
                                            <!--list--> 
                                        </div> <!--hover--> 
                                    </div>      
                                </div>

                                <?php }
                            ?><div class="col-md-12">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="read_more_list_item">
                                        <a href="javascript:void(0)" id="ViewMoreListItem">Load More</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        else
                            {
                            ?> <div role="alert" class="alert alert-danger">
                                <strong><?= Sorry . " " ?> !</strong> <?= No . " " ?><span><?= ucwords($this->title) ?><?= Found . " " ?>.
                            </div><?php }
                        ?> 
<!--                        <div class="col-md-12">
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="more_list_item">
                                    <a href="javascript:void(0)" id="ViewMoreListItem">Load More</a>
                                </div>
                            </div>
                        </div>-->
                    </div>

                    <!--12--> 
                </div>
                <!--row--> 
            </div>
            <!--cont--> 
        </div>
        <!--featured-->
    </div> 



<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

                                function updateTextInput(val) {
                                    document.getElementById('textInput').value = val;
                                }

//                                $(function () {
//                                    $(".load-items").slice(0, 9).show();
//                                    if ($(".load-items:hidden").length === 0) {
//                                        $("#ViewMoreListItem").fadeOut('slow');
//                                    }
//                                    $("#ViewMoreListItem").on('click', function (e) {
//                                        e.preventDefault();
//                                        $(".load-items:hidden").slice(0, 6).slideDown();
////                                        alert((".load-item:hidden").length);
//                                        if ($(".load-items:hidden").length === 0) {
//                                            $("#ViewMoreListItem").fadeOut('slow');
//                                        }
//
//                                        $('html,body').animate({
//                                            scrollTop: $(this).offset().top
//                                        }, 1500);
//                                    });
//                                });


                                $('a[href=#top]').click(function () {
                                    $('body,html').animate({
                                        scrollTop: 0
                                    }, 600);
                                    return true;
                                });
                                $(window).scroll(function () {
                                    if ($(this).scrollTop() > 50) {
                                        $('.totop a').fadeIn();
                                    } else {
                                        $('.totop a').fadeOut();
                                    }
                                });
</script>




<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

