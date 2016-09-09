<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");

$tpl->site_title = "Add Venues";

if (isset($_POST['submit']))
    {


    $name = clean($_POST['name']);
    $email = clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $venue_name = clean($_POST['venue_name']);
    $message = clean($_POST['content']);

    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $private_key = recaptcha_private_key;
    $response = file_get_contents($url . "?secret=" . $private_key . "&response=" . @$_POST['g-recaptcha-response']);
    $data = json_decode($response);
    $recaptcha = "";
    if (isset($data->success) && $data->success == true)
        {
        
        }
    else
        {
        $errmsg_arr[] = "Please Solve Recaptcha";
        $errflag = true;
        }

    if (!$name)
        {
        $errmsg_arr[] = "please enter your name";
        $errflag = true;
        }
    if (!$email)
        {
        $errmsg_arr[] = "please enter your email";
        $errflag = true;
        }
    else
        {
        if (!valid_email($email))
            {
            $errmsg_arr[] = "please enter Valid email";
            $errflag = true;
            }
        }
    if (!$phone)
        {


        $errmsg_arr[] = "please enter your phone";
        $errflag = true;
        }
    else
        {
        if (is_numeric($phone))
            {
            if (strlen($phone) != 10)
                {
                $errmsg_arr[] = "phone number must be of 10 Digits ";
                $errflag = true;
                }
            }
        else
            {
            $errmsg_arr[] = "phone number must be numeric ";
            $errflag = true;
            }
        }
    if (!$venue_name)
        {
        $errmsg_arr[] = "please enter your venue name";
        $errflag = true;
        }
    if (!$message)
        {
        $errmsg_arr[] = "please enter your Message";
        $errflag = true;
        }
    if ($errflag)
        {
        $tpl->errors = $errmsg_arr;
        }
    else
        {

        $data = array();
        $data['name'] = $name;
        $data['email'] = $email;
        $data['contact_no'] = $phone;
        $data['venue_name'] = $venue_name;
        $data['message'] = $message;

        $contact_submit = $database->insert("add_venues", $data);

        if ($contact_submit)
            {
            $to = "swap.guleria@gmail.com";
            $subject = "Add Venue Request";

            $message = ' 
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
                                                        background: #8B3895;
                                                        text-align: center;
                                                        text-valign: center;
                                                        font-weight: bold;
                                                        margin-bottom: 30px;
                                                        border-radius: 4px 4px 4px 4px;">Hello, &nbsp;<b> Lugares </b></td>
                                                </tr>
                                                <tr>
                                                <div class="mail-box" style="
                                                     width:350px;
                                                     margin:auto;">

                                                    <div class="mail-content" style="
                                                         font-size:14px;
                                                         padding:10px;">

                                                <p><b>Name</b>: ' . $_POST["name"] . ' </p>
                                                <p><b>Email</b>: ' . $_POST["email"] . ' </p>
                                                <p><b>Phone Number</b>:  ' . $_POST["phone"] . '  </p>
                                                <p><b>Venue Name</b>: ' . $_POST["venue_name"] . '</p>
                                                <p><b>Message</b>:' . $_POST["content"] . '
                                                            Please.</br>

                                                        </p>


                                                    </div>
                                                </div><p>
                                                    Sincerely,<br> Lugares Team.
                                                </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="footer" style="background: #8B3895;
                                            color: #E2E2E2;
                                            border-radius: 4px 4px 4px 4px;
                                            margin-top: 30px;
                                            padding: 15px;
                                            text-weight: bold;
                                            text-align: center;
                                            text-valign: center;">
                                            <p>
                                                Copyright &copy;
                                                ' . date("Y") . ' 
                                                by
                                                Swap Developers
                                                . All Rights Reserved.<br />
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                        ';
            $header = "From:" . $_POST['email'] . " \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail($to, $subject, $message, $header);

            if ($retval == true)
                {
                echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Message sent successfully...</p>";
                }
            else
                {
                echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";
                }
            header("location:" . main_url . "/add_venues/success/#message_alert");
            }
        }
    }
echo $tpl->render("themes/site/" . theme_name . "/html/add_venues.php");
