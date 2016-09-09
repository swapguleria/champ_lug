<?php echo $this->render("themes/adminarea/html/elements/header.php")?>

<h1><em>Website Settings</em></h1>
<hr />
<?php 
if($this->update == 1){
?>
<div class="alert alert-success">
	<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
	<strong>Well done!</strong> Successfully updated all settings!
</div>
<?php }?> 


<script type="text/javascript" src="<?php echo main_url ?>/libs/chosen-jquery/chosen.jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo main_url ?>/libs/chosen-jquery/chosen.css">

 <link href="<?php echo main_url ?>/libs/bootstrap-fileupload/bootstrap-fileupload.min.css" rel="stylesheet" />
	<script type="text/javascript" src="<?php echo main_url ?>/libs//bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

   
    
<script type="text/javascript">
  $(document).ready(function() {
	
	setTimeout(function() {
		$(".alert").alert('close');
	}, 3000);
	
	
	$(".chosen-select").each(function() {
		$(this).chosen();
        var id = $(this).attr("id");
		$("#"+id+"_chzn").css("width","100%");
    });
	
	
	

  });
</script>
<div class="row">
  <div class="col-md-12">
    <form class="bs-example form-horizontal" name="csrf_form" data-validate="parsley" action="" method="post" enctype="multipart/form-data">
      <div class="bs-example bs-example-tabs">
        <ul id="myTab" class="nav nav-tabs">
          <li class="active"><a href="#sitesettings" data-toggle="tab">Site Settings</a></li>
          <li class=""><a href="#seosettings" data-toggle="tab">SEO Settings</a></li>
          <li class=""><a href="#contentsettings" data-toggle="tab">Content Settings</a></li>
          <li class=""><a href="#facebooksettings" data-toggle="tab">Facebook Settings</a></li>
          <li class=""><a href="#socialsettings" data-toggle="tab">Social Settings</a></li>
          <li class=""><a href="#mailsettings" data-toggle="tab">Mail Settings</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="sitesettings">
            <p></p>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Site Settings</h3>
              </div>
              <div class="panel-body">
                <div class="col-lg-7">
                  <?php
			  foreach($this->setting_array['site'] as $key=>$value){ 		
			  
			  
			  
			  
			  
			  	if($value['setting_name'] == "comment_system") {	
			  ?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <select data-placeholder="Choose a country..." class="form-control chosen-select"  name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        <option <?php if($value['setting_value'] == "facebook") echo "selected='selected'"?> value='facebook'>Facebook</option>
                        <option <?php if($value['setting_value'] == "disqus") echo "selected='selected'"?> value='disqus'>Disqus</option>
                        <option <?php if($value['setting_value'] == "none") echo "selected='selected'"?> value='none'>None</option>
                      </select>
                    </div>
                  </div>
                  <?php }else if($value['setting_name'] == "usermanagement") {?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <select data-placeholder="Choose a country..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        <option <?php if($value['setting_value'] == "1") echo "selected='selected'"?> value='1'>On</option>
                        <option <?php if($value['setting_value'] == "0") echo "selected='selected'"?> value='0'>Off</option>
                      </select>
                    </div>
                  </div>
                  
                  <?php }else if($value['setting_name'] == "public_can_like_dislike") {?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label">Public can Vote?</label>
                    <div class="col-lg-9">
                      <select data-placeholder="Choose a value..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        <option <?php if($value['setting_value'] == "1") echo "selected='selected'"?> value='1'>Yes</option>
                        <option <?php if($value['setting_value'] == "0") echo "selected='selected'"?> value='0'>No</option>
                      </select>
                    </div>
                  </div>
                  
                   <?php }else if($value['setting_name'] == "public_can_rate") {?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label">Public can Rate?</label>
                    <div class="col-lg-9">
                      <select data-placeholder="Choose a value..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        <option <?php if($value['setting_value'] == "1") echo "selected='selected'"?> value='1'>Yes</option>
                        <option <?php if($value['setting_value'] == "0") echo "selected='selected'"?> value='0'>No</option>
                      </select>
                    </div>
                  </div>
                  
                  
                   <?php }else if($value['setting_name'] == "website_logo") {?>
                  
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                  
                  <div class="fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new thumbnail" style="width: auto; height: auto;"><img  style="width: auto; height: auto;" id="<?php echo $value['Field'];?>" src="<?php echo main_url.$value['setting_value'];?>" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: auto; max-height: auto; line-height: 20px;"></div>
  <div>
    <span class="btn btn-file btn btn-primary"><span class="fileupload-new ">Select image</span><span class="fileupload-exists">Change</span><input name="data[<?php echo $value['setting_name'];?>]" type="file" /></span>
    <a href="#" class="btn fileupload-exists btn btn-danger" data-dismiss="fileupload">Remove</a>
  </div>
                  </div>
                  </div> 
                  
                  </div>
                  <?php }else if($value['setting_name'] == "theme_name") {?>
                 
                    <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <select data-placeholder="Choose a country..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        <?php
							if ($handle = opendir(getcwd().'/themes/site')) {
								while (false !== ($entry = readdir($handle))) {
									if ($entry != "." && $entry != ".DS_Store" && $entry != "..") {
										$entry_val = $entry;
										$entry_Text = ucfirst(str_replace(".css","",$entry));
									
							?>
                        <option <?php if($value['setting_value'] == $entry_val) echo "selected='selected'"?> value="<?php echo $entry_val;?>"><?php echo $entry_Text;?></option>
                        <?php 
                            		}
								}
								closedir($handle);
							}
							?>
                      </select>
                    </div>
                  </div>
                  <?php }else if($value['setting_name'] == "language") {?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <select data-placeholder="Choose a country..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        <?php
								if ($handle = opendir(getcwd().'/languages')) {
									while (false !== ($entry = readdir($handle))) {
										if ($entry != "." && $entry != ".DS_Store" && $entry != "..") {
											$entry_val = str_replace(".php","",$entry);
										$entry_Text = ucfirst(str_replace(".php","",$entry));
										
								?>
                        <option <?php if($value['setting_value'] == $entry_val) echo "selected='selected'"?> value="<?php echo $entry_val;?>"><?php echo $entry_Text;?></option>
                        <?php 
										}
									}
									closedir($handle);
								}
								?>
                      </select>
                    </div>
                  </div>
                  <?php }elseif($value['setting_name'] == 'timezone'){?>

					<div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <select data-placeholder="Choose a country..." class="form-control chosen-select"  name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
					  <?php 
					  $timezones = array(
						'Pacific/Midway'       => "(GMT-11:00) Midway Island",
						'US/Samoa'             => "(GMT-11:00) Samoa",
						'US/Hawaii'            => "(GMT-10:00) Hawaii",
						'US/Alaska'            => "(GMT-09:00) Alaska",
						'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
						'America/Tijuana'      => "(GMT-08:00) Tijuana",
						'US/Arizona'           => "(GMT-07:00) Arizona",
						'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
						'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
						'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
						'America/Mexico_City'  => "(GMT-06:00) Mexico City",
						'America/Monterrey'    => "(GMT-06:00) Monterrey",
						'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
						'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
						'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
						'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
						'America/Bogota'       => "(GMT-05:00) Bogota",
						'America/Lima'         => "(GMT-05:00) Lima",
						'America/Caracas'      => "(GMT-04:30) Caracas",
						'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
						'America/La_Paz'       => "(GMT-04:00) La Paz",
						'America/Santiago'     => "(GMT-04:00) Santiago",
						'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
						'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
						'Greenland'            => "(GMT-03:00) Greenland",
						'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
						'Atlantic/Azores'      => "(GMT-01:00) Azores",
						'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
						'Africa/Casablanca'    => "(GMT) Casablanca",
						'Europe/Dublin'        => "(GMT) Dublin",
						'Europe/Lisbon'        => "(GMT) Lisbon",
						'Europe/London'        => "(GMT) London",
						'Africa/Monrovia'      => "(GMT) Monrovia",
						'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
						'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
						'Europe/Berlin'        => "(GMT+01:00) Berlin",
						'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
						'Europe/Brussels'      => "(GMT+01:00) Brussels",
						'Europe/Budapest'      => "(GMT+01:00) Budapest",
						'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
						'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
						'Europe/Madrid'        => "(GMT+01:00) Madrid",
						'Europe/Paris'         => "(GMT+01:00) Paris",
						'Europe/Prague'        => "(GMT+01:00) Prague",
						'Europe/Rome'          => "(GMT+01:00) Rome",
						'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
						'Europe/Skopje'        => "(GMT+01:00) Skopje",
						'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
						'Europe/Vienna'        => "(GMT+01:00) Vienna",
						'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
						'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
						'Europe/Athens'        => "(GMT+02:00) Athens",
						'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
						'Africa/Cairo'         => "(GMT+02:00) Cairo",
						'Africa/Harare'        => "(GMT+02:00) Harare",
						'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
						'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
						'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
						'Europe/Kiev'          => "(GMT+02:00) Kyiv",
						'Europe/Minsk'         => "(GMT+02:00) Minsk",
						'Europe/Riga'          => "(GMT+02:00) Riga",
						'Europe/Sofia'         => "(GMT+02:00) Sofia",
						'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
						'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
						'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
						'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
						'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
						'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
						'Asia/Tehran'          => "(GMT+03:30) Tehran",
						'Europe/Moscow'        => "(GMT+04:00) Moscow",
						'Asia/Baku'            => "(GMT+04:00) Baku",
						'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
						'Asia/Muscat'          => "(GMT+04:00) Muscat",
						'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
						'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
						'Asia/Kabul'           => "(GMT+04:30) Kabul",
						'Asia/Karachi'         => "(GMT+05:00) Karachi",
						'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
						'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
						'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
						'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
						'Asia/Almaty'          => "(GMT+06:00) Almaty",
						'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
						'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
						'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
						'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
						'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
						'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
						'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
						'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
						'Australia/Perth'      => "(GMT+08:00) Perth",
						'Asia/Singapore'       => "(GMT+08:00) Singapore",
						'Asia/Taipei'          => "(GMT+08:00) Taipei",
						'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
						'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
						'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
						'Asia/Seoul'           => "(GMT+09:00) Seoul",
						'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
						'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
						'Australia/Darwin'     => "(GMT+09:30) Darwin",
						'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
						'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
						'Australia/Canberra'   => "(GMT+10:00) Canberra",
						'Pacific/Guam'         => "(GMT+10:00) Guam",
						'Australia/Hobart'     => "(GMT+10:00) Hobart",
						'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
						'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
						'Australia/Sydney'     => "(GMT+10:00) Sydney",
						'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
						'Asia/Magadan'         => "(GMT+12:00) Magadan",
						'Pacific/Auckland'     => "(GMT+12:00) Auckland",
						'Pacific/Fiji'         => "(GMT+12:00) Fiji",
					);
						foreach ($timezones as $identifier => $name) {
							if($identifier == $value['setting_value'])
							echo '<option style="background-color:#CCCCCC" selected value="'.$identifier.'">'.$name.'</option>';
							else
							echo '<option value="'.$identifier.'">'.$name.'</option>';
						}

					  ?>
					  <option value=""></option>
                      </select>
                    </div>
                  </div>

				  <?php }else {?>
 <?php if (format_names($value['setting_name']) == "Rss Items"){?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                   
                    <div class="col-lg-9">
                        
                        <select data-placeholder="Choose a value..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                            
                        <option <?php if($value['setting_value'] == 10) echo "selected='selected'"?> value='10'>10</option>
                           <option <?php if($value['setting_value'] == 20) echo "selected='selected'"?> value='20'>20</option>
                           <option <?php if($value['setting_value'] == 30) echo "selected='selected'"?> value='30'>30</option>
                           <option <?php if($value['setting_value'] == 50) echo "selected='selected'"?> value='50'>50</option>
                        
                      </select>
                        
                        
                      
                    </div>
                  </div>
 <?php }elseif(format_names($value['setting_name']) == "Like Dislike Style"){?>
<div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                   
                    <div class="col-lg-9">
                        
                        <select data-placeholder="Choose a value..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                            <?php for($i=1;$i<10;$i++){?>
                        <option <?php if($value['setting_value'] == $i) echo "selected='selected'"?> value='<?php echo $i;?>'><?php echo "Style ".$i;?></option>
                            <?php }?>
                        
                      </select>
                        
                        
                      
                    </div>
                  </div>
 <?php }else{?>
     <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                   
                    <div class="col-lg-9">
                        
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder=""  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
<?php  }
?>
                  <?php } } ?>
                </div>
              </div>
            </div>
            </p>
          </div>
          <div class="tab-pane fade" id="seosettings">
            <p></p>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">SEO Settings</h3>
              </div>
              <div class="panel-body">
                <div class="col-lg-7">
                  <?php
			  foreach($this->setting_array['seo'] as $key=>$value){ 
			  
			  	if($value['setting_name'] == "site_seo_description" || $value['setting_name'] == "site_seo_keywords") {				
			  ?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <textarea rows="4" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>"><?php echo $value['setting_value'];?></textarea>
                    </div>
                  </div>
                    
                    
                    <?php }else if($value['setting_name'] == "google_analytics_code") {?>
                    
                    <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder="UA-XXXXXXXX-1"  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                        
                     <?php }else if($value['setting_name'] == "google_webmasters_verification_code") {?>
                    
                    <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder=" 4BXHdI68A1W0yRveJYzROHoFBLiXR84Sp1kPiaNb5TE"  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                    
                     <?php }else if($value['setting_name'] == "bing_webmasters_verification_code") {?>
                    
                    <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder="F8094497C8E66C04B086EE3AD4B47C69"  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                    
                    
                    
                  <?php }else {?>
                
                
                		 <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder=""  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                        
                        
                        
                        
                        
			<?php }} ?>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="contentsettings">
            <p></p>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Content Settings</h3>
              </div>
              <div class="panel-body">
                <div class="col-lg-7">
                  <?php
			  foreach($this->setting_array['content'] as $key=>$value){ 					
              
			  
			  
			  if($value['setting_name'] == "video_blocker") {
				?>	  
				  
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <select style="width:100%" data-placeholder="Choose a country..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        <option <?php if($value['setting_value'] == "1") echo "selected='selected'"?> value='1'>On</option>
                        <option <?php if($value['setting_value'] == "0") echo "selected='selected'"?> value='0'>Off</option>
                      </select>
                    </div>
                  </div>
                  
                  <?php }else if($value['setting_name'] == "no_of_columns"){?>
                  
            <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                        
                     <select style="width:100%" data-placeholder="Choose a country..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        
          <option <?php if($value['setting_value'] == 1) echo "selected='selected'"?> value='1'>1</option>
          <option <?php if($value['setting_value'] == 2) echo "selected='selected'"?> value='2'>2</option>
          <option <?php if($value['setting_value'] == 3) echo "selected='selected'"?> value='3'>3</option>
                       
                      </select>
                 
                  </div> 
                  
                  </div>                  
                  
                          <?php }else if($value['setting_name'] == "recipes_per_page" || $value['setting_name'] == "index_newest_recipes" || $value['setting_name'] == "recipes_of_category_per_page" || $value['setting_name'] == "recipes_of_course_per_page" || $value['setting_name'] == "recipes_of_cuisines_per_page" || $value['setting_name'] == "search_recipes_per_page" || $value['setting_name'] == "latest_recipes_per_page" || $value['setting_name'] == "top_rated_per_page" || $value['setting_name'] == "number_of_latest_covers" || $value['setting_name'] == "category_covers_per_page" || $value['setting_name'] == "search_covers_per_page" || $value['setting_name'] == "most_popular_galleries" || $value['setting_name'] == "featured_galleries" || $value['setting_name'] == "newest_galleries" || $value['setting_name'] == "categories_per_page" || $value['setting_name'] == "category_picture_per_page" || $value['setting_name'] == "category_text_perpage" || $value['setting_name'] == "text_jokes_per_page"  || $value['setting_name'] == "picture_jokes_per_page" || $value['setting_name'] == "artist_albums_per_page" || $value['setting_name'] == "genre_lyrics_per_page" || $value['setting_name'] == "search_lyrics_per_page" || $value['setting_name'] == "poets_per_page" || $value['setting_name'] == "cols_per_page" || $value['setting_name'] == "topics_per_page" || $value['setting_name'] == "poems_by_author_per_page" || $value['setting_name'] == "search_poems_per_page" || $value['setting_name'] == "poems_by_topic_per_page" || $value['setting_name'] == "items_per_page" || $value['setting_name'] == "columns_per_page" || $value['setting_name'] == "picture_quotes_per_page" || $value['setting_name'] == "quotes_by_topic_per_page" || $value['setting_name'] == "search_quotes_per_page" || $value['setting_name'] == "quote_by_author_per_page" || $value['setting_name'] == "latest_riddles_per_page" || $value['setting_name'] == "category_riddles_per_page" || $value['setting_name'] == "index_riddles_per_page" || $value['setting_name'] == "search_riddles_per_page" || $value['setting_name'] == "categories_per_page" || $value['setting_name'] == "top_rated_status_per_page" || $value['setting_name'] == "most_shared_status_per_page" || $value['setting_name'] == "status_by_category_per_page" || $value['setting_name'] == "search_status_per_page" || $value['setting_name'] == "videos_per_page" || $value['setting_name'] == "popular_videos_per_page" || $value['setting_name'] == "search_videos_per_page" || $value['setting_name'] == "vidoes_user_like_per_page" || $value['setting_name'] == "latest_videos_per_page" || $value['setting_name'] == "watch_later_videos_per_page" || $value['setting_name'] == "category_video_per_page" || $value['setting_name'] == "popular_covers_per_page" || $value['setting_name'] == "galleries_per_page" || $value['setting_name'] == "newest_jokes" || $value['setting_name'] == "recent_picture_jokes" || $value['setting_name'] == "top_rated_jokes" || $value['setting_name'] == "top_rated_picture" || $value['setting_name'] == "featured_jokes" || $value['setting_name'] == "more_lyrics_from_artist" || $value['setting_name'] == "most_rated_lyrics_count" || $value['setting_name'] == "recently_added_count" || $value['setting_name'] == "artists_per_page" || $value['setting_name'] == "artist_lyrics_per_page" || $value['setting_name'] == "popular_artists_count" || $value['setting_name'] == "artist_lyrics_per_page" || $value['setting_name'] == "poets_per_page" || $value['setting_name'] == "authors_per_alphabet" || $value['setting_name'] == "authors_per_column" || $value['setting_name'] == "cols_per_page" || $value['setting_name'] == "topics_per_page" || $value['setting_name'] == "sidebar_categories" || $value['setting_name'] == "sidebar_topics" || $value['setting_name'] == "search_poems_per_page" || $value['setting_name'] == "recent_poems_count" || $value['setting_name'] == "poems_by_topic_per_page"  || $value['setting_name'] == "topics_per_alphabet"  || $value['setting_name'] == "topics_per_column"  || $value['setting_name'] == "popular_quotes"  || $value['setting_name'] == "recent_quotes"  || $value['setting_name'] == "popular_riddles_per_page"  || $value['setting_name'] == "recently_added_status" || $value['setting_name'] == "featured_categories" || $value['setting_name'] == "admin_picks" || $value['setting_name'] == "most_viewed_videos" ) {?>  
                  
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                        
                     <select style="width:100%" data-placeholder="Choose a country..." class="form-control chosen-select" name="data[<?php echo $value['setting_name'];?>]" id="<?php echo $value['setting_name'];?>">
                        
          <option <?php if($value['setting_value'] == 10) echo "selected='selected'"?> value='10'>10</option>
          <option <?php if($value['setting_value'] == 25) echo "selected='selected'"?> value='25'>25</option>
          <option <?php if($value['setting_value'] == 50) echo "selected='selected'"?> value='50'>50</option>
          <option <?php if($value['setting_value'] == 75) echo "selected='selected'"?> value='75'>75</option>
          <option <?php if($value['setting_value'] == 100) echo "selected='selected'"?> value='100'>100</option>
          <option <?php if($value['setting_value'] == 125) echo "selected='selected'"?> value='125'>125</option>
                       
                      </select>
                 
                  </div> 
                  
                  </div>
                  
                  
                  <?php }else {?>
              
              
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder=""  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                  <?php
			   } }
			  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="facebooksettings">
            <p></p>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Facebook Settings</h3>
              </div>
              <div class="panel-body">
                <div class="col-lg-7">
                  <?php
			  foreach($this->setting_array['facebook'] as $key=>$value){ 
			  
			  	if($value['setting_name'] == "firsttime_registration_message") {				
			  ?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <textarea rows="4" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>"><?php echo $value['setting_value'];?></textarea>
                    </div>
                  </div>
                  
                  
                  <?php }else if($value['setting_name'] == "facebook_post_image") {?>
                  
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                  
                  <div class="fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new thumbnail" style="width: auto; height: auto;"><img  style="width: auto; height: auto;" id="<?php echo $value['Field'];?>" src="<?php echo main_url.$value['setting_value'];?>" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: auto; max-height: auto; line-height: 20px;"></div>
  <div>
    <span class="btn btn-file btn btn-primary"><span class="fileupload-new ">Select image</span><span class="fileupload-exists">Change</span><input name="data[<?php echo $value['setting_name'];?>]" type="file" /></span>
    <a href="#" class="btn fileupload-exists btn btn-danger" data-dismiss="fileupload">Remove</a>
  </div>
                  </div>
                  </div> 
                  
                  </div>
                  
                  <?php }else {?>
                
                
                		 <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder=""  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                        
                        
                        
                        
                        
			<?php }} ?>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="socialsettings">
            <p></p>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Social Settings</h3>
              </div>
              <div class="panel-body">
                <div class="col-lg-7">
                  <?php
			  foreach($this->setting_array['social'] as $key=>$value){ 					
			  ?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder=""  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                  <?php
			  
				
			  }
			  ?>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="tab-pane fade" id="mailsettings">
            <p></p>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Social Settings</h3>
              </div>
              <div class="panel-body">
                <div class="col-lg-7">
                  <?php
			  foreach($this->setting_array['mail'] as $key=>$value){ 					
			  ?>
                  <div class="form-group">
                    <label for="inputEmail1" class="col-lg-3 control-label"><?php echo format_names($value['setting_name']);?></label>
                    <div class="col-lg-9">
                      <input type="text" name="data[<?php echo $value['setting_name'];?>]" class="form-control" id="<?php echo $value['setting_name'];?>" placeholder=""  value="<?php echo $value['setting_value'];?>">
                    </div>
                  </div>
                  <?php
			  
				
			  }
			  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group" style="background:#eeeeee; margin-left:5px; padding:15px;">
        <div class="col-lg-12" style="text-align:left">
          <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save All Setttings</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php echo $this->render("themes/adminarea/html/elements/footer.php")?> 