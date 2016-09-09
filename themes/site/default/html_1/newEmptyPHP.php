
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/sub_header.php"); ?>



<div class="row">
    <div class="col-md-12">
        <h2 class="center color-orange font-wt-600">Submit Your Resume</h2>
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
                echo "<li style='list-style:circle'>Registeration successfull! You can login now :)</li>";
                ?>
            </div>
        <?php } ?>
        <div class="panel panel-default">

            <div class="panel-body">
                <form role="form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?php echo $this->formtoken; ?>">
                    <div class="row border_bottom mr-top pd_bottom">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h1 class="font-22 pd_top_bt">Create Login Details</h1>
                            <div class="form-group">
                                <label class="control-label">Enter your Email ID*</label>
                                <input type="text" name="data[email]" id="first_name" class="form-control input-sm">
                                <p class="help-block">Please register using your current email address.</p>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">
                                <label class="control-label">Create a Password for your account*</label>
                                <input type="text" name="data[password]" id="first_name" class="form-control input-sm">

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">
                                <label class="control-label">Confirm the Password*</label>
                                <input type="text" name="data[cpassword]" id="first_name" class="form-control input-sm">

                            </div>
                        </div>
                    </div>

                    <div class="row border_bottom mr-top pd_bottom">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h1 class="font-22 pd_top_bt">Your Contact Information</h1>
                            <div class="form-group">
                                <label class="control-label">Please mention your Full Name</label>
                                <input type="text" name="data[full_name]" id="first_name" class="form-control input-sm">
                                <p class="help-block">Please register using your current email address.</p>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">
                                <label class="control-label">Where are you currently located?*</label>

                                <ul class="nav navbar-nav" style="width: 100%;">
                                    <li class="dropdown dropdown-large">
                                        <a data-toggle="dropdown" class="dropdown-toggle border" href="#">Dropdown <b style="margin-top: 7px;" class="caret pull-right"></b></a>

                                        <ul class="dropdown-menu dropdown-menu-large row drop-nav2" name="data[location]">

                                            <li class="col-sm-3">
                                                <ul>
]                                                   <li value="Default navbar">Default navbar</li>
                                                    <li value="Buttons">Buttons</li>
                                                    <li value="Text">Text</li>
                                                    <li value="links">links</li>
                                                    <li value="Component alignment">Component alignment</li>                                              
                                                </ul>
                                            </li>
                                        </ul>

                                    </li>
                                </ul>


                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 7px;">

                            <div class="form-group">
                                <label class="control-label">Enter your Mobile number*</label>
                                <input type="text" name="data[mobile_number]" class="form-control input-sm">
                                <p class="help-block">If you do not have a mobile, enter Landline no.</p>

                            </div>
                        </div>
                    </div>

                    <div class="row border_bottom mr-top pd_bottom">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h1 class="font-22 pd_top_bt">Your Current Employment Details</h1>
                            <div class="form-group">
                                <label class="control-label">How much work experience do you have?*</label>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <select name="data[experience]" class="form-control select-picker">
                                            <option value="">Select Experience</option>
                                            <option value="Freasher">Freasher</option>
                                            <option value="6Month">6Month</option>
                                            <option value="1Year">1Year</option>
                                            <option value="2Year">2Years</option>
                                            <option value="3Years">3Years</option>
                                            <option value="4Years">4Years</option>
                                            <option value="5Years">5Years</option>
                                            <option value="6Years">6Years</option>
                                            <option value="7Years">7Years</option>
                                            <option value="8Years">8Years</option>
                                            <option value="9Years">9Years</option>
                                            <option value="10Years">10Years</option>
                                        </select>
                                    </div>             
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">
                                <label class="control-label">What are your Key Skills?*</label>
                                <input type="text" name="data[key_skills]" id="first_name" class="form-control input-sm">

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">

                            <div class="form-group">
                                <label class="control-label">Enter a Headline for your Profile*</label>
                                <input type="text" name="data[profile]" id="first_name" class="form-control input-sm">
                                <p>Your Resume Headline is the first thing Recruiters will see.</p>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Which Industry does your company belong to?*</label>
                          <input type="text" name="data[company_belong_to]"  class="form-control input-sm">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Which Functional Area do you work in?*</label>
                                <ul class="nav navbar-nav" style="width: 100%;">
                                    <li class="dropdown dropdown-large">
                                        <a data-toggle="dropdown" class="dropdown-toggle border" href="#">Dropdown <b style="margin-top: 7px;" class="caret pull-right"></b></a>

                                        <ul class="dropdown-menu dropdown-menu-large row drop-nav">

                                            <li class="col-sm-12">
                                                <ul>
                                                    <li class="dropdown-header">Button groups</li>
                                                    <li><a href="#">Basic example</a></li>
                                                    <li><a href="#">Button toolbar</a></li>
                                                    <li><a href="#">Sizing</a></li>
                                                    <li><a href="#">Nesting</a></li>
                                                    <li><a href="#">Vertical variation</a></li>
                                                    <li class="divider"></li>
                                                    <li class="dropdown-header">Button dropdowns</li>
                                                    <li><a href="#">Single button dropdowns</a></li>
                                                </ul>
                                            </li>

                                        </ul>

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
















                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h1 class="font-22 pd_top_bt">Upload your detailed resume</h1>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="data[description]" id="Phone_number" class="form-control input-sm" placeholder="Description or Cover letter ">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="student_resume"></span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a>
                                </div>




                            </div>
                        </div>
                    </div>



                    <input type="submit" name="resume_submit" value="Register" class="btn btn-info">

                </form>
            </div>
        </div>
    </div>







</div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>

<?php if ($this->params[1] == 'success') { ?>
    <script>
        $(function() {
            setTimeout(function() {
                window.location = "<?php echo main_url ?>/contact";
            }, 3000);
        });
    </script>
    <?php
}?>