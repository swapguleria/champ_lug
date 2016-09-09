<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Institute Of Management Technology And Engineering Study</title>
<link href="<?php echo main_url;?>/themes/site/default/css/bootstrap.css" type="text/css" rel="stylesheet"  />
<link href="<?php echo main_url;?>/themes/site/default/css/style.css" type="text/css" rel="stylesheet"  />

<!--script executions -->

</head>
<body class="html front not-logged-in no-sidebars page-node icompany"  >

<!--Main menu-->

<div class="container-fluid top_menu">
  <div class="container">
    <div class="row-fluid">
      <div class="span9">
        <div class="region region-top-right-quick-menu">
          <div id="block-menu-menu-top-right-quick-menu" class="clearfix block block-menu">
            <div class="content">
<!--              <ul class="menu">
                <li class="first leaf"><a href="javascript:void(0);">History</a></li>
                <li class="leaf"><a href="javascript:void(0);">Governance</a></li>
                <li class="leaf"><a href="javascript:void(0);">Directions</a></li>
                <li class="leaf"><a href="javascript:void(0);" title="">Alumni</a></li>
                <li class="leaf"><a href="javascript:void(0);" title="">Verifications etc</a></li>
                <li class="leaf"><a href="javascript:void(0);" title="A.Kumar">Anti Ragging</a></li>
                <li class="leaf"><a href="javascript:void(0);">Email</a></li>
                <li class="last leaf"><a href="javascript:void(0);" title="">Login</a></li>
              </ul>-->
            </div>
          </div>
        </div>
      </div>
      <div class="span3"> 
        <!--<div class="span7 old_site">
<a href="http://207.45.186.122/~NIMESimisc">Old Portal</a>
</div>-->
        <div class="span12">
<!--          <ul class="social-links">
            <li><a href="javascript:void(0);" title="Facebook" class="fb" target="_blank">Facebook</a></li>
            <li><a href="javascript:void(0);" title="Twitter" class="tw" target="_blank">Twitter</a></li>
            <li><a href="javascript:void(0);" title="Linked In" class="li" target="_blank">Linked In</a></li>
          </ul>-->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid head_bg">
  <div class="container">
    <header class="row-fluid" id="header">
      <div id="header_left" class="span6 clearfix">
        <div class="inner">
          <div id="logocontainer"><a href="<?php echo main_url; ?>" title="Home"><img width="200" src="<?php echo main_url;?>/themes/site/default/images/NIMES.png" alt="Home" /> <h1>National Institute of Management & Engineering Studies</h1></a>
         
          
          
          </div>
          <div id="texttitles"> </div>
        </div>
      </div>
      <div class="span6 pull-right">
        <div class="row-fluid">
        
        
          <div class="span12 pull-right coun_code">NIMES is now accredited by COUNCIL<br />
            FOR WORLD<br />
            <strong>DISTANCE EDUCATION.</strong><br />
            <b class="blink">Admission Open...</b>
          </div>
        </div>
      </div>
    </header>
  </div>
</div>
<div class="container-fluid main_menu">
  <div class="container">
              <div class="nav-collapse collapse ">                
            <ul class="nav">
              <li class="active"><a href="<?php echo main_url;?>">Home</a></li>
              <li><a href="<?php echo main_url; ?>/page/1/<?php echo $this->slug_id1; ?>">Admission</a></li>
              <li><a href="<?php echo main_url; ?>/programs">Programs</a></li>
               <li><a href="<?php echo main_url;?>/online_result">Online Result</a></li>
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="">Affliation<b class="caret"></b></a>
                <ul class="dropdown-menu listed">
                    
                    <?php  foreach($this->affilation_nw as $affilation_n){?>
                    
                    <li class="active"><a href="<?php echo main_url;?>/affliation/<?php echo $affilation_n['id'];?>/<?php echo $affilation_n['affilation_slug'];?>"> <?php echo $affilation_n['affilation_title'];?> </a></li>
                 
                    <?php } ?>
                </ul>
              </li>
               <li><a href="<?php echo main_url; ?>/page/3/<?php echo $this->slug_id3; ?>">Director Message</a></li>
               <li>
                <a href="<?php echo main_url;?>/courses">Courses<b class="caret"></b></a> 
<!--                <ul class="dropdown-menu">
                  <li><a href="<?php //echo main_url;?>/courses">BCA</a></li>
                  <li><a href="javascript:void(0);">B.Tech</a></li>
                  <li><a href="javascript:void(0);">MCA</a></li>
                 
                </ul>-->
              </li>
                <li><a href="<?php echo main_url;?>/contact_us">Contact Us</a></li>
            </ul>
            
          </div>
            </div>
</div>