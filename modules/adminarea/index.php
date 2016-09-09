<?php
$tpl =  new bQuickTpl();
$tpl->page_title = "Admin Panel";
$status = "none";


include(getcwd()."/modules/adminarea/common.php");
echo $tpl->render("themes/adminarea/html/index.php");
