<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");

$tpl->site_title = "Search Result";
$event = @$_GET['event'] ? clean($_GET['event']) : 'all';
$venue = @$_GET['venue'] ? clean($_GET['venue']) : 'all';
$location = @$_GET['location'] ? clean($_GET['location']) : 'all';
$pp = @$_GET['pp'] ? clean($_GET['pp']) : 'all';
$stars = @$_GET['stars'] ? clean($_GET['stars']) : 'all';

//$venue = clean($_GET['venue']);
//$location = clean($_GET['location']);
//$pp = clean($_GET['pp']);
//$stars = clean($_GET['stars']);
//echo "event ", $event, " venue ", $venue, " location ", $location, " stars ", $stars;

if (@$event != "all")
    {
    $event_key = 'events_id';
    }
else
    {
    $event_key = 'events_id[!]';
    }
if (@$venue != "all")
    {
    $venue_key = 'id';
    $title = $database->get("venue_category", "*", array("id" => $venue));
    }
else
    {
    $venue_key = 'id[!]';
    $title = Venues;
    }


if (@$location != "all")
    {
    $location_key = 'city_slug';
    }
else
    {
    $location_key = 'city_slug[!]';
    }

if (@$stars != "all")
    {
    $star_key = 'stars';
    }
else
    {
    $star_key = 'stars[!]';
    }
if (@$pp != "all")
    {
    $pp_Wedding_price_per_person_max = 'Wedding_price_per_person_max';
    }
else
    {
    $pp_Wedding_price_per_person_max = 'Wedding_price_per_person_max[!]';
//    $pp_key1 = 'id[!]';
//    $pp_key1 = 'id[!]';
//    $pp_key1 = 'id[!]';
    }


//Get the Venue Ids According to Event
$venue_category = $database->select("events_venue_category", "venue_category_id", array($event_key => $event));
//pr($venue_category);

$venue_category_key = "category";
//
//   $query_co = "SELECT * FROM `venue` WHERE `category` IN ('6','4','2','5','3','1','6','5','4','2','1','4','1','3') AND `stars` != 'all' AND `id` = '2' AND `city_slug` != 'all' ";  
//        $tpl->results = $results = $database->query($query_co)->fetchAll();
//        
$tpl->results = $results = $database->select("venue", "*", array("AND" => array(
        $venue_category_key => $venue_category,
        $star_key => $stars,
        $venue_key => $venue,
        $location_key => $location
    )));
//echo $database->last_query();
//pr($results);
//
$count_records = $database->count("venue", array("AND" => array(
        $venue_category_key => $venue_category,
        $star_key => $stars,
        $venue_key => $venue,
        $location_key => $location
    ))); //Count Records
//


$tpl->total_records = $count_records;
$tpl->event = $event;
$tpl->venue = $venue;
$tpl->location = $location;
$tpl->title = $title;
$tpl->pp = $pp;
$tpl->stars = $stars;
//pr($count_records);
echo $tpl->render("themes/site/" . theme_name . "/html/search_result.php");
