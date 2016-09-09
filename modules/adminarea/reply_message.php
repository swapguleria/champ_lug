<?php

$tpl = new bQuickTpl();
include(getcwd() . "/modules/adminarea/common.php");
$message_id = $vars[2];


//--for 404 page not found--//
if (!$database->has("contact_us", array("id" => $message_id)))
    {
    header("Location: " . main_url . "/404");
    exit;
    }

$message_info = $database->select("contact_us", "*", array("id" => $message_id));
$tpl->message = $message_info[0];


$errmsg_arr = array();
$errflag = false;
if (isset($_POST) & $_POST)
    {
    $receiver_email = clean($_POST['data']['receiver_email']);
    $message = clean($_POST['data']['message']);
    //pr($_POST['data']);die;
    // Send password to email

    if (!$receiver_email)
        {
        $errmsg_arr[] = 'Please Enter Receiver Email';
        $errflag = true;
        }
    if (!$message)
        {
        $errmsg_arr[] = 'Please Enter Your Message';
        $errflag = true;
        }
    if ($errflag)
        {
        $tpl->errors = $errmsg_arr;
        }
    else
        {
        // Send password to email
// ************** old code for email **************// 
//        $to = $receiver_email;
//        $subject = 'Reply Message From Universal Institute of Management and Technology Chandigarh';
//        $message = $message;
//        $sendmail = sendEmail($to, $subject, $message, $shortcodes = null, $from = null, $mail);
// ************************** Contact us reply from Admin ************************** //
        $to = $receiver_email;

        $subject = "Reply Message From " . site_name . " Team ";

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
                                                        border-radius: 4px 4px 4px 4px;">Hello ,&nbsp;<b>' . $message_info[0]['name'] . ' </b></td>
                                                </tr>
                                                <tr>
                                                <div class="mail-box" style="
                                                     width:350px;
                                                     margin:auto;">

                                                    <div class="mail-content" style="
                                                         font-size:14px;
                                                         padding:10px;">

                                                      
                                                    <p>    ' . $message . '</p>
                                                    
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

//            $retval = mail($to, $subject, $message_admin, $header);

        $sendmail = mail($to, $subject, $message_admin, $header);
        if ($sendmail == true)
            {
            $tpl->success = "Message sent successfully...";
            }
        else
            {
            $tpl->failer = "Message could not be sent...";
            }
        }
    }
echo $tpl->render("themes/adminarea/html/reply_message.php");
