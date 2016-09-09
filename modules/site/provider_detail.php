<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");

$tpl->site_title = "Provider Details";
$tpl->provider = $database->get("service_provider", "*", array("id" => $params[1]));
$tpl->provider_gallery = $database->select("service_provider_gallery", "*", array("service_provider" => $params[1]));

$tpl->provider_service = $database->select("provider_service", "*", array("service_provider" => $params[1]));
$database->update("service_provider", array("likes[+]" => 1), array("id" => $params[1]));
echo $tpl->render("themes/site/" . theme_name . "/html/provider_detail.php");
