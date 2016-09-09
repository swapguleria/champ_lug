<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");
$tpl->site_title = "About";
//get about us Content  
$about_us_data = get_data($database, "get", "about_us", "*");
$tpl->about_us_data = $about_us_data;
echo $tpl->render("themes/site/" . theme_name . "/html/about_us.php");
