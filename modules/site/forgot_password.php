<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");

include(getcwd() . "/libs/helper/mail.php");
include(getcwd() . "/libs/helper/common.php");
$tpl->loginUrl = $loginUrl;
$tpl->page_title = "Forgot Password";

//--for send password--//  
if (isset($_POST) && $_POST) {
    try {
        $result = 'CSRF check passed. Form parsed.';
        $userEmail = clean($_POST['data']['user_email']);
        if ($userEmail == '') {
            $errmsg_arr[] = 'Please enter your email address';
            $errflag = true;
        }
        if ($errflag == false) {
            $get_user = $database->select("users", "*", array("email" => $userEmail));

            if ($get_user) {
                $newpass = randomPassword();
                $to = $userEmail;
                $subject = 'Forgot Password in viva Brazileira fifa!';
                $message = 'Your new password is: ' . $newpass;
                sendEmail($to, $subject, $message, $shortcodes = null, $from = null, $mail);

                header("location:" . main_url . "/forgot_password/success");
            } else {
                $errmsg_arr[] = 'No such User found in Database!';
                $errflag = true;
            }
        }
        if ($errflag) {
            $tpl->errors = $errmsg_arr;   
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
$tpl->result = $result;

echo $tpl->render("themes/site/".theme_name."/html/forgot_password.php");
