<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");
$tpl->site_title = "Contact";

$errmsg_arr = array();
$errflag = false;
if (isset($_POST) && $_POST['contact_submit']) {
//    pr($_POST);
//    die();
    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $subject = clean($_POST['subject']);
    $message = clean($_POST['message']);

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $private_key = recaptcha_private_key;
//    '6Lc1lCQTAAAAAFYANpH4sdUaR3OcFeqQfZTu4tVp';
    $response = file_get_contents($url . "?secret=" . $private_key . "&response=" . @$_POST['g-recaptcha-response']);
    $data = json_decode($response);
    $recaptcha = "";
    if (isset($data->success) && $data->success == true){}else {
        $errmsg_arr[]= "Please Solve Recaptcha";
        $errflag = true;
    } 

    if (!$name) {
        $errmsg_arr[] = "please enter your name";
        $errflag = true;
    }
    if (!$email) {
        $errmsg_arr[] = "please enter your email";
        $errflag = true;
    } else {
        if (!valid_email($email)) {
            $errmsg_arr[] = "please enter Valid email";
            $errflag = true;
        }
    }
    if (!$phone) {


        $errmsg_arr[] = "please enter your phone";
        $errflag = true;
    } else {
        if (is_numeric($phone)) {
            if (strlen($phone) != 10) {
                $errmsg_arr[] = "phone number must be of 10 Digits ";
                $errflag = true;
            }
        } else {
            $errmsg_arr[] = "phone number must be numeric ";
            $errflag = true;
        }
    }
    if (!$subject) {
        $errmsg_arr[] = "please enter your subject";
        $errflag = true;
    }
    if ($errflag) {
        $tpl->errors = $errmsg_arr;
    } else {

        $data = array();
        $data['name'] = $name;
        $data['email'] = $email;
        $data['contact_no'] = $phone;
        $data['subject'] = $subject;
        $data['message'] = $message;

        $contact_submit = $database->insert("contact_us", $data);
        if ($contact_submit) {

//************************** Mail to user************************** // 
            $to = $email;

            $subject = subject_contact_us;

            $message_user = ' 
                        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

                            </head>
                            <body style="margin: 0;
                                  font-family: Tahoma, sans-serif;">
                                <table width="100%" id="html"  style="background-color: #eee;
                                       width: 100%;
                                       height: 100%;
                                       margin: 0 auto;" border="0" cellpadding="0"
                                       cellspacing="0">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table width="650px" id="body" style="width: 500px;
                                                   margin: 0 auto;
                                                   font-size: 12px;
                                                   color: #333333;
                                                   background-color: #fff;
                                                   border: 1px solid antiquewhite;
                                                   text-valign: center;" border="0" cellpadding="0"
                                                   cellspacing="20">
                                                <tr>
                                                    <td id="header" style="color: white;
                                                        font-size: 1.2em;
                                                        padding: 15px;
                                                        background: #108c74;
                                                        text-align: center;
                                                        text-valign: center;
                                                        font-weight: bold;
                                                        margin-bottom: 30px;
                                                        border-radius: 4px 4px 4px 4px;">Hello, &nbsp;<b>' . $name . ' </b></td>
                                                </tr>
                                                <tr>
                                                <div class="mail-box" style="
                                                     width:350px;
                                                     margin:auto;">

                                                    <div class="mail-content" style="
                                                         font-size:14px;
                                                         padding:10px;">
                                                        <p><b>' . contact_us_responce . '</br></p>
                                                    </div>
                                                </div><p>
                                                    Sincerely,<br> ' . site_name . ' Team.
                                                </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="footer" style="background: #108c74;
                                            color: #E2E2E2;
                                            border-radius: 4px 4px 4px 4px;
                                            margin-top: 30px;
                                            padding: 15px;
                                            text-weight: bold;
                                            text-align: center;
                                            text-valign: center;">
                                            <p>
                                                ' . copyright . ' <br />
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                        ';
            $header = "From:" . send_mail_from . " \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail($to, $subject, $message_user, $header);

            if ($retval == true) {
                echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Message sent successfully...</p>";
            } else {
                echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";
            }
// ************************** Mail to Admin ************************** //
            $to = admin_email;

            $subject = "Contact Us Querry ";

            $message_admin = ' 
                        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

                            </head>
                            <body style="margin: 0;
                                  font-family: Tahoma, sans-serif;">
                                <table width="100%" id="html"  style="background-color: #eee;
                                       width: 100%;
                                       height: 100%;
                                       margin: 0 auto;" border="0" cellpadding="0"
                                       cellspacing="0">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table width="650px" id="body" style="width: 500px;
                                                   margin: 0 auto;
                                                   font-size: 12px;
                                                   color: #333333;
                                                   background-color: #fff;
                                                   border: 1px solid antiquewhite;
                                                   text-valign: center;" border="0" cellpadding="0"
                                                   cellspacing="20">
                                                <tr>
                                                    <td id="header" style="color: white;
                                                        font-size: 1.2em;
                                                        padding: 15px;
                                                        background: #108c74;
                                                        text-align: center;
                                                        text-valign: center;
                                                        font-weight: bold;
                                                        margin-bottom: 30px;
                                                        border-radius: 4px 4px 4px 4px;">Hello, &nbsp;<b>' . site_name . ' </b></td>
                                                </tr>
                                                <tr>
                                                <div class="mail-box" style="
                                                     width:350px;
                                                     margin:auto;">

                                                    <div class="mail-content" style="
                                                         font-size:14px;
                                                         padding:10px;">

                                                        <p><b>Name</b> : ' . $name . ' </p>
                                                        <p><b>Email</b> : ' . $email . ' </p>
                                                        <p><b>Phone Number</b> :  ' . $phone . '  </p>
                                                        <p><b>Message</b> :' . $message . '</p>
                                                        <p><b>Subject</b> :' . $subject . '</p>
                                                            </br>



                                                    </div>
                                                </div><p>
                                                    Sincerely,<br> ' . site_name . ' Team.
                                                </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="footer" style="background: #108c74;
                                            color: #E2E2E2;
                                            border-radius: 4px 4px 4px 4px;
                                            margin-top: 30px;
                                            padding: 15px;
                                            text-weight: bold;
                                            text-align: center;
                                            text-valign: center;">
                                            <p>
                                                ' . copyright . ' <br />
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                        ';
            $header = "From:" . send_mail_from . " \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail($to, $subject, $message_admin, $header);

            if ($retval == true) {
                echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Message sent successfully...</p>";
            } else {
                echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";
            }

            header("location:" . main_url . "/contact_us/success/#message_alert");
        }
    }
}
echo $tpl->render("themes/site/" . theme_name . "/html/contact_us.php");
