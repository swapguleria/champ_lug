<?php
include(getcwd() . "/core/nocsrf.php");
$tpl =  new bQuickTpl();
include(getcwd()."/modules/site/common.php");
$errmsg_arr = array();
$errflag = false;

if($_SESSION['user_id']){
    header("location:" . main_url);
    exit;
}
//--user login--//
if (isset($_POST) && $_POST['lsubmit']) {
    try {
        NoCSRF::check('csrf_token', $_POST, true, 60 * 10, false);
        $lusername = clean($_POST['ldata']['email']);
        $lpassword = clean($_POST['ldata']['password']);
        //pr($_POST['ldata']);
        $lerrflag = false;
        if ($lusername == '') {
            $lerrmsg_arr[] = 'User email is missing';
            $lerrflag = true;
        }
        if ($lpassword == '') {
            $lerrmsg_arr[] = 'Password is missing';
            $lerrflag = true;
        }
        if ($lerrflag == false) {
            //Find the user in Database
            $get_user = $database->select("users", "*", array(   
                "AND" => array(
                    "email" => $lusername,
                    "password" => md5($lpassword),
                    //"approved" => '1',
                )
            ));
            //pr($get_user);die;
            if ($get_user) {
                //Set session
                $_SESSION['user_id'] = $get_user[0]['id'];
                //Put name in session
                $_SESSION['firstname'] = $get_user[0]['firstname'];
                $_SESSION['lastname'] = $get_user[0]['lastname'];
                $_SESSION['user_email'] = $get_user[0]['email'];
                //$_SESSION['picture'] = $get_user[0]['picture'];
                //Close session writing
                session_write_close();
                //Redirect to user's page
                header("Location: " . main_url. "/login/success");
                exit();
            } else {
                $lerrmsg_arr[] = 'No such User found!';
                $lerrflag = true;
            }
        }
        if ($lerrflag) {
            $tpl->lerrors = $lerrmsg_arr;
        }
    } catch (Exception $e) {
        // CSRF attack detected
        $result = $e->getMessage() . ' Form ignored.';
    }
} else {
    $result = 'No post data yet.';
}
$token = NoCSRF::generate('csrf_token');
$tpl->formtoken = $token;




echo $tpl->render("themes/site/".theme_name."/html/login.php");
