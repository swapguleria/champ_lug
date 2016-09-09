<?php
include(getcwd() . "/core/nocsrf.php");
$tpl =  new bQuickTpl();
include(getcwd()."/modules/site/common.php");

require_once(getcwd().'/libs/recaptcha/recaptchalib.php');
$publickey = recaptcha_public_key; // you got this from the signup page
$privatekey = recaptcha_private_key; // you got this from the signup page
$tpl->captchacode = recaptcha_get_html($publickey,'',true);

$tpl->page_title = "Signup @ CodeBasket";
$tpl->page_description =  "Vote on our 25,000+ top ten lists or create a list of your own. You help determine the best games, greatest songs, hottest celebs, top companies, and more.";
$tpl->keywords =  "hottest celebs, top companies, top insurance companies. top actresses. top actors";
$tpl->page_image       = main_url.website_logo;
$tpl->site_name = site_name;

$errmsg_arr = array();
$errflag = false;
$success_flag = false;
$success_message = array();

if(login_check($database) == true) {  
    if(check_admin() == true){
        header("Location: "._admin_url."/index");
        exit();
    }else{
         header("Location: ".main_url);
         exit();
    }

}else{
    
}

if(isset($_POST) && $_POST){
    
    
        
        
    try
    {
        
        NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
        
     
        
        $resp = recaptcha_check_answer ($privatekey,
            $_SERVER["REMOTE_ADDR"],
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);
        
        if (!$resp->is_valid) {
               $errmsg_arr[] = "The reCAPTCHA wasn't entered correctly. Go back and try it again.";
               $errflag = true;    
        }else{
          
            if (isset($_POST['fullname'], $_POST['email'], $_POST['password'], $_POST['repeat_password'])) {
                $fullname = clean($_POST['fullname']);
                $email = $_POST['email'];
                
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                $check_email = $database->select("users",array("user_id","email"),array("email"=>$email));
                
                
                $password = clean($_POST['password']);
                $repeat_password = clean($_POST['repeat_password']);
                
                if($fullname == ""){
                    $errmsg_arr[] = 'Full Name field cannot be empty';
                    $errflag = true;
                }
                if($password == ""){
                    $errmsg_arr[] = 'Password field cannot be empty';
                    $errflag = true;
                }
                if($repeat_password == ""){
                    $errmsg_arr[] = 'The email address you entered is not valid';
                    $errflag = true;
                }
                if($repeat_password !== $password){
                    $errmsg_arr[] = 'Both passwords should match';
                    $errflag = true;
                }
                 if($email == ""){
                    $errmsg_arr[] = 'Email Address field cannot be empty';
                    $errflag = true;
                }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errmsg_arr[] = 'The email address you entered is not valid';
                    $errflag = true;
                }else if (count($check_email) == 1) {
                    
                    // A user with this email address already exists
                    $errmsg_arr[] = 'A user with this email address already exists.';
                    $errflag = true;
                }else{
                    
                }
                
                
                
                if (empty($errmsg_arr)) {
                    // Create a random salt
                    $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

                    // Create salted password 
                    $password = hash('sha512', $password . $random_salt);
        
                    // Insert the new user into the database 
                    $data = array();
                    $data['name'] = $fullname;
                    $data['email'] = $email;
                    $data['password'] = $password;
                    $data['salt'] = $random_salt;
                    $data['register_date'] = date("Y-m-d H:i:s");
                    
                    
                    $insert_user = $database->insert("users",$data);
                    
                    
                    if ($insert_user) {
                       $get_user = $database->get("users",array("user_id","name","email"),array("user_id"=>$insert_user));
                       //insert id of the user to the user info page
                       $insert_id = $database->insert("user_info",array("user_id"=>$get_user['user_id']));
                       
                       $send_veriication_code = md5($get_user['email']);
                       $data_verify = array();
                       $data_verify['user_id'] = $get_user['user_id'];
                       $data_verify['user_email'] = $get_user['email'];
                       $data_verify['verification_code'] = $send_veriication_code;
                       
                        $add_verification = $database->insert("verifications",$data_verify);
                       if($add_verification){
                           
                           $to = $get_user['email'];
                           $subj = "Codebasket Account Verification";
                           
                            $msg = "Hello ".$get_user['name'].",<br /><br /> "
                                   . "Welcome to CodeBasket.net the Largest One-Click Web Marketplace           "
                                   . "You have successfully Registered at Codebasket.net, We would like you to verify your account. Just click the link below to verify your Account. <br /><br /> <a href='".main_url.'/verification/email/'.$get_user['email']."/verify_code/".$send_veriication_code."' target='_blank'>Verify Account</a> <br /><br /> Thanks! <br/> Codebasket.net Team";
                           
                           $from = "admin@codebasket.net";
                           $mailsent = sendEmail($to, $subj, $msg, $shortcodes = null, $from = null);
                           
                           
                           if($mailsent){
                                //header('Location: '.main_url.'/verification');
                                $success_flag = 1;
                                $success_message[] = "Thank you for registering! A confirmation email has been sent to ".$get_user['email'].". Plase check on the Verfication Link to Activate your Account."; 
                            }
                           
                       }
                       
                       
                       
                      
                    }else{
                       
                    }
                    
                }
                
                
                
                
                
            }
            

            
            
            
            
            
                
            
        }
        
        
        
        
    }
    catch ( Exception $e )
    {
        // CSRF attack detected
        $errmsg_arr[] = $e->getMessage() . ' Form ignored.';
        $errflag = true; 
    }
    
   
    
}

$token = NoCSRF::generate( 'csrf_token' );
$tpl->formtoken = $token;

$tpl->errors = $errmsg_arr;
$tpl->result = $result;
$tpl->success = $success_message;


echo $tpl->render("themes/site/".theme_name."/html/signup.php");
