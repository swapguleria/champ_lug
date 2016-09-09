<?php 

	ob_start();	
	session_start();
	if(isset($_SESSION["website_error_level"]))
	$error_level = $_SESSION["website_error_level"];
	else
	$error_level = -1;
	error_reporting($error_level);
	
	include "config/db_settings.php";
	
	require  "core/db.php";
        
	$database = new medoo(array(
		"database_type" => "mysql",
		"database_name" => db_name,
		"server" => db_host,
		"username" => db_user,
		"password" => db_password,
		"charset" => "utf8",
	));
	   
	
	
	$settings = $database->select("settings", "*");
	foreach ($settings as $value) {
		define($value["setting_name"] ,$value["setting_value"]);
	}
	
	
	if(main_url == ""){
		$get_url = website_url;
		$database->update("settings",array("setting_value"=>$get_url), array("setting_name"=>"main_url"));
		header("location: ".current_url());	
		exit;
	}
	
       

        if(isset($_GET['lang'])){
         $_SESSION['SELECTEDLANG'] = $_GET['lang'];
          define("_language",$_SESSION['SELECTEDLANG']);
        }else{
         if(!$_SESSION['SELECTEDLANG']){
          $_SESSION['SELECTEDLANG'] = "english";
          define("_language","english");
         }else{
             define("_language",$_SESSION['SELECTEDLANG']);
         }
        }
	
	define("_admin_url" ,main_url."/adminarea");
        