<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");
$tpl->site_title = "Index";
// ----------------- Hotels -----------------//
$tpl->hotels = $hotels = $database->select("venue", "*", array("AND" => array("category" =>1), "ORDER" => 'id ASC'));
//pr($hotels);
// *-----------------*   Hotels *-----------------*//
// -----------------   Testimonials -----------------//
$tpl->testimonials = $testimonials = $database->select("testimonials", "*");
// *-----------------*   Testimonials  *-----------------*//

echo $tpl->render("themes/site/" . theme_name . "/html/index.php");
