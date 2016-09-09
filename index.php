<?php 
if(!file_exists('config/config.php'))
{
	header("location:config/installer/");exit;
}

include("includes/core_functions.php");

include("config/config.php");

//DONT MAKE ANY CHANGES BELOW

if(_language){
   include("languages/" . _language . ".php"); 
}else{
    include("languages/" . language . ".php");
}


require_once("core/template.php");
date_default_timezone_set(timezone);

include(getcwd() . '/core/phpmailer/class.phpmailer.php');
$mail = new PHPMailer();


	//alias list
	$aliases = array();
	$get_aliases = $database->select('module_alias','*');
	if(!empty($get_aliases)){
		foreach($get_aliases as $alias)
		$aliases[$alias['alias_name']] = $alias['module_name'];
	}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $params = explode("/", $_GET['action']);

    if (isset($params[0])) {
        if ($params[0] == "adminarea") {
            if (!isset($params[1])) {
                $params[1] = 'login';
            }
            $filename  = "modules/adminarea/" . $params[1] . ".php";
            if (!file_exists($filename)) {
				$filename="modules/adminarea/404.php";
            }
			include($filename);
        }
        else {
            $filename = "modules/site/" . $params[0] . ".php";
            if (!file_exists($filename)) {
				if(array_key_exists($params[0],$aliases)){
					$filename = "modules/site/" . $aliases[$params[0]] . ".php";
					if(!file_exists($filename))
					$filename = "modules/site/404.php";
				}
				else{
					$filename = "modules/site/404.php";
				}
            }
			include($filename);
        }
        
    }
    else {
//        header("location:adminarea");exit;
        include("modules/site/index.php");
    }
}
else {
//     header("location:adminarea");exit;
    include("modules/site/index.php");
}
