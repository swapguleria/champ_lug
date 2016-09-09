<?php
include(getcwd() . "/core/nocsrf.php");
$tpl =  new bQuickTpl();
include(getcwd()."/modules/site/common.php");

//--male user registration--//
if (isset($_POST) && $_POST['submit_user']) {   
   
    try {
        NoCSRF::check('csrf_token', $_POST, true, 60 * 10, false);
        //$result = 'CSRF check passed. Form parsed.';
        $firstname = clean($_POST['data']['firstname']);
        $lastname = clean($_POST['data']['lastname']);
        $email = clean($_POST['data']['email']);
        $password = clean($_POST['data']['password']);
        $c_password = clean($_POST['data']['c_password']);
        //pr($_POST['data']);die;
        $exits_email = $database->select("users", "*", array("email" => $email));

        if ($exits_email) {
            $errmsg_arr[] = 'User email is already exits';
            $errflag = true;
        }
        if (!$firstname) {
            $errmsg_arr[] = 'Please enter Your First Name!';
            $errflag = true;
        }
        if (!$lastname) {
            $errmsg_arr[] = 'Please enter Your Last name!';
            $errflag = true;
        }
        if (!$email) {
            $errmsg_arr[] = 'Please enter your email address!';
            $errflag = true;
        }
        //check repeat password
        if (!$password) {
            $errmsg_arr[] = 'Please enter password!';
            $errflag = true;
        }
        if (!$c_password) {
            $errmsg_arr[] = 'Please enter Confirm password!';
            $errflag = true;
        } else if ($c_password != $password) {
            $errmsg_arr[] = 'Confirm Password does not match';
            $errflag = true;
        } else {
            // hash md5 password
            $n_password = md5(clean($_POST['data']['password']));
            unset($_POST['data']['c_password']);
        }
    

        //If there are input validations, redirect back to the register form
        if ($errflag) {
            $tpl->errors = $errmsg_arr;
        } else {
            // insert into database         
            $data = array();
            $data["firstname"] =$firstname;
            $data["lastname"] =$lastname;
            $data["email"] = $email;
            $data["password"] = $n_password;     
            //pr($data);die;
            $userdata = user_insert($database, $data);
            
            if ($userdata) {
                header("location:". main_url. "/register/success");
                exit(); 
            }
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
    


echo $tpl->render("themes/site/".theme_name."/html/register.php");
   