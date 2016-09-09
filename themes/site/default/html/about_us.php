<?php
echo $this->render("themes/site/" . theme_name . "/html/elements/header.php");
$lang = "";
if ($_SESSION['SELECTEDLANG'] == "arabic")
    {
    $lang = "_ar";
    }
$title = $this->about_us_data['title' . $lang];
$description = $this->about_us_data['description' . $lang];
$section_1_title = $this->about_us_data['section_1_title' . $lang];
$section_1_desc = $this->about_us_data['section_1_desc' . $lang];
$section_2_title = $this->about_us_data['section_2_title' . $lang];
$section_2_desc = $this->about_us_data['section_2_desc' . $lang];
$section_3_title = $this->about_us_data['section_3_title' . $lang];
$section_3_desc = $this->about_us_data['section_3_desc' . $lang];
$mission_description = $this->about_us_data['mission_description' . $lang];
$mission_title = $this->about_us_data['mission_title' . $lang];
$vision_title = $this->about_us_data['vision_title' . $lang];
$vision_description = $this->about_us_data['vision_description' . $lang];
$description_2 = $this->about_us_data['description_2' . $lang];
?>

<!--banner--> 
<div class="about-us">
    <div class="container">
        <div class="about-us-inner">
            <h1><?= About_us ?></h1>
        </div>

    </div><!--container-->
</div><!--about-us-->
<!--banner--> 

<!--who-are-we start-->
<div class="who-we-are">

    <div class="container"> 
        <div class="row">  

            <div class="who-we-are-inner"> 
                <div class="col-lg-6 col-md-6 col-sm-6 who-we-are-inner-left">
                    <div class="who-img"><img src="<?php echo main_url; ?>/themes/site/default/images/we-hr-img.png" alt="" /></div>
                    <h1><?= $title ?></h1>
                    <span><img src="<?php echo main_url; ?>/themes/site/default/images/we-img.png" alt="" /></span>
                    <div class="row"><?= $description ?></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 who-we-are-inner-right">
                    <div class="who-we-are-inner-right-img"><img src="<?php echo main_url, $this->about_us_data['section_image']; ?>" alt="" /></div>
                    <div class="birthday">
                        <div class="birthday-inner"> 
                             <h1><?= $section_1_title ?></h1>
                            <p><?= $section_1_desc ?></p>
                        </div>

                        <div class="birthday-inner">
                            <h1><?= $section_2_title ?></h1>
                            <p><?= $section_2_desc ?></p>
                        </div>

                        <div class="birthday-inner">
                            <h1><?= $section_3_title ?></h1>
                            <p><?= $section_3_desc ?></p>
                        </div>


                    </div>
                </div>
                <div class="who-we-are-inner-sec col-sm-12 text-center"> <p> <?= $description_2 ?></p></div>
            </div>

            <div class="col-sm-12">
                <div class="mission">
                    <div class="mission-box">
                        <div class="mission-box-icon"><img src="<?php echo main_url, $this->about_us_data['mission_image']; ?>" alt="<?= mission_image ?>" /></div>
                        <h1><?= $mission_title ?></h1>
                        <p> <?= $mission_description ?></p>
                    </div>


                    <div class="mission-box">
                        <div class="mission-box-icon"><img src="<?php echo main_url, $this->about_us_data['vision_image']; ?>" alt="<?= vision_image ?>" /></div>
                        <h1><?= $vision_title ?></h1>
                        <p><?= $vision_description ?></p>
                    </div>



                </div>



            </div>


        </div>
    </div>
</div>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

