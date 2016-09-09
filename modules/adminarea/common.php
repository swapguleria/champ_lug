<?php
$lang = "";
if ($_SESSION['SELECTEDLANG'] == "arabic")
    {
    $lang = "_ar";
    }
//if (isset($_SESSION['admin_user_id']))
//    {
//Skipped Tables
$skipped_tables = array("users", "ad_zones", "admin_user", "module_alias", "fields_admin", "table_icons", "category", "event_category_venue_category", "venue_details_venue_food_facility", "venue_details_venue_other_facility", "settings", "events_venue_category", "fields_mapping", "venue_details_venue_technical_facility");

//Fields Mappings 
$get_fields_mappings = $database->select("fields_mapping", "*");
$hidden_fields = db_mapping_fields($get_fields_mappings, "hidden_fields");
$required_fields = db_mapping_fields($get_fields_mappings, "required_fields");
$ckeditor_fields = db_mapping_fields($get_fields_mappings, "ckeditor_fields");
$date_fields = db_mapping_fields($get_fields_mappings, "date_fields");
$slug_fields = db_slug_fields($get_fields_mappings);
$get_another_data = db_get_another_data_fields($get_fields_mappings);
$file_fields = db_file_fields($get_fields_mappings);
//pr($get_another_data);

/* Get URL parameters */
$vars = explode("/", $_GET['action']);

/* Fetch Tables from Database */
$gettables = $database->query("SHOW TABLES FROM " . db_name)->fetchAll();
$tables = array();
foreach ($gettables as $tableslist)
    {
    $tables[] = $tableslist['0'];
    }

//SETTINGS
$get_settings = $database->select("settings", "*");
$new_array = array();
foreach ($get_settings as $key => $value)
    {
    $new_array[$value['type']][] = $value;
    }


//TABLE ICONS
//$tbl_icon['table_name']='icon_class';
$database->query("CREATE TABLE IF NOT EXISTS `table_icons`(`id` int(11) NOT NULL AUTO_INCREMENT,`table_name` varchar(100) NOT NULL,`icon_class` varchar(250) NOT NULL DEFAULT 'icon-table',`is_changable` enum('1','0') NOT NULL DEFAULT '1',PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");
$table_icons = $database->select('table_icons', '*');
foreach ($table_icons as $k => $v)
    {
    $icon_tables[] = $v['table_name'];
    }
if (is_array($table_icons) and ! empty($table_icons))
    {
    foreach ($tables as $k => $table_name)
        {
        if (!in_array($table_name, $skipped_tables))
            {
            if (!in_array($table_name, $icon_tables))
                {
                $last_id = $database->insert('table_icons', array('table_name' => $table_name));
                }
            }
        }
    $table_icons = $database->select('table_icons', '*');
    foreach ($table_icons as $k => $v)
        {
        $tbl_icon[$v['table_name']] = $v['icon_class'];
        }
    }
else
    {
    foreach ($tables as $k => $table_name)
        {
        if (!in_array($table_name, $skipped_tables))
            {
            $last_id = $database->insert('table_icons', array('table_name' => $table_name));
            $tbl_icon[$table_name] = 'icon-table';
            }
        }
    }
$icon_tables = array_keys($tbl_icon);
$chk = 0;
foreach ($icon_tables as $k => $table_name)
    {
    if (!in_array($table_name, $tables) or in_array($table_name, $skipped_tables))
        {
        $database->delete('table_icons', array('table_name' => $table_name));
        $chk = 1;
        }
    }
if ($chk == 1)
    {
    header("Location: " . _admin_url . "/index");
    exit();
    }
ksort($tbl_icon);

// Manage Fields Sections
if (isset($vars[2]) && $vars[2] == "manage_fields")
    {

    if (isset($_POST['table_name']) && $_POST['table_name'])
        {
        $table_name = $_POST['table_name'];
        }
    if (isset($_POST['fields']) && $_POST['fields'])
        {
        $fields = $_POST['fields'];
        }

    //fields_admin table
    if ($database->count("fields_admin", array("Table_name" => $table_name)) == 0)
        {

        $lastid = $database->insert("fields_admin", array(
            "Table_name" => $table_name,
            "Table_Fields" => array($fields),
        ));
        if ($lastid)
            {
            echo 1;
            }
        else
            {
            echo 0;
            }
        header("Location: " . _admin_url . "/index");
        }
    else
        {

        $lastid = $database->update("fields_admin", array(
            "Table_Fields" => array($fields),
                ), array(
            "Table_name" => $table_name,
        ));
        if ($lastid)
            {
            echo 1;
            }
        else
            {
            echo 0;
            }
        }
    }

//GET Table Columns
if (isset($vars[2]) && $vars[2] == "actions")
    {

    if (isset($_POST['method']) && ($_POST['method']))
        {
        $method = $_POST['method'];
        }
    if (isset($_POST['table']) && ($_POST['table']))
        {
        $table = $_POST['table'];
        }
    if (isset($_POST['records']) && ($_POST['records']))
        {
        $records = $_POST['records'];
        }


    if ($method == "deletearecord")
        {

        $records = explode(",", $records);
        $primaryid = $database->getPKID($table);

        foreach ($records as $record)
            {
            $deleterecord = $database->delete($table, array($primaryid => $record));
            }
        echo "1";
        }
    else if ($method == "event_selected")
        {
        echo"ASd";
        $get_record_detail = $database->select($table, "*", array('event' => $record));
        print_r($get_record_detail);
//            $deleteallrecords = $database->query($query);

        if ($get_record_detail)
            {
            echo 1;
            }
        else
            {
            echo 0;
            }
        }
    else if ($method == "deleteallrecords")
        {

        $query = "TRUNCATE TABLE " . $table;
        $deleteallrecords = $database->query($query);

        if ($deleteallrecords)
            {
            echo 1;
            }
        else
            {
            echo 0;
            }
        }
    else if ($method == "approve")
        {
        $records = explode(",", $records);
        //pr($records);
        $primaryid = $database->getPKID($table);

        foreach ($records as $record)
            {
            $get_record_detail = $database->get($table, "*", array($primaryid => $record));
            //pr($get_record_detail);
            $data_lyrics = array();
            $data_lyrics['song_title'] = $get_record_detail['song_title'];
            $data_lyrics['song_slug'] = create_slug($get_record_detail['song_title']);
            $data_lyrics['lyrics'] = $get_record_detail['lyrics'];
            $data_lyrics['artist_id'] = $get_record_detail['artist_id'];
            //$data_lyrics['album_id'] = $get_record_detail['album_id'];
            //$categories = array();
            //$categories[] = $get_record_detail['category_id'];
            //$data_lyrics['category_id'] = $categories;

            $data_lyrics['submitter_id'] = $get_record_detail['user_id'];

            $insert_lyrics = $database->insert("lyrics", $data_lyrics);
            if ($insert_lyrics)
                {
                $data = array();
                $data['lyrics_id'] = $insert_lyrics;
                $data['artist_id'] = $get_record_detail['artist_id'];
                $data['album_id'] = $get_record_detail['album_id'];
                $database->insert("lyric_artist_album", $data);

                $database->delete($table, array($primaryid => $record));
                echo 1;
                }
            }
        }
    else if ($method == "publish")
        {
        $records = explode(",", $records);
        $primaryid = $database->getPKID($table);
        foreach ($records as $record)
            {
            $publish = $database->update($table, array("status" => 1), array($primaryid => $record));
            }
        echo 1;
        }
    elseif ($method == "unpublish")
        {
        $records = explode(",", $records);
        $primaryid = $database->getPKID($table);
        foreach ($records as $record)
            {
            $unpublish = $database->update($table, array("status" => 0), array($primaryid => $record));
            }
        echo 1;
        }
    elseif ($method == 'event_change')
        {
        // -------------------------Code for getting event category from events-------------------------//
        if (@$_POST['event_id'])
            {
            if ($_POST['event_id'] == "all")
                {
                $all_venues = $database->select("events_venue_category", "*");
                }
            else
                {
                $all_venues = $database->select("events_venue_category", "*", array("events_id" => $_POST['event_id']));
                }
            $venues_ids = array();
            foreach ($all_venues as $key => $val)
                {
                $venues_ids[] = $val['venue_category_id'];
                }
            $event_categorys = $database->select("venue_category", "*", array("id" => $venues_ids));
            $a = "<option value='all'>" . Select_Venue . "</option>";
            foreach ($event_categorys as $key => $val)
                {
                $a.= "<option value = " . $val['id'] . ">" . ucwords($val["name" . $lang]) . "</option>";
                }

            echo $a;
            }
        }
    elseif ($method == 'venue_change')
        {
        // -------------------------Code for getting venues category from events-------------------------//
        if (@$_POST['venue_id'])
            {
            if ($_POST['venue_id'] == "all")
                {
                $all_locations = $database->select("venue", "*");
                }
            else
                {
                $all_locations = $database->select("venue", "*", array("category" => $_POST['venue_id']));
                }

            $locations_ids = array();

            foreach ($all_locations as $key => $val)
                {
                if (@$val["city"]) $locations_ids[$val["city"]] = $val["city_slug"];
                }
            $a = "<option value='all'>" . Location . "</option>";
            foreach (array_unique($locations_ids) as $key => $val)
                {
                if (@$val) $a.= "<option value = '" . $val . "'>" . ucwords($key) . "</option>";
                }
            echo $a;
            }
        } elseif ($method == 'location_change')
        {
        // -------------------------Code for getting location category from events-------------------------//
        if (@$_POST['location_id'])
            {

            if ($_POST['location_id'] != "all")
                {
                $all_stars = $database->select("venue", "*", array("city_slug" => $_POST['location_id']));
                }
            else
                {
                $all_stars = $database->select("venue", "stars");
                }
            $stars_all = array();
            foreach ($all_stars as $key => $val)
                {
                $stars_all[] = $val['stars'];
                }
            $stars = array_unique($stars_all);
            sort($stars);
            $a = "<option value='all'>" . Number_of_Stars . "</option>";
            foreach ($stars as $val)
                {
                if (@$val) $a.= "<option value = '" . $val . "'>" . $val . "</option>";
                }
            echo $a;
            }
        }elseif ($method == 'search_result')
        {
        // -------------------------Code for getting search category from events-------------------------//
        $id = $_POST['venue_id'];
        $stars = $_POST['stars_id'];
        $location = $_POST['location_id'];
        if (@$stars != "all") $star_key = 'stars';
        else $star_key = 'stars[!]';

        if (@$id != "all") $id_key = 'id';
        else $id_key = 'id[!]';

        if (@$location != "all") $location_key = 'city_slug';
        else $location_key = 'city_slug[!]';
        $event_categorys = $database->select("venue", "*", array("AND" => array(
                $star_key => $stars,
                $id_key => $id,
                $location_key => $location
        )));
//            pr($event_categorys);
        ?>

        <div class="featured">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1><?= Hotels ?></span></h1>
                    </div>
                    <!--12--> 
                </div>
                <!--row--> <div class="row">
                    <div class="col-sm-12">
                        <div id="demo">
                            <div class="span12">
                                <div id="owl-demo" class="owl-carousel">
                                    <?php
                                    $i = 0;
                                    foreach ($event_categorys as $key => $val)
                                        {

                                        if ($i % 3 == 0)
                                            {
                                            if (@$i)
                                                {
                                                ?></div>
                                            <div class="row">
                                                <?php
                                                }
                                            }
                                        ?>  <div class="item">
                                            <!--<div class="item">-->
                                            <div class="border-shadow">
                                                <div class="feature-item " style="max-width: 200px; max-height: 150px;"> <img src="<?php echo main_url; ?>/<?= $val['image'] ?>" alt="<?= $val['name'] ?>" />
                                                    <div class="image-hover">
                                                        <div class="add-to-list">
                                                            <ul>
                                                                <li><a href="#"><img src="<?php echo main_url; ?>/themes/site/default/images/review-icon.png" alt="" /></a></li>
                                                                <li><a href="#"><img src="<?php echo main_url; ?>/themes/site/default/images/wishlist-icon.png" alt="" /></a></li>
                                                            </ul>
                                                            <h3><?= $val['name'] ?></h3>
                                                            <img src="<?php echo main_url; ?>/themes/site/default/images/stars.png" alt="" /> </div>
                                                        <!--add-to-list-->
                                                        <div class="list">
                                                            <div class="inner-list">
                                                                <p><strong>Price</strong><span></span><b>50<strong>QR</strong> Per Person</b></p>
                                                                <p><strong>Capacity:</strong><span></span><b>300 Person</b></p>
                                                                <p><strong>Location</strong><span></span><b><?= $val['city'] ?></b></p>
                                                            </div>
                                                            <a href="#">+ Add To My list</a> </div>
                                                        <!--list--> 
                                                    </div>
                                                    <!--hover--> 
                                                </div><!--feature-item-->
                                            </div><!--border-->
                                        </div>

                                        <?php
                                        $i++;
                                        }
                                    ?>
                                </div>
                            </div></div>
                    </div></div>

                <!--row--> 
            </div>
            <!--cont--> 
        </div>

        <?php
//            echo $database->last_query();
        }
    elseif ($method == 'venu_detail_change')
        {
        // -------------------------Code for getting search category from events-------------------------//
        $id = $_POST['id'];
        $venue_detail = $database->get("venue_details", "*", array("id" => $id));
        $venue = $database->get("venue", "*", array("id" => $venue_detail['venue']));
//            pr($venue_detail);
        $venue_type = $database->get("venue_category", "*", array("id" => $venue['category']));
        $food_facility_ids = $database->select("venue_details_venue_food_facility", "venue_food_facility_id", array("venue_details_id" => $id));
        $technical_facility_ids = $database->select("venue_details_venue_technical_facility", "venue_technical_facility_id", array("venue_details_id" => $id));
        $other_facility_ids = $database->select("venue_details_venue_other_facility", "venue_other_facility_id", array("venue_details_id" => $id));
        ?>

        <h2><?= $venue_detail['name'] ?></h2>
        <div class="detail clearfix" >
            <div class="venue-dtl">
                <h3>Type of
                    venue</h3>
                <ul>
                    <li><?= ucwords($venue_type['name' . $lang]) ?> </li>
                </ul>

            </div>
            <div class="capacity">
                <h3>Capacity</h3>
                <ul>
                    <?php echo (@$venue_detail['banquet_capacity']) ? "<li>Banquet   : <span>" . $venue_detail['banquet_capacity'] . " Persons</span></li>" : " "; ?>
                    <?php echo (@$venue_detail['Theater_capacity']) ? "<li>Theatre   : <span>" . $venue_detail['Theater_capacity'] . " Persons</span></li>" : " "; ?>
                    <?php echo (@$venue_detail['Reception_capacity']) ? "<li>Reception : <span>" . $venue_detail['Reception_capacity'] . " Persons</span></li>" : " "; ?>
                    <?php echo (@$venue_detail['U-Shaped_capacity']) ? "<li>U Shape   : <span>" . $venue_detail['U-Shaped_capacity'] . " Persons</span></li>" : " "; ?><?php echo (@$venue_detail['Boardroom_capacity']) ? "<li>Boardroom   : <span>" . $venue_detail['Boardroom_capacity'] . " Persons</span></li>" : " "; ?>

                </ul>
            </div>

            <div class="space">
                <h3>Space &
                    Layout</h3>
                <ul>
                    <li><?php echo (@$venue_type['space']) ? $venue_type['space'] . " square foot" : " No Data Available " ?></li>
                </ul>
            </div>

            <div class="pricing">
                <h3>Pricing</h3>
                <ul>
                    <?php echo (@$venue_detail['wedding_display_content_for_price']) ? "<li>" . $venue_detail['wedding_display_content_for_price'] . "</li>" : "<li> No Data Available </li> "; ?>                     <?php echo (@$venue_detail['meeting_display_content_for_price']) ? "<li>" . $venue_detail['meeting_display_content_for_price'] . "</li>" : " "; ?>  

                </ul>
            </div>

            <div class="food">
                <h3>Food & 
                    Drinks</h3>
                <ul>
                    <?php
                    if (@$other_facility_ids)
                        {
                        foreach ($other_facility_ids as $key1)
                            {

                            $name = $database->get("venue_other_facility", "*", array("id" => $key1));
                            ?>
                            <li><?= $name['name' . $lang] ?></li>
                            <?php
                            }
                        }
                    else
                        {
                        echo "<li> No Data Available </li>";
                        }
                    ?>
                </ul>
            </div>


            <div class="venue-dtl tech">
                <h3>Technical</h3>
                <ul>
                    <?php
                    if (@$technical_facility_ids)
                        {
                        foreach ($technical_facility_ids as $key2)
                            {
                            $name = $database->get("venue_technical_facility", "*", array("id" => $key2));
                            ?>
                            <li><?= $name['name' . $lang] ?></li>
                            <?php
                            }
                        }
                    else
                        {
                        echo "<li> No Data Available </li>";
                        }
                    ?>
                </ul>

            </div>
            <div class="capacity location">
                <h3>Location</h3>
                <ul>
                    <li><?= $venue['city'] ?></li>
                </ul>
            </div>

            <div class="space download">
                <h3>Downloads</h3>
                <ul>
                    <?php echo (@$venue['pdf']) ? "<li><a href='" . main_url . "/" . $venue['pdf'] . "' target='_blank'>" . $venue['name'] . " </a></li>" : "<li>Pdf Not Available</li>"; ?>
                </ul>
            </div>

            <div class="pricing atr">
                <h3>Other</h3>
                <ul>
                    <?php
                    if (@$food_facility_ids)
                        {
                        foreach ($food_facility_ids as $key3)
                            {
                            $name = $database->get("venue_food_facility", "*", array("id" => $key3));
                            ?>
                            <li><?= $name['name' . $lang] ?></li>
                            <?php
                            }
                        }
                    else
                        {
                        echo "<li> No Data Available </li>";
                        }
                    ?>
                </ul>
            </div>

            <div class="food cntct">
                <h3>Contact</h3>
                <ul>
                    <?php echo (@$venue['website']) ? "<li><a href=http://" . $venue['website'] . " target='_blank'>" . $venue['website'] . " </a></li>" : ""; ?>
                    <?php echo (@$venue_detail['contact_person']) ? "<li>" . $venue_detail['contact_person'] . "</li>" : ""; ?>
                    <?php echo (@$venue_detail['phone']) ? "<li>" . $venue_detail['phone'] . "</li>" : ""; ?>
                    <?php echo (@$venue_detail['email']) ? "<li>" . $venue_detail['email'] . "</li>" : ""; ?>
                </ul><a target="">
            </div>	





        </div>

        <?php
//            echo $database->last_query();
        }
    }

//passing all variables to Template Class
$tpl->vars = $vars;
$tpl->skipped_tables = $skipped_tables;
$tpl->table_icons = $tbl_icon;
$tpl->setting_array = $new_array;
$tpl->hidden_fields = $hidden_fields;
$tpl->required_fields = $required_fields;
$tpl->ckeditor_fields = $ckeditor_fields;
$tpl->date_fields = $date_fields;
$tpl->slug_fields = $slug_fields;
$tpl->get_another_data = $get_another_data;
$tpl->tables = $tables;
$tpl->file_fields = $file_fields;

foreach ($tables as $k => $table_name)
    {
    $columns = $database->getColumns($table_name);
    //pr($columns);
    foreach ($columns as $k => $v)
        {
        $table_columns[$table_name][] = $v[0];
        }
    }
$tpl->table_columns = $table_columns;
//    }
//else
//    {
//    header("Location: " . _admin_url . "/login");
//    exit();
//    }
?>
