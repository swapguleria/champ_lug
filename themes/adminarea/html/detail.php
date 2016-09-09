
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

<div                 class="col-lg-4" style="margin-top:10px; padding-left: 0px;">
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


<?php if($this->vars[2] == "subjects" || $this->vars[2] == "courses" || $this->vars[2] == "students_marks" ) { ?>

<?php }else{ ?>
<div class="col-lg-8" style="margin-top: 10px; padding-right: 0px;">
 <?php   if($this->course_type == "year"){?>
  
<?php foreach($this->subject_data as $subject_data){ //pr($subject_data);?>
    
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 15px;">
     <thead>
    
         <tr style="-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
">
            <th  colspan="4" class="text-center "><h4><b>YEAR - <?php echo $subject_data[0]['part']; ?></b></h4></th>
<!--            <th></th>
            <th></th>
            <th></th>-->
            <th><a class="btn btn-success save_all" part="<?php echo $subject_data[0]['part']; ?>" subject_id="<?php echo $subject_data[0]['subject_id'];?>" course_id="<?php echo $subject_data[0]['course_id'];?>" student_id="<?php echo $this->student_id;?>" rollno="<?php echo $this->roll_no; ?>" streamid="<?php echo $this->stream_id; ?>" regno ="<?php echo $this->reg_no; ?>">Save all</a></th>
        </tr>
    </thead>
    <thead>
    
        <tr style="-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
">
            <th style="font-size:14px; white-space:nowrap;zz">Subject Name</th>
            <th style="font-size:14px; white-space:nowrap;">Max Marks</th>
            <th style="font-size:14px; white-space:nowrap;">Min Marks</th>
             <th class="text-center" style="font-size:14px; white-space:nowrap;">Marks Obtained</th>
            <th class="text-center" style="font-size:14px; white-space:nowrap;">Action</th>
        </tr>
    </thead>
            <?php  foreach($subject_data as $key=>$subject){ //pr($subject);
           if($key === 'max' || $key === 'min' || $key === 'marks'){

           }else{?>   
         
            <tr>
                <td style="font-size:14px; white-space:nowrap;" class="subject_value_<?php echo $subject_data[0]['part']; ?>"><?php echo ucwords($subject['subject_name']); ?></td>
                <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['maximum_marks']; ?></td>
                <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['minimum_marks']; ?></td>
                
                
                <td><input type="text" name="" id="marks_<?php echo $subject['subject_id'];?>" placeholder="Marks" value="<?php echo $subject['marks_obtain']; ?>" class="form-control input-sm input-small marks_input_<?php echo $subject_data[0]['part']; ?>" sub_id="<?php echo $subject['subject_id'];?>">
                </td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' ><span class=" icon-share"></span> <input type="submit" value="Save" class="record_submit back_none" stream_id="<?php echo $this->stream_id; ?>" semester_id="<?php echo $subject['part']; ?>" reg_id="<?php echo $this->reg_no; ?>" rollno_id="<?php echo $this->roll_no; ?>" student_id="<?php echo $this->student_id; ?>" course_id="<?php echo $subject['course_id'];?>" subject_id="<?php echo $subject['subject_id'];?>"></a></td>
                                                                     
            </tr>
          
            <?php }} ?>
            <td>Total:</td>
            <td><?php echo $subject_data['max']; ?></td>
            <td><?php echo $subject_data['min']; ?></td>
            <td><?php echo $subject_data['marks']; ?></td>
            <td></td>
    </table>                       
   
    

<?php } ?>
       
<?php }elseif($this->course_type == "semester"){?>
   
  <?php foreach($this->subject_data as $subject_data){ //pr($subject_data);?>
    
    <table class="table table-striped custab" style=" margin: 0px; margin-top: 15px;">
     <thead>
    
         <tr style="-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
">
            <th  colspan="4" class="text-center "><h4><b>SEMESTER - <?php echo $subject_data[0]['part']; ?></b></h4></th>
<!--            <th></th>
            <th></th>
            <th></th>-->
            <th><a class="btn btn-success save_all" part="<?php echo $subject_data[0]['part']; ?>" subject_id="<?php echo $subject_data[0]['subject_id'];?>" course_id="<?php echo $subject_data[0]['course_id'];?>" student_id="<?php echo $this->record_info[$this->tb_primaryid];?>" rollno="<?php echo $this->roll_no; ?>" streamid="<?php echo $this->stream_id; ?>" regno ="<?php echo $this->reg_no; ?>">Save all</a></th>
        </tr>
    </thead>
    <thead>
    
        <tr style="-webkit-border-top-left-radius: 5px;
-webkit-border-top-right-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-topright: 5px;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
">
            <th style="font-size:14px; white-space:nowrap;zz">Subject Name</th>
            <th style="font-size:14px; white-space:nowrap;">Max Marks</th>
            <th style="font-size:14px; white-space:nowrap;">Min Marks</th>
             <th class="text-center" style="font-size:14px; white-space:nowrap;">Marks Obtained</th>
            <th class="text-center" style="font-size:14px; white-space:nowrap;">Action</th>
        </tr>
    </thead>
            <?php  foreach($subject_data as $key=>$subject){ //pr($subject);
           if($key === 'max' || $key === 'min' || $key === 'marks'){

           }else{?>   
         
            <tr>
                <td style="font-size:14px; white-space:nowrap;" class="subject_value_<?php echo $subject_data[0]['part']; ?>"><?php echo ucwords($subject['subject_name']); ?></td>
                <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['maximum_marks']; ?></td>
                <td style="font-size:14px; white-space:nowrap;"><?php echo $subject['minimum_marks']; ?></td>
                
                
                <td><input type="text" name="" id="marks_<?php echo $subject['subject_id'];?>" placeholder="Marks" value="<?php echo $subject['marks_obtain']; ?>" class="form-control input-sm input-small marks_input_<?php echo $subject_data[0]['part']; ?>" sub_id="<?php echo $subject['subject_id'];?>">
                </td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' ><span class=" icon-share"></span> <input type="submit" value="Save" class="record_submit back_none" stream_id="<?php echo $this->stream_id; ?>" semester_id="<?php echo $subject['part']; ?>" reg_id="<?php echo $this->reg_no; ?>" rollno_id="<?php echo $this->roll_no; ?>" student_id="<?php echo $this->student_id; ?>" course_id="<?php echo $subject['course_id'];?>" subject_id="<?php echo $subject['subject_id'];?>"></a></td>
                
                                                                     
            </tr>
          
            <?php }} ?>
            <td>Total:</td>
            <td><?php echo $subject_data['max']; ?></td>
            <td><?php echo $subject_data['min']; ?></td>
            <td><?php echo $subject_data['marks']; ?></td>
            <td></td>
    </table>                       
   
    

<?php } ?>  
    
    
    
    
<?php }
   ?>
</div>
<?php } ?>


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
                 
                 
                 
                 
                 
                 
                 $(".record_submit").click(function(){
                 //alert("hello");
                 var subject_id = $(this).attr("subject_id");
                 var marks = $("#marks_"+subject_id).val();
                 var course_id = $(this).attr("course_id");
                 var student_id = $(this).attr("student_id");
                 var reg_id = $(this).attr("reg_id");
                 var rollno_id = $(this).attr("rollno_id");
                 var stream_id = $(this).attr("stream_id");
                 var semester_id = $(this).attr("semester_id");
                    //alert(subject_id);
//                    $.post('<?php // echo _admin_url;?>/common/actions', { method: "deletearecord", table: table_name, records: record_ids}, function(data)
                    $.post('<?php echo _admin_url; ?>'+'/detail',{marks: marks, subject_id: subject_id, course_id: course_id, student_id: student_id, reg_id:reg_id, rollno_id:rollno_id, semester_id: semester_id, stream_id:stream_id },function(data){
          //alert(data);         
        location.reload();
                }
                 );
                 });
                 
                 
                 
});
$(document).on('click','.save_all',function(){
//alert("hello");
var part = $(this).attr('part');
var sub_id = $(this).attr("subject_id");
var curs_id = $(this).attr("course_id");
var stu_id = $(this).attr("student_id");
var rollno = $(this).attr("rollno");
var regno = $(this).attr("regno");
var streamid = $(this).attr("streamid");
//alert(part);
var marks_array = [];
var sub_array = [];
$('.marks_input_'+part).each(function(index,value){
    //alert($(this).val());
    marks_array.push($(this).val());
    sub_array.push($(this).attr("sub_id"));
    });
    
    var subject_name = [];
    $('.subject_value_'+part).each(function(index,value){
        subject_name.push($(this).text());
    });
   console.log(marks_array);
    console.log(subject_name);

//alert(sub_array);
$.post('<?php echo _admin_url; ?>'+'/detail',{part: part,sub_id:sub_id,rollno:rollno,regno:regno,curs_id:curs_id,stu_id:stu_id,streamid:streamid, marks_array: marks_array, sub_array: sub_array},function(data){
    //alert(data);
    location.reload();
    });                   
});
</script>

<?php echo $this->render("themes/adminarea/html/elements/footer.php")?>
