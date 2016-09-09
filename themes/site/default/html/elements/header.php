<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="key, words" />
        <meta name="description" content="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <title><?php echo $this->site_title; ?> | <?php echo site_name; ?></title>  
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

                <link rel="stylesheet" type="text/css" href="<?php echo main_url; ?>/themes/site/default/css/style.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo main_url; ?>/themes/site/default/css/bootstrap.min.css" />
                <link href="<?php echo main_url ?>/themes/site/<?php echo theme_name; ?>/css/media.css" rel="stylesheet" type="text/css"/>
                <!--<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">-->
                <link type="text/css" rel="stylesheet" href="<?php echo main_url ?>/themes/adminarea/css/font-awesome.css">  
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css" rel="stylesheet" type="text/css"/>
                    <link rel="stylesheet" type="text/css" href="<?php echo main_url; ?>/themes/site/default/css/owl.carousel.css" />
                    <!--<link rel="stylesheet" href="<?php echo main_url ?>/themes/site/<?php echo theme_name; ?>/css/awesome-bootstrap-checkbox.css"/>-->
                    <!--<link rel="stylesheet" href="<?php echo main_url ?>/themes/site/<?php echo theme_name; ?>/css/fullcalendar.css"/>--> 
                    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" type="text/css" rel="stylesheet"/>-->

                    <!--			<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">-->
                    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        </head>

                        <!-- check Language -->
                        <?php
                        $lang = "";
                        if ($_SESSION['SELECTEDLANG'] == "arabic")
                            {
                            $lang = "_ar";
                            ?>   <body dir="rtl" id="arabic">
                                <?php
                                }
                            else
                                {
                                ?>
                                <body>
                                <?php }
                                ?>
                                <div class="header-list">
                                    <div class="header-container">
                                        <div class="row">
                                            <div class="col-sm-12 right-list">
                                                <form method="get" action="">

                                                    <?php
                                                    if (@$this->params[3])
                                                        {
                                                        $url = main_url . "/" . $this->params[0] . "/" . $this->params[1] . "/" . $this->params[2] . "/" . $this->params[3];
                                                        }
                                                    else if (@$this->params[2])
                                                        {
                                                        $url = main_url . "/" . $this->params[0] . "/" . $this->params[1] . "/" . $this->params[2];
                                                        }
                                                    else if (@$this->params[1])
                                                        {
                                                        $url = main_url . "/" . $this->params[0] . "/" . $this->params[1];
                                                        }
                                                    else if (@$this->params[0])
                                                        {
                                                        $url = main_url . "/" . $this->params[0];
                                                        }
                                                    else
                                                        {
                                                        $url = main_url;
                                                        }
                                                    if ($_SESSION['SELECTEDLANG'] == "english")
                                                        {
//                                pr($url);
                                                        ?> 
                                                        <a href="<?php echo $url; ?>/?lang=arabic"><img style="height:auto ; padding: 10px; width: 3%"  src="<?php echo main_url; ?>/themes/site/default/images/ar.png"/></a>

                                                        <?php
                                                        }
                                                    else
                                                        {
                                                        ?>
                                                        <a href="<?php echo $url; ?>/?lang=english"><img style="height:auto ; padding: 10px" src="<?php echo main_url; ?>/themes/site/default/images/en.png"/></a>

                                                    <?php } ?>

                                                </form>
                                            </div>
                                            <!--right-list--> 
                                        </div>
                                        <!--row--> 
                                    </div>
                                    <!--header-container--> 
                                </div>
                                <!--header-list-->
                                <div class="header-container">
                                    <div class="row">
                                        <div class="logo col-sm-3"> <a href="<?php echo main_url; ?>/index"><img src="<?php echo main_url; ?>/themes/site/default/images/logo.png" alt="" /></a> </div>
                                        <!--logo-->
                                        <div class="logo1 col-sm-3"> <a href="<?php echo main_url; ?>/index"><img src="<?php echo main_url; ?>/themes/site/default/images/logo1.png" alt="" /></a> </div>
                                        <div class="col-sm-9 resp-menu">
                                            <div class="search">
                                                <div class="search-input">
                                                    <form action="<?= main_url ?>/search" method="GET">
                                                        <input class="form-control" name="keyword" type="text" placeholder="<?= " " . Search_for_Venues ?>" />
                                                        <input type="submit" value="" />
                                                    </form> </div>
                                                <div class="social-icon">
                                                    <ul>
                                                        <li><a href="<?php echo instagram_page_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/insta.png" alt="" /></a></li>
                                                        <li><a href="<?php echo fb_page_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/facebook.png" alt="" /></a></li>
                                                        <li><a href="<?php echo googleplus_url; ?>" target="_blank" ><img src="<?php echo main_url; ?>/themes/site/default/images/email.png" alt="" /></a></li>
                                                    </ul>
                                                </div>
                                                <!--search-input--> 
                                            </div>
                                            <!--search-->
                                            <div class="menu">
                                                <nav class="navbar"> 

                                                    <!-- Brand and toggle get grouped for better mobile display -->
                                                    <div class="navbar-header">
                                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                                    </div>

                                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                        <ul class="nav navbar-nav">
                                                            <li <?php if ($this->params[0] == "index" || $this->params[0] == "") echo 'class="active"' ?> ><a href="<?php echo main_url; ?>/index"><?= " " . HOME ?> <span class="sr-only">(current)</span></a></li>
                                                            <li <?php if ($this->params[0] == "about_us") echo 'class="active"' ?> ><a href="<?php echo main_url; ?>/about_us"><?= " " . About_us ?></a></li>
                                                            <li class=" <?php if ($this->params[0] == "venue_detail") echo 'active' ?> dropdown"> <a href="javascript:void(0);"><?= " " . Venues ?> </a>
                                                                <ul class="dropdown-content">
                                                                    <?php
                                                                    foreach ($this->venue_categorys as $key => $val)
                                                                        {
                                                                        ?>
                                                                        <a href="<?php echo main_url; ?>/event/<?= $val['id'] ?>">                      <?= $val['name' . $lang] ?></a>

                                                        <!--                                                                   <li><a href="<?php echo main_url; ?>/event/<?= $val['id'] ?>"><?= $val['name' . $lang] ?></a></li>-->
                                                                    <?php } ?>

                                                                </ul>
                                                            </li> 

                                                            <li class="dropdown <?php if ($this->params[0] == "service_provider") echo 'active' ?>"> <a href="javascript:void(0);"><?= service_provider ?></a>
                                                                <ul class="dropdown-content">
                                                                    <?php
//                                            pr($this->service_categorys);
                                                                    foreach ($this->service_categorys as $key => $val)
                                                                        {
//                                                pr($val);
                                                                        ?>
                                                                        <a href="<?php echo main_url; ?>/service_provider/<?= $val['id'] ?>"> 
                                                                            <?= $val['name' . $lang] ?>
                                                                        </a> 
                                                                        <!--                                                                <li>
                                                                                                                                                    <a href="<?php echo main_url; ?>/service_provider/<?= $val['id'] ?>"><?= $val['name' . $lang] ?>
                                                                                                                                                    </a></li>-->
                                                                    <?php } ?>
                                                                </ul>
                                                            </li>
                                                            <li class=" <?php if ($this->params[0] == "contact_us") echo 'active' ?> last"><a href="<?php echo main_url; ?>/contact_us"><?= Contact_Us ?></a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.navbar-collapse --> 

                                                </nav>
                                            </div>
                                            <!--menu--> 
                                        </div>
                                        <!--9--> 
                                    </div>
                                    <!--row--> 
                                </div>
                                <!--header-container-->

