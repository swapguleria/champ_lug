<?php
echo $this->render("themes/site/" . theme_name . "/html/elements/header.php");
$lang = "";
if ($_SESSION['SELECTEDLANG'] == "arabic") {
    $lang = "_ar";
}
?>
<div class="about-us contact-page service-provider advertise" id="">
    <div class="container">
        <div class="service_provider_inner">
            <h1><?= service_provider ?></h1>
        </div>
    </div>
</div>
<div class="event">
    <div class="col-sm-12 slider">
        <div class="for_add text-center">
            <?php
            if (@$this->service) {
                $url = $this->service;
            } else {
                $url = "uploads/banner_no_image.jpg";
            }
            ?> <img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?h=260&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs thumbnail" style="width:100%;height:260px;">
        </div>
    </div>
</div>

<!--banner-->


<div class="patners">
    <div class="container inner-container">
        <h1><?= Our_Valuable_Service_Provider_Who_Support_Us_To_Achieve_Your_Satisfaction ?></h1>
        <div class="clients-main row">
            <div class="col-sm-12">
                <div class="order-by">
                    <form action="" method="GET">
                        <div class="col-sm-4 pull-right order-by-inner">
                            <label><?= Order_By ?></label>
                            <select name="order_by" class="form-control" onchange="this.form.submit()"> 

                                <option value="a" <?php echo ($this->order_by == "a") ? 'selected="selected"' : ''; ?> ><?= Alphabetically ?></option>
                                <option value="l" <?php echo ($this->order_by == "l") ? 'selected="selected"' : ''; ?> ><?= Latest ?></option>
                                <option value="m" <?php echo ($this->order_by == "m") ? 'selected="selected"' : ''; ?> ><?= Most_Visited ?></option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (@$this->service_providers) {
                foreach ($this->service_providers as $key => $val) {
                    ?>
            <div class="load-items col-sm-4 clients" style="display: none">
                        <div class="client-inner">
                            <div class="client-img"><a href="<?php echo main_url; ?>/provider_detail/<?php echo $val['id']; ?>">
                                    <img src="<?php echo main_url; ?>/<?= $val['logo'] ?>" alt="<?php echo $val['name']; ?>" />
                            </div> 
                            <div class="client-text">
                                <!--<h2><?= $val['name']; ?></h2>-->
                                <h2><a href="<?= main_url . '/provider_detail/' . $val['id']; ?>"><?= $val['name']; ?></a></h2>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?><div style="margin-top: 50px" role="alert" class="alert alert-danger">
                    <strong><?= No_Data_Available ?>. </strong>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="more_list_item">
                        <a href="javascript:void(0)" id="ViewMoreListItem">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

<script>
//    $(function () {
//        $(".load-items").slice(0, 3).show();
//        if ($(".load-items:hidden").length === 0) {
//            $("#ViewMoreListItem").fadeOut('slow');
//        }
//        $("#ViewMoreListItem").on('click', function (e) {
//            e.preventDefault();
//            $(".load-items:hidden").slice(0, 6).slideDown();
////                                        alert((".load-item:hidden").length);
//            if ($(".load-items:hidden").length === 0) {
//                $("#ViewMoreListItem").fadeOut('slow');
//            }
//
//            $('html,body').animate({
//                scrollTop: $(this).offset().top
//            }, 1500);
//        });
//    });
</script>