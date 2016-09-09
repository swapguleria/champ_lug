<?php

//session_start();
include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");
$tpl->site_title = "Search";
//pr($params);
//echo"asd"; 

if (isset($_GET) && $_GET)
    {

    $keyword = clean($_GET['keyword']);

//    pr($keyword);
    $_SESSION['keyword'] = $keyword;
    if ($keyword != "")
        {
        $query_counts = "select * from venue where name or city like '%$keyword%'";
        $get_all_venues = $database->query($query_counts)->fetchAll();
//         pr($get_all_venues);  
        $tpl->page_title = ' "' . $keyword . '"';
        if ($get_all_venues)
            {
            
            }
        else
            {
            $errmsg_arr = "No record Found";
            $tpl->errors = $errmsg_arr;
            }
        }
    else
        {
        $errmsg_arr = "You not enter keyword. Please enter keyword and try again !.";
        $tpl->errors = $errmsg_arr;
        }
    $tpl->keyword = $keyword;
    }
//pr($get_all_venues);
$tpl->all_venues = $get_all_venues;
echo $tpl->render("themes/site/" . theme_name . "/html/search.php");


