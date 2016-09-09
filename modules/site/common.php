<?php

if (isset($_POST) && $_POST['sign_up'])
    {

    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $data = array();
    $data['name'] = $name;
    $data['email'] = $email;
    $already_added = $database->get("newsletter_subscribed", "*", array("email" => $email));
//    print_r($already_added);
//    die("SAD");
    if (@$already_added['email'])
        {
        header("location:" . main_url . "/index/error/#signup_id");
        }
    else
        {
        $newsletter_subscribed_submit = $database->insert("newsletter_subscribed", $data);
//       if ($newsletter_subscribed_submit)
//                {
//                echo "<p style='color: green; font-weight: bold; font-size: 15px;'>You are successfully added to News Letter Subscription...</p>";
//                }
//            else
//                {
//                echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";
//                }

        header("location:" . main_url . "/index/success/#signup_id");
        }
    }
if (isset($_GET['action']))
    {
    $tpl = new bQuickTpl();
    $vars = explode("/", $_GET['action']);
    $tpl->params = $vars;
    }
// -----------------   displaying all diffrent kinds of Venues -----------------//
$tpl->venue_categorys = $venue_categorys = $database->select("venue_category", "*", array("ORDER" => "name"));
$tpl->venue_categorys_count = $database->count("venue_category");
// *-----------------*   displaying all diffrent kinds of Venues *-----------------*  //

$tpl->service_categorys = $service_categorys = $database->select("service_category", "*", array("ORDER" => "name"));
$tpl->event_categorys = $event_categorys = $database->select("events", "*", array("ORDER" => "name"));


// *-----------------*   For Footer *-----------------*  //
$tpl->about_us = $about_us = $database->get("about_us", "*");

// Price Per persone
$price_per_persone = $database->select("venue_details", "*");
$all_prices = array();
foreach ($price_per_persone as $key => $val)
    {
    $all_prices[] = $val['Wedding_price_per_person_min'];
    $all_prices[] = $val['Wedding_price_per_person_max'];
    $all_prices[] = $val['Meeting_price_per_person_min'];
    $all_prices[] = $val['Meeting_price_per_person_max'];
    }
$price = array_unique($all_prices);
sort($price);
$tpl->price = $price;

//locations
$all_locations = $database->select("venue", "*");
$all_location_title = array();
$all_location_slug = array();
$all_location = array();
foreach ($all_locations as $key => $val)
    {
    if (@$val['city'])
        {
        $all_location_title[] = strtolower(trim($val['city']));
        $all_location_slug[] = $val['city_slug'];
        }
    }
$all_location_title = array_unique($all_location_title);
$all_location_slug = array_unique($all_location_slug);
sort($all_location_title);
sort($all_location_slug);
//pr($all_location_title);
//pr($all_location_slug);

$k = 0;
foreach ($all_location_title as $key => $val)
    {

    $all_location[$all_location_slug[$k]] = $all_location_title[$k];
    $k++;
    }

//$all_location = array_unique($all_location);
//$locations = array_unique($all_location);
$tpl->locations = $all_location;
// Include Site Functions
include(getcwd() . "/includes/site_functions.php");


// Include Site Actions
require_once(getcwd() . "/includes/site-actions/site-actions.php");
//require_once(getcwd() . "/core/Facebook/facebook.php");
//aliases
$tpl->aliases = $aliases;

//aliases_flip
$aliases_flip = array_flip($aliases);
$tpl->aliases_flip = $aliases_flip;
?>   

