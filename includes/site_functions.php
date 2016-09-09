<?php

function birthday($birthday)
    {
    $age = date_create($birthday)->diff(date_create('today'))->y;

    return $age;
    }

//-- valid email --//
function valid_email($email)
    {
    return !!filter_var($email, FILTER_VALIDATE_EMAIL);
    }

//-- Create thumbnai --//
function scaleImageFile($src_file, $send = false)
    {
    $dst_file = dirname($src_file) . DIRECTORY_SEPARATOR . 'thumbnail_' . basename($src_file);

    if (!file_exists($dst_file))
        {
        echo '1';
        $max_width = 200;
        $max_height = 200;

        list ( $width, $height, $image_type ) = getimagesize($src_file);

        switch ($image_type)
            {
            case 1 :
                $src = imagecreatefromgif($src_file);
                break;
            case 2 :
                $src = imagecreatefromjpeg($src_file);
                break;
            case 3 :
                $src = imagecreatefrompng($src_file);
                break;
            default :
                return '';
                break;
            }

        $x_ratio = $max_width / $width;
        $y_ratio = $max_height / $height;

        if (($width <= $max_width) && ($height <= $max_height))
            {
            $tn_width = $width;
            $tn_height = $height;
            }
        elseif (($x_ratio * $height) < $max_height)
            {
            $tn_height = ceil($x_ratio * $height);
            $tn_width = $max_width;
            }
        else
            {
            $tn_width = ceil($y_ratio * $width);
            $tn_height = $max_height;
            }

        $tmp = imagecreatetruecolor($tn_width, $tn_height);

        /* Check if this image is PNG or GIF to preserve its transparency */
        if (($image_type == 1) or ( $image_type == 3))
            {
            imagealphablending($tmp, false);
            imagesavealpha($tmp, true);
            $transparent = imagecolorallocatealpha($tmp, 255, 255, 255, 127);
            imagefilledrectangle($tmp, 0, 0, $tn_width, $tn_height, $transparent);
            }
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);

        /*
         * imageXXX() has only two options, save as a file, or send to the browser.
         * It does not provide you the oppurtunity to manipulate the final GIF/JPG/PNG file stream
         * So I start the output buffering, use imageXXX() to output the data stream to the browser,
         * get the contents of the stream, and use clean to silently discard the buffered contents.
         */
        imagejpeg($tmp, $dst_file, 85);
        }
    if ($send && file_exists($dst_file))
        {
        echo '2';

        header('Content-type: image/jpeg');
        header("Content-Disposition: inline; filename=" . basename($dst_file));
        header("Content-Length: " . filesize($dst_file));
        readfile($dst_file);
        }
    return $dst_file;
    }

//--create random password--//
function randomPassword()
    {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++)
        {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
        }
    return implode($pass); //turn the array into a string
    }
            
// function to get likes, avg_ratings,review
function get_ratings_details($database, $module_type, $module_id)
    {
    $ratings = array();
    $ratings['avg_rating'] = avg_rating($module_type, $module_id, $database);

    return $ratings;
    }

//--update password--//
function update_user_info($database, $newpass, $name, $email, $user_email)
    {
    $updatepassword = $database->update("users", array("password" => $newpass, "nick_name" => $name, "email" => $email), array("AND" => array("email" => $user_email)));
    return $updatepassword;
    }

//--select password--//
function select_password($database, $user_email, $checkpassword)
    {
    $get_user = $database->select("users", "password", array("AND" => array("email" => $user_email, "password" => $checkpassword)));
    return $get_user;
    }

//--fetch all pages--//
function all_pages($database)
    {
    $all_pages = $database->select("pages", "*");
    return $all_pages;
    }

//--get page info--//
function page_info($database, $page_id)
    {
    $page_info = $database->get("pages", "*", array("id" => $page_id));
    return $page_info;
    }

//--contact us--//
function contact_insert($database, $data)
    {
    $contact_insert = $database->insert("contact_us", $data);
    return $contact_insert;
    }

//--resume insert--//
function resume_insert($database, $data)
    {
    $resume_insert = $database->insert("resume", $data);
    return $resume_insert;
    }

//--user insert--//
function user_insert($database, $data)
    {
    $user_insert = $database->insert("users", $data);
    return $user_insert;
    }

//--update user--//
function insert_user_profile($database, $data)
    {
    $insert_user_profile = $database->update("users", $data);
    return $insert_user_profile;
    }

//--insert message--//
function insert_message($database, $data)
    {
    $message_insert = $database->insert("contact_us", $data);
    return $message_insert;
    }

//--update user--//
function update_user($database, $data, $user_id)
    {
    $update_user = $database->update("users", $data, array("id" => $user_id));
    return $update_user;
    }

//--get session user information--//
function user_info($database, $user_id)
    {
    $user_info = $database->get("users", "*", array("id" => $_SESSION['user_id']));
    return $user_info;
    }

//--get user image--//
function user_image($database, $user_id)
    {
    $user_image = $database->get("user_photos", "*", array("user_id" => $user_id, "ORDER" => "photo_id DESC"));
    return $user_image;
    }

//--get user information for public--//
function user_data($database, $user_id)
    {
    $user_info = $database->get("users", "*", array("id" => $user_id));
    return $user_info;
    }

function blog_category($database, $cat_id)
    {
    $blog = $database->get("blog_categories", "*", array("blog_category_id" => $cat_id));
    return $blog;
    }

//--get information for All--//
function get_data($database, $method, $table, $data, $condition)
    {
    $all_info = $database->$method($table, $data, $condition);
    return $all_info;
    }

//--get information for All--//
function all_venues($database)
    {
    $all_pages = $database->select("venue_category", "*");
    return $all_pages;
    }

?>
