<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");

$tpl->site_title = "Venue Details";

$venue = $params[1];

//--------------------Venue Information--------------------//
$tpl->venue = $venue = $database->get("venue", "*", array("id" => $venue));

//**************** Getting the venue detail ids ****************//
$venues_id = $database->select("venue_details_venue", "venue_details_id", array("venue_id" => $params[1]));
// for displaying the list
$tpl->venue_details = $venue_detail = $database->select("venue_details", "*", array("id" => $venues_id));

$tpl->venue_detail = $venue_detail = $database->get("venue_details", "*", array("id" => $venues_id));

if ($venue_detail['id'])
    {
    $id = $venue_detail['id'];
    $tpl->venue_type = $venue_type = $database->get("venue_category", "*", array("id" => $venue['category']));
    $tpl->food_facility_ids = $food_facility_ids = $database->select("venue_details_venue_food_facility", "venue_food_facility_id", array("venue_details_id" => $id));
    $tpl->technical_facility_ids = $technical_facility_ids = $database->select("venue_details_venue_technical_facility", "venue_technical_facility_id", array("venue_details_id" => $id));
    $tpl->other_facility_ids = $other_facility_ids = $database->select("venue_details_venue_other_facility", "venue_other_facility_id", array("venue_details_id" => $id));
    }

//--------------------Review Section--------------------//
$tpl->review_count = $review_submit = $database->count("comments", array('module_id' => $params[1]));

$tpl->reviews = $database->select("comments", "*", array('AND' => array('module_id' => $params[1]), 'ORDER' => 'id DESC'));
//--------------------Review Section--------------------//
//
//-------------------- Review Submit ----------------------//
$errmsg_arr = array();
$errflag = false;
if (isset($_POST) && $_POST['reviews'])
    {
    $name = clean($_POST['name']);
    $review = clean($_POST['review']);
    $rating = clean($_POST['rating']);
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $private_key = recaptcha_private_key;
//    '6Lc1lCQTAAAAAFYANpH4sdUaR3OcFeqQfZTu4tVp';
    $response = file_get_contents($url . "?secret=" . $private_key . "&response=" . @$_POST['g-recaptcha-response']);
    $data = json_decode($response);
    $recaptcha = "";
    if (isset($data->success) && $data->success == true)
        {
        
        }
    else
        {
        $errmsg_arr[] = "Please Solve Recaptcha";
        $errflag = true;
        }

    if (!$name)
        {
        $errmsg_arr[] = "please enter your name";
        $errflag = true;
        }
    if (!$review)
        {
        $errmsg_arr[] = "please enter your review";
        $errflag = true;
        }
    if (!$rating)
        {
        $errmsg_arr[] = "please enter your rating";
        $errflag = true;
        }

    if ($errflag)
        {
        $tpl->errors = $errmsg_arr;
        }
    else
        {

        $data = array();
        $data['user_name'] = $name;
        $data['comment'] = $review;
        $data['rating'] = $rating;
        $data['module_id'] = $params[1];
        $review_submit = $database->insert("comments", $data);
        if ($review_submit)
            {

            header("location:" . main_url . "/venue_detail/" . $params[1] . "/success/#review_div_id");

//echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Message sent successfully...</p>";
            }
        else
            {
            header("location:" . main_url . "/venue_detail/" . $params[1] . "/error/#review_div_id");

//echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";
            }
//
        }
    }
//-------------------- Review Submit ----------------------//

//**************** Increase like counts ****************//
$database->update("venue", array("likes[+]" => 1), array("id" => $params[1]));

echo $tpl->render("themes/site/" . theme_name . "/html/venue_detail.php");
