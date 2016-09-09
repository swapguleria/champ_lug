
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>
<?php if($this->params[0] == "resume"){ ?>
<?php } else { ?>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/sub_header.php"); ?>
<?php } ?>

<?php  
$countries = array("India");
     
//--fetch all states in india--//

$indian_all_states  = array ('Andhra Pradesh','Arunachal Pradesh','Assam','Bihar', 'Chhattisgarh', 'Goa','Gujrat','Haryana', 'Himachal Pradesh','Jammu & Kashmir', 'Jharkhand','Karnataka','Kerala', 'Madhya Pradesh', 'Maharashtra','Manipur','Meghalaya', 'Mizoram', 'Nagaland','Odisha', 'Punjab', 'Rajasthan','Sikkim', 'Tamil Nadu','Tripura','Uttarakhand', 'Uttar Pradesh', 'West Bengal', 'Andaman & Nicobar', 'Chandigarh', 'Dadra and Nagar Haveli','Daman & Diu','Delhi', 'Lakshadweep', 'Puducherry','Telangana');

//--fetch all Industry name--//
$industry_name = array('Automotive/ Ancillaries','Banking/ Financial Services','Bio Technology & Life Sciences','Chemicals/Petrochemicals','Construction','FMCG','Education','Entertainment/ Media/ Publishing','Insurance',' ITES/BPO','IT/ Computers - Hardware','IT/ Computers - Software','KPO/Analytics','Machinery/ Equipment Mfg.',' Oil/ Gas/ Petroleum',' Pharmaceuticals',' Plastic/ Rubber',' Power/Energy','Real Estate','Retailing',' Telecom',' Advertising/PR/Events','Agriculture/ Dairy Based',' Aviation/Aerospace','Beauty/Fitness/PersonalCare/SPA',' Beverages/ Liquor','Cement','Ceramics & Sanitary Ware','Consultancy',' Courier/ Freight/ Transportation','Dotcom','E-Learning',' Electrical/Switchgear','Engineering, Procurement, Construction','Environmental Service',' Facility management',' Fertilizer/ Pesticides','Food & Packaged Food',' Textiles / Yarn / Fabrics / Garments','Gems & Jewellery',' Government/ PSU/ Defence','Consumer Electronics/Appliances',' Hospitals/ Health Care','Hotels/ Restaurant','Import / Export','Iron/ Steel','ISP',' Law Enforcement/Security Services','Leather',' Market Research',' Medical Transcription','Mining','NGO',' Non-Ferrous Metals (Aluminium, Zinc etc.)','Office Equipment/Automation','Paints','Paper',' Printing/ Packaging',' Public Relations (PR)','Semiconductor',' Shipping/ Marine Services','Social Media',' Sugar','Travel/ Tourism','Tyres','Wood',' Other','Any');

//--array for basic education--//
$basic_education = array('Not Pursuing Graduation','B.A','B.Arch','BCA','B.B.A','B.COM','B.ED','BDS','BHM','B.Pharma','B.Sc','B.sc/IT','B.Tech/B.E','LLB','MBBS','Diploma','BVSC','other');

$master_education = array('MCA','M.A','MBA','M.COM','LLM','M.Pharma','MVSC','M.Arch','CA','CS','M.ED','M.Sc','M.Tech','PG Diploma');

$doctorate_education = array('Ph.D/Doctorate','MPHIL','other');
?>



<div class="row">
    <div class="col-md-12">
        <h2 class="left color-orange font-wt-600" style="margin-bottom:20px;">Submit Your Resume</h2>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <?php if ($this->errors) { ?>
            <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>
                <?php
                foreach ($this->errors as $value) {
                    echo "<li style='list-style:circle'>" . $value . "</li>";
                }
                ?>

            </div>
        <?php } ?>
        <?php if ($this->params[1] == 'success') { ?>
            <div class="alert alert-success" id="success_div"><a class="close" data-dismiss="alert" href="#">&times;</a>
                <?php
                echo "<li style='list-style:circle'>Your Resume Submit was Successfull!)</li>";
                ?>
            </div>
        <?php } ?>
    </div>
</div>


                          

                         

<div class="row">

    <div class="col-md-12">
        <form class="form-horizontal" role="form" method="post" name="csrf_form" enctype="multipart/form-data" parsley-validate>          
            <fieldset>
                <legend>Address Details</legend>  
                <input type="hidden" name="csrf_token" value="<?php echo $this->formtoken; ?>">
                <!-- Form Name -->


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Email address <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>
                    <div class="col-md-6">
                        <input type="text" name="data[email]" parsley-required="true" parsley-type="email" parsley-trigger="change" class="form-control" value="<?php echo $_SESSION['in_email']; ?>">
                        
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Full name <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>
                    <div class="col-md-6">
                        <input type="text" name="data[full_name]" parsley-required="true" class="form-control" value="<?php echo $_SESSION['in_name'];?>">
                    </div>
                </div>


                <legend>Personal Details</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Nationality <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label> 
                    <div class="col-md-6">
                        <div class="controls">
                            <select name="data[country]" id="SelectNationality" style=" border:1px solid #ccc; width: 100%; font-size:13px;" parsley-required="true">
                                <option value="">Select Nationality</option>
                                <?php foreach($countries as $country){ ?>
                                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                
                                <?php } ?>
                            </select>
                        </div>
                    </div>    
                </div>

                <!-- Text input-->

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Current location <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label> 
                    <div class="col-md-6">
                         <div class="controls">
                            <select name="data[location]" id="SelectStates" style=" border:1px solid #ccc; width: 100%; font-size:13px;" parsley-required="true">
                                <option value="">Select Location</option>
                                <?php foreach($indian_all_states as $states){ ?>
                                <option value="<?php echo $states; ?>"><?php echo $states; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Mobile number <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>
                    <div class="col-md-6">
                        <input type="text" name="data[mobile_number]" parsley-required="true" class="form-control" value="">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput"> Gender <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>
                    <div class="col-md-6">
                        
                        <div class="btn-group" data-toggle="buttons">
 
                        <label class="btn btn-primary active">
                            <input type="radio" name="data[gender]" value="male" id="option2"> Male
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="data[gender]" value="female" id="option3">Female
                        </label>
                      </div>
                        
                        
                        
                                            </div>
                </div>


<legend>Professional Details</legend>
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Job Type <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label> 
                    <div class="col-md-6">
                        <div class="controls">
                            <select name="data[job_type]" id="SelectJobType" style=" border:1px solid #ccc; width: 100%; font-size:13px;" parsley-required="true">
                                <option value="">Select Job Type</option>
                                <option value="Permanent Full Time">Permanent Full Time</option>
                                <option value="Permanent Part Time">Permanent Part Time</option>
                                <option value="Contract">Contract</option>
                            </select>
                        </div>
                    </div>
                </div>     



                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Total experience <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label> 
                    <div class="col-md-3">
                        <div class="controls">
                            <select name="data[year]" id="SelectYear" style=" border:1px solid #ccc; width: 100%; font-size:13px;">
                                <option value="">Select Year</option>
                                <option value="fresher">Fresher</option>
                                <?php for($i=1; $i<=50; $i++){ ?>
                                <option 
                                    <?php if($i == "1"){ ?>
                                    value="<?php echo $i; ?>year"
                                    <?php }else{ ?>
                                    value="<?php echo $i; ?>years"
                                    <?php } ?>
                                    
                                    ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="controls">
                            <select name="data[month]" id="SelectMonth" style=" border:1px solid #ccc; width: 100%; font-size:13px;">
                                <option value="">Select Month</option>
                                <?php for($i=1; $i<=12; $i++){ ?>
                                <option 
                                   <?php if($i == "1"){ ?>
                                    value="<?php echo $i; ?>month"
                                    <?php }else{ ?>
                                    value="<?php echo $i; ?>months"
                                    <?php } ?>
                                        
                                        ><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>     

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Current Industry <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label> 
                    <div class="col-md-6">
                        <div class="controls">
                            <select name="data[industry]" id="SelectIndustry" style=" border:1px solid #ccc; width: 100%; font-size:13px;" parsley-required="true">
                                <option value="">Select Industry</option>
                                <?php foreach($industry_name as $industry){ ?>
                                <option value="<?php echo $industry; ?>"><?php echo $industry; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

<legend>Your Education Background:</legend>  
                <input type="hidden" name="csrf_token" value="<?php echo $this->formtoken; ?>">
                <!-- Form Name -->

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Select Basic Education <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>
                    <div class="col-md-6">
                        <div class="controls">
                            <select name="data[basic_education]" id="BasicEducation" style=" border:1px solid #ccc; width: 100%; font-size:13px;" parsley-required="true">
                                <option value="">Select Basic Education</option>
                                <?php foreach($basic_education as $b_education){ ?>
                                <option value="<?php echo $b_education; ?>"><?php echo $b_education; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group" style="display:none" id="mastereducation">
                    <label class="col-sm-3 control-label" for="textinput">Select Master Education <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>
                    <div class="col-md-6"  >
                        <div class="controls">
                            <select name="data[master_education]" id="MasterEducation" style=" border:1px solid #ccc; width: 100%; font-size:13px;">
                                <option value="">Select Master Education</option>
                                <?php foreach($master_education as $m_education){ ?>
                                <option value="<?php echo $m_education; ?>"><?php echo $m_education; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="icon_master">
                     <label class="col-sm-3 control-label" for="textinput">
                         <i class="fa fa-plus-square fa-2x"></i>Add Master Education
                    </label>
                 <div class="col-md-6"  >
                        <div class="controls">
                                
                             </div>
                    </div>
                  </div>
                    
<!--                <div class="form-group" id="icon_doctorate" style="display:none">
                       <label class="col-sm-3 control-label" for="textinput">
                         <i class="fa fa-plus-square fa-2x"></i>Add Doctorate Education
                      </label>
                 <div class="col-md-6"  >
                        <div class="controls">
                                
                             </div>
                    </div>
                  </div>

                <div class="form-group" style="display:none" id="doctorateeducation">
                        <label class="col-sm-3 control-label" for="textinput">Select Doctorate Education<i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>
                    <div class="col-md-6"  >
                        <div class="controls">
                            <select name="data[doctorate_education]" id="DoctorateEducation" style=" border:1px solid #ccc; width: 100%; font-size:13px;" >
                                <option value="">Select Doctorate Education</option>
                                <?php foreach($doctorate_education as $d_education){ ?>
                                <option value="<?php echo $d_education; ?>"><?php echo $d_education; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>-->


<!--                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Key skills</label> 
                    <div class="col-md-6">
                       
                        <input type="text" name="data[skills]" class="form-control" placeholder="(ex: PHP, .Net, Java. not used space)" parsley-required="true" autocomplete="">
                       
                    </div>
                </div>-->
<!--                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Key skills</label> 
                    <div class="col-md-6">
                       
                <select multiple id="e1" name="skills[]" style="width:435px" placeholder="Select your Skills" parsley-required="true">
                    <?php foreach($this->skills as $skill){ ?>
                 <option value="<?php echo $skill['skill_name']; ?>"><?php echo $skill['skill_name']; ?></option>
                    <?php } ?>
                </select>
                       
                    </div>
                </div>-->
 
                <legend style="margin-top:20px;">Have a resume ready? Upload it now</legend>

<!--                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Resume title:</label> 
                    <div class="col-md-6"> 
                        <input type="text" name="data[resume_title]" parsley-required="true" class="form-control">
                    </div>
                </div>-->


                <div class="form-group">
                    <label class="col-sm-3 control-label" for="textinput">Upload Resume <i class="fa fa-star" style="font-size:6px; color:#F00; position:relative; top:-6px"></i> :</label>  
                    <div class="col-md-6">
                   <input type="file" name="file" class="form-control" parsley-required="true">
                    </div> 
                </div>
                
                <div class="form-group">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <input type="submit" name="resume_submit" class="btn btn-warning btn-lg" value="Submit Resume">
                    </div> 
                </div>

            </fieldset>
        </form>
    </div>


</div>

<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

<?php if ($this->params[1] == 'success') { ?>
    <script>
        $(function() {
            setTimeout(function() {
                window.location = "<?php echo main_url ?>/resume";
            }, 2000);
        });
       
    </script>
    
    <?php
}?>