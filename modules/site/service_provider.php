<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");
$tpl->site_title = "Service Provider";
$tpl->order_by = $order_by = @$_GET['order_by'] ? clean($_GET['order_by']) : 'a';
if ($order_by == "m")
    {
    $order = "likes DESC";
    }
else if ($order_by == "l")
    {
    $order = "id DESC";
    }
else
    {
    $order = "name";
    }

$tpl->service_providers = $database->select("service_provider", "*", array("AND" => array("category" => $params[1]), "ORDER" => $order));

$tpl->service = $database->get("service_category", "add_image", array("id" => $params[1]));

echo $tpl->render("themes/site/" . theme_name . "/html/service_provider.php");
