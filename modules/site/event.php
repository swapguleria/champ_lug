<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");
$venue_category = $params[1];
if (@$_GET['persons'] || @$_GET['pp'] || @$_GET['stars'])
    {
    $tpl->search = "true";
    $persons = @$_GET['persons'] ? clean($_GET['persons']) : '1';
    $pp = @$_GET['pp'] ? clean($_GET['pp']) : 'all';
    $stars = @$_GET['stars'] ? clean($_GET['stars']) : 'all';
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
        if ($pp != "1000_up")
            {
            $pp_Wedding_price_per_person_max = 'Wedding_price_per_person_max[<=]';
            $pp_meeting_price_per_person_max = 'Meeting_price_per_person_max[<=]';
            }
        else
            {
            $pp = 1000;
            $pp_Wedding_price_per_person_max = 'Wedding_price_per_person_max[>=]';
            $pp_meeting_price_per_person_max = 'Meeting_price_per_person_max[>=]';
            }
        }
    else
        {
        $pp_Wedding_price_per_person_max = 'Wedding_price_per_person_max[!]';
        $pp_meeting_price_per_person_max = 'Meeting_price_per_person_max[!]';
        }
// for the Listing of venues 

    $venue_category_array = $database->select("venue", "id", array("AND" => array("category" => $venue_category, $star_key => $stars)));

//    echo $database->last_query();
//    pr($venue_category_array);
    $serch_result1 = $database->select("venue_details_venue", "venue_details_id", array("venue_id" => $venue_category_array));

//    echo $database->last_query();
    $serch_result2 = $database->select("venue_details", "id", array("OR" => array(
            "banquet_capacity[>=]" => $persons,
            "Reception_capacity[>=]" => $persons,
            "Boardroom_capacity[>=]" => $persons,
            "Theater_capacity[>=]" => $persons,
            "U_Shaped_capacity[>=]" => $persons
    )));
    $serch_result3 = $database->select("venue_details", "id", array("OR" => array(
            $pp_Wedding_price_per_person_max => $pp,
            $pp_meeting_price_per_person_max => $pp)
    ));
//    echo "1";
//    pr($serch_result1);
//    echo "2";
//    pr($serch_result2);
//    echo "3";
//    pr($serch_result3);
    $result = array_intersect($serch_result1, $serch_result2, $serch_result3);
//    pr($result);
    $serch_result = $database->select("venue_details", "venue", array('id' => $result)
    );
    $ids_array = array();
    foreach ($serch_result as $key => $val)
        {
//    pr($val);
        $data = unserialize($val);
        $ids_array[] = $data[0];
        }
//    pr($ids_array);
//    echo $database->last_query();
    $venues = array_unique($ids_array);
//    pr($venues);
    $tpl->venue_category_details = $venue_category_details = $database->select("venue", "*", array("id" => $venues));
//    echo $database->last_query();
    }
else
    {
    $tpl->venue_category_details = $venue_category_details = $database->select("venue", "*", array("category" => $venue_category));

//    $tpl->venue_category_details_count = $database->count("venue", array("category" => $venue_category));
    }
$lang = "";
if ($_SESSION['SELECTEDLANG'] == "arabic")
    {
    $lang = "_ar";
    $name = "name_ar";
    }
else
    {
    $name = "name";
    }
// For Titels 
$title = $database->get("venue_category", $name, array("id" => $venue_category));
$tpl->title = (@$title) ? $title : "Venue";
$tpl->venues = $venues;
$tpl->stars = $stars;
$tpl->persons = $persons;
$tpl->site_title = $tpl->title;
$tpl->pp = $pp;
echo $tpl->render("themes/site/" . theme_name . "/html/event.php");
