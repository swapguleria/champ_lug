<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

    
<div class="container">
  <div class="row">
    <div class="span12">
        
        <?php if($this->success) { ?>
                    <div class="alert alert-success" id="success_div"><a class="close" data-dismiss="alert" href="#">&times;</a>
                      <li style='list-style:circle'>Your message sent successfully!</li>
                    </div>
                <?php } if($this->error){ ?>
                    <div class="alert alert-danger"><a class="close" data-dismiss="alert" href="#">&times;</a>
                        <ul style="list-style: none;">
                            <?php foreach($this->error as $error){?>
                            <li><?php echo $error;?></li> 
                            <?php }?>
                        </ul>
                    </div>
                <?php } ?>
        
      <form class="form-horizontal span9" method="post" parsley-validate>      
        <fieldset>
          <legend>Application Form</legend>
      
          
            <div class="row-fluid" style="">                               
          <div class="span8">
          <div class="control-group" >
            <label class="control-label">Course</label>
            <div class="controls">
              <input type="text" class="input-block-level"  name="course_name" parsley-required="true">
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label">Name of Applicant</label>
            <div class="controls">
              <input type="text" class="input-block-level"  name="applicant_name" parsley-required="true">
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label">Father's Name</label>
            <div class="controls">
              <input type="text" class="input-block-level" name="father_name" parsley-required="true">
            </div>
          </div>
              </div> 
                <div class="span4">
                    <div class="row-fluid" style="">  
                        <div class="fileinput fileinput-new" data-provides="fileinput" id="image">
                                                    <div class="fileinput-preview thumbnail img_selected" data-trigger="fileinput" style="width: 200px; height: 125px;" >

                                                        <img src="http://placehold.it/500x300">
                                                    </div>
                                                  <div>
                                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                                        <input type="file" name="file" id="file"></span>
                                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>

                                                  </div>                
                                                </div>
                        </div>
                    </div>
                </div>           
          
          <div class="control-group">
           
            <label class="control-label">Sex</label>
            <div class="controls">
                <div class="row-fluid">
                    <div class="span2">
                    <label>
                      <input type="radio" name="gender" id="option2" value="male"> Male
                    </label>
                  </div>
                   <div class="span2">
                   <label>
                      <input type="radio" name="gender" id="option2" value="female"> Female
                    </label>
                  </div>
                    </div>
                </div>
            </div>
    
          
          <div class="control-group">
            <label class="control-label">Permanent Address</label>
            <div class="controls">
                <textarea class="input-block-level" name="permanent_address" parsley-required="true"></textarea>
            </div>      
          </div>
          
   
              <div class="row-fluid">
                  
                  <div class="span6">
                
                   <div class="control-group">
    				<label  class="control-label text-left">	
    					Pincode
    				</label>
    				<div class="controls">
    					<input name="pincode" class="input-block-level" type="text" value="" parsley-required="true">
    				 
    				</div>
    			</div>
                  </div>
                <div class="span6">
            
                                     <div class="control-group">
    				<label  class="control-label text-left">	
    					Contact
    				</label>
    				<div class="controls">
    					<input name="contact" class="input-block-level" type="text" value="" parsley-required="true">
    				
    				</div>
    			       
                </div>
                </div>
              </div>
            
          
          <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
              <input type="text" class="input-block-level"  name="email" parsley-required="true" parsley-type="email" parsley-trigger="change">
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label">Nationality</label>
            <div class="controls">
              <input type="text" class="input-block-level"  name="nationality" parsley-required="true">
            </div>
          </div>
          
          <div class="control-group">
          <div class="row-fluid">
              
              <div class="span12">
                  
                  <legend>Detail of Educational Qualification (Form X Standard onwards)</legend>
          
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th style="text-align:left;">Name of Qualifying Exam</th>
                  <th style="text-align:left;">Year/Session</th>
                  <th style="text-align:left;">Name of University/Board</th>
                  <th style="text-align:left;">Percentage</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td></td>
                </tr>
                <tr>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td></td>
                </tr>
                <tr>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td></td>
                </tr>
                                <tr>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td></td>
                </tr>
                                <tr>
                  <td><input type="text"></td>     
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td><input type="text"></td>
                  <td></td>
                  
                </tr>
              </tbody>
            </table>
             </div>  
          </div>
           </div>
          
          <div class="control-group">
          <div class="row-fluid">    
             
              <div class="span12">
                  
                  <legend>Declaration</legend> 
                  
                  <p>I hereby declare that, the information furnished herein are true and correct to the best of my knowledge and belie. I have read the prospectus and the rules and regulations of the Institute. In case any information furnished is found incorrect, at any stage I agree to forego the claim for admission. I declare that all the above Xerox Copies of the Certificates Submitted by me at the time of admission are true and genuine.</p>
                 
              </div>
               </div>
          
          </div>     
             
          <div class="control-group">
             
            <label class="control-label ">Place</label>
            <div class="controls">
              <input type="text" class="input-block-level "  name="place" parsley-required="true">
            </div>
          </div>
          
            <div class="row-fluid">
                  
                  <div class="span6">
                
                   <div class="control-group">
    				<label class="control-label text-left">	
    					Date
    				</label>
    				<div class="controls">
    					<input name="date" class="input-block-level" type="text" value="" id="email">
    				 
    				</div>
    			</div>
                  </div>
                <div class="span6">
            
                                     <div class="control-group">
<!--    				<label for="email" class="control-label text-left">	
    					Contact
    				</label>-->
    				<div class="controls">
    					<input name="" class="input-block-level" type="text" value="" >
    				
    				</div>
    			       
                </div>
                </div>
              </div>
          
           <div class="control-group">
          <div class="row-fluid">    
             
              <div class="span12" style="border: 1px solid grey">
               
                  <p><b>Note : Fees once paid will not be refund in any circumstances</b></p>
                 <p style=""><b>Document required for admission:</b></p>
                 <p>1. 3 Passport Size Photographs.</p>
                 <p>2. Photocopy of 10th / Matric Certificate.</p>
                 <p>3. Photocopy of Highest Educational Qualification Certificate.</p>
                 <p>4. Photocopy of Indentification / Residence Proof.</p>
                 
                 <p style="margin-top:30px;"><b>All the document should be self Attested</b></p>
              </div>
               </div>
          
          </div> 
          
          

       
          <div class="form-actions">
            <button type="submit" class="btn btn-primary" value="submit" name="applicant_submit">Submit</button>
            <button type="button" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div> 
    </div>


<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>
<script src="<?php echo main_url; ?>/libs/parsley-js-validations/parsley.min.js"></script>
