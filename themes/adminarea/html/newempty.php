<?php echo $this->render("themes/adminarea/html/elements/header.php")?>

<div class="btn-group pull-right">

		  <?php 
          if($this->current_record == $this->lowest_id){
		   ?>
          <a disabled  class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Previous </a>
          <?php } else{
			   ?>
          <a href="<?php echo _admin_url;?>/detail/<?php echo $this->vars[2]?>/<?php echo $this->last_id;?>"  class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Previous </a>
          <?php 
			   } ?>
          <?php 
			    if($this->current_record == $this->highest_id){
		   ?>
          <a  disabled  class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Next </a>
          <?php } else{
			   ?>
          <a href="<?php echo _admin_url;?>/detail/<?php echo $this->vars[2]?>/<?php echo $this->next_id;?>"  class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Next </a>
          <?php 
			   }
			   
			   //Make Array For File types
			   
			   if($this->file_fields and array_key_exists($this->table_name,$this->file_fields))
			   {
				   $file_fields=$this->file_fields[$this->table_name];
//				   pr($file_fields);
				   $file_file_fields=array();
				   $file_image_fields=array();
				   foreach($file_fields as $db_key => $field_info)
				   {
					   if($field_info['type'] == "image"){
						   $file_image_fields[$db_key]=$field_info['field'];
					   }
					   if($field_info['type'] == "file"){
						   $file_file_fields[$db_key]=$field_info['field'];
					   }
				   }
			   }
			   else
			   {
				   $file_fields=array();
			   }
			   
			   //make array for relationships
			$rel_main_fields_array=array();
			foreach($this->get_another_data as $db_id=>$rel_info)
			{
				if($rel_info['is_multiple']==1 and $rel_info['main_table']==$this->table_name)
				$rel_main_fields_array[]=$rel_info['main_field'];
				else
				$rel_simple_fields_array[]=$rel_info['main_field'];
			}
			$content=$this->record_info;
?>   
          
          
          
          
</div>
<?php 
//pr($rel_main_fields_array);pr($this->record_info);pr($this->get_another_data);exit;
?>
<h1>Record Details: <?php echo $this->record_info[$this->tb_primaryid];?></h1>
<hr />
<div class="col-lg-12" style="padding:0px">
 	<a href="<?php echo _admin_url;?>/edit/<?php echo $this->vars[2];?>/rec:<?php echo $this->current_record;?>" class="btn btn-success"><i class="icon-edit icon-white"></i> Edit </a> 
    <a href="javascript:void(0);" class="btn btn-danger deletebtn"  record_id="<?php echo $this->current_record;?>"><i class="icon-remove icon-white"></i> Delete </a> 
    <a href="<?php echo _admin_url;?>/table/<?php echo $this->vars[2];?>" class="btn btn-primary"><i class="icon-reply"></i> Cancel and Go Back</a> 
 </div>

<div class="col-lg-4" style="margin-top:10px; padding-left: 0px;">
<table class='table table-striped table-hover table-bordered' style='font-size:120%;'>
<?php foreach($this->record_info as $key=>$value) {
	if($key == "status" && $value == "1"){
		$value = '<span class="label label-success">Active</span>';
	}else if($key == "status" && $value == "0"){
		$value = '<span class="label label-danger">Inactive</span>';
	}
	
	 if(in_array($key,$file_image_fields)){
		if($value != ""){
			$img_src = main_url.$value;	 
		}else{
			$img_src = "http://placehold.it/270x200&text=No Image";	
		}
		 
  $value = "<img class='img-thumbnail' width='500' src='".$img_src."' />";
 }elseif(in_array($key,$file_file_fields)){
	 $value = '<a href="'.main_url.$value.'" class="btn btn-info" title="Download File">Preview File</a><small style="margin-left:10px"><span class="text-info text-sm"><span class="text-danger">*</span> To Download Right-Click and select Save Target As</span></small>';
 }
 
?>
<?php 
			if(in_array($key,$rel_main_fields_array)){
				$got_db_result = array();
				if($value)
				{	
					$got_db_result=unserialize($value);
				}
				
				$value='';
				$value='<div class="list-group">';
				foreach($this->custom_data[$key]['data'] as $key_option=>$val_option)  {
					
					if(in_array($val_option[$this->custom_data[$key]['attributes']['value']],$got_db_result)){
						$value.='<a class="list-group-item" href="'._admin_url."/detail/".$this->custom_data[$key]['attributes']['secondary_table'].'/rec:'.$val_option[$this->custom_data[$key]['attributes']['value']].'">'.$val_option[$this->custom_data[$key]['attributes']['seconday_field']].'</a>';
					}
					
					}
					$value.="</div>";
			}
			elseif(in_array($key,$rel_simple_fields_array))
				{
					foreach($this->custom_data[$key]['data'] as $key_option=>$val_option)  {
						if($val_option[$this->custom_data[$key]['attributes']['value']] == $content[$key]){
							$value='<a href="'._admin_url."/detail/".$this->custom_data[$key]['attributes']['secondary_table'].'/rec:'.$val_option[$this->custom_data[$key]['attributes']['value']].'">'.$val_option[$this->custom_data[$key]['attributes']['seconday_field']].'</a>';
						}
					}
				}
			?>


<tr><td width='180'><strong><?php echo format_names($key);?></strong></td><td style='word-wrap: break-word'><?php echo $value;?></td></tr>


<?php }?>
</table>
</div>

<div class="col-lg-8" style="margin-top: 10px; padding-right: 0px;">
    
    
      <?php  if(isset($this->student_data['semester_1'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px;">
     <thead>
    
        <tr>
            <th class="text-left "><h4><b>Semester 1</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
      
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_1'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    <?php  if(isset($this->student_data['semester_2'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
     <thead>
    
        <tr>
            <th class="text-left "><h4><b>Semester 2</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
    
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_2'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    <?php  if(isset($this->student_data['semester_3'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
     <thead>
    
        <tr>
            <th class="text-left "><h4><b>Semester 3</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
    
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_3'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    <?php  if(isset($this->student_data['semester_4'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
     <thead>
    
        <tr>
           <th class="text-left "><h4><b>Semester 4</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
    
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_4'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    <?php  if(isset($this->student_data['semester_5'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px;margin-top: 20px;">
     <thead>
    
        <tr>
            <th class="text-left "><h4><b>Semester 5</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
    
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_5'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    <?php  if(isset($this->student_data['semester_6'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
     <thead>
    
        <tr>
            <th class="text-left "><h4><b>Semester 6</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
    
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_6'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    
    <?php  if(isset($this->student_data['semester_7'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
     <thead>
    
        <tr>
            <th class="text-left "><h4><b>Semester 7</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
    
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_7'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    <?php  if(isset($this->student_data['semester_8'])){  //pr($course);?> 
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 20px;">
     <thead>
    
        <tr>
           <th class="text-left "><h4><b>Semester 8</b></h4></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <thead>
    
        <tr>
            <th>Subject Name</th>
            <th>Max Marks</th>
            <th>Min Marks</th>
             <th class="text-center">Marks Obtained</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
            <?php foreach($this->student_data['semester_8'] as $student_data){ ?>
            <tr>
                <td><?php echo ucwords($student_data['subject_name']); ?></td>
                <td><?php echo $student_data['maximum_marks']; ?></td>
                <td><?php echo $student_data['minimum_marks']; ?></td>
                <td><input type="text" name="name0" placeholder="Marks" class="form-control input-sm input-small"></td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="#"><span class=" icon-save"></span> Save</a></td>
            </tr>
      <?php  } ?>
    </table>
    <?php  } ?>
    
    
    
    
    
    
</div>

<script>
$(document).ready(function() {
    	$(".deletebtn").live('click',function(){
			var record_ids = $(this).attr('record_id');
			var table_name = "<?php echo $this->vars[2]?>";
			$(".contentloader").show();
			var alertconfirm = confirm("Are you sure you want to delete this record?");
			if (alertconfirm){
				$.post('<?php echo _admin_url;?>/common/actions', { method: "deletearecord", table: table_name, records: record_ids}, function(data) {
				  if(data){
					    
						alert("Record Deleted!");
						setTimeout(function() {
							window.location.href = '<?php echo _admin_url;?>/table/<?php echo $this->vars[2]?>';
						}, 800);
						
						
						
					}else{
						alert("Record was not deleted. Please check again!");
						$(".contentloader").hide();		
				  }
				});
			}
			else{
				$(".contentloader").hide();
				return false;
			}
		 });
});
</script>

<?php echo $this->render("themes/adminarea/html/elements/footer.php")?>
