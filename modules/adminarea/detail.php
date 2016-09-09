<?php
$tpl =  new bQuickTpl();
include(getcwd()."/modules/adminarea/common.php");
if(isset($_POST) && $_POST){
    pr($_POST);
$marks_obtained = $_POST['marks'];
$subject_id = $_POST['subject_id'];
$course_id = $_POST['course_id'];
$student_id = $_POST['student_id'];
$stream_id = $_POST['stream_id'];
$roll_no = $_POST['rollno_id'];
$reg_no = $_POST['reg_id'];
$part = $_POST['semester_id'];
$get_record_acco_marks = $database->get("students_marks","student_marks_id",array("AND"=>array("student_id"=>$student_id,"course_id"=>$course_id,"roll_no"=>$roll_no,"subject_id"=>$subject_id,"stream_id"=>$stream_id)));
if($get_record_acco_marks){
 $database->update("students_marks",array("subject_marks"=>$marks_obtained),array("student_marks_id"=>$get_record_acco_marks)); 
}else{
$data= array();
$data['student_id'] = $student_id;
$data['stream_id'] = $stream_id;
$data['course_id'] = $course_id;
$data['subject_id'] = $subject_id;
$data['roll_no'] = $roll_no;
$data['reg_no'] = $reg_no;
$data['subject_marks'] = $marks_obtained;
$data['part'] = $part;
              
//pr($data);
$insert = $database->insert("students_marks",$data);           
}
}
//pr($params);
if(isset($_POST) && $_POST){
      pr($_POST);
      $new_array = array_combine($_POST['sub_array'],$_POST['marks_array']);
      pr($new_array);
      foreach($new_array as $k=>$v){
          $data_get = $database->get("students_marks","student_marks_id",array("AND"=>array("course_id"=>$_POST['curs_id'],"subject_id"=>$k,"part"=>$_POST['part'],"roll_no"=>$_POST['rollno'],"stream_id"=>$_POST['streamid'])));
          if($data_get){
              $database->update("students_marks",array("subject_marks"=>$v),array("student_marks_id"=>$data_get));
          }else{
             $database->insert("students_marks",array("course_id"=>$_POST['curs_id'],"stream_id"=>$_POST['streamid'],"subject_id"=>$k,"part"=>$_POST['part'],
                 "subject_marks"=>$v,"student_id"=>$_POST['stu_id'],"roll_no"=>$_POST['rollno'],"reg_no"=>$_POST['regno'])); 
          }
      }
    
     $all_part = $_POST['part'];
     //$all_subject_id = $_POST['subject_array'];
    $data = array();
    $data['subject_marks'] = $_POST['marks_arary'];
    $data['subject_id'] = $_POST['subject_array'];
    //pr($data['subject_marks']);                 
    //$all_marks = $_POST['marks_array'];
   
   // pr($all_part);
    
    $data['part'] = $all_part;
    //$data['subject_marks'] = $all_marks;

//pr($data);
$database->insert("students_marks",$data);
}


$table_name = $vars[2];
$record_id = $vars[3];

$record_id = str_replace("rec:","",$record_id);

$primary_key = $database->getPKID($table_name);

$getrecord_info = $database->select($table_name, "*", array($primary_key => $record_id));

$getleast_id =  $database->select($table_name, $primary_key, array("ORDER"=> $primary_key." ASC", "LIMIT" => 1));
$gethighest_id =  $database->select($table_name, $primary_key, array("ORDER"=> $primary_key." DESC", "LIMIT" => 1));

$last_id = $database->select($table_name, $primary_key, array($primary_key."[<]" => $record_id,"ORDER"=> $primary_key." DESC", "LIMIT" => 1));


$next_id = $database->select($table_name, $primary_key, array($primary_key."[>]" => $record_id,"ORDER"=> $primary_key." ASC", "LIMIT" => 1));

$next = "";
$last = "";
if(isset($last_id[0]) && $last_id[0]){
	$last = $last_id[0];
	}
if(isset($next_id[0]) && $next_id[0]){
	$next = $next_id[0];
	}
$custom_data= array();

//pr($get_another_data);exit;
foreach($get_another_data as $stuff){
	if($stuff['main_table'] == $table_name){
		$query_complete = $database->select($stuff['secondary_table'],"*");
		$custom_data[$stuff['main_field']]['data'] = $query_complete;
		$custom_data[$stuff['main_field']]['attributes']['seconday_field'] = $stuff['secondary_field'];
		$custom_data[$stuff['main_field']]['attributes']['value'] = $stuff['value'];
		$custom_data[$stuff['main_field']]['attributes']['secondary_table'] = $stuff['secondary_table'];
	}
}	



$tpl->lowest_id = $getleast_id[0];
$tpl->highest_id = $gethighest_id[0];
$tpl->last_id = $last;
$tpl->next_id = $next;

$tpl->current_record = $record_id;

$course_type = $database->get("courses","course_type",array("course_id"=>$course_id));
$tpl->course_type = $course_type;

//pr($course_type);exit;
$tpl->page_title = "Detail Page";
$tpl->tb_primaryid =  $primary_key;
$tpl->record_info =  $getrecord_info[0];
$tpl->table_name =  $table_name;
$tpl->custom_data = $custom_data;


$student_id = $getrecord_info[0]['student_id'];
$subject_id = $getrecord_info[0]['subject_id'];
//pr($student_id);exit;
//pr($getrecord_info[0]);
//pr($student_id);exit;
$course_id = $getrecord_info[0]['course_id'];
$roll_no = $getrecord_info[0]['roll_no'];
//pr($roll_no);
$reg_no = $getrecord_info[0]['reg_no'];

$course_type = $database->get("courses","course_type",array("course_id"=>$course_id));
$tpl->course_type = $course_type;

//pr($course_type);exit;

$subjects_data =array();
$subjects_marks =array();
$course_id = $getrecord_info[0]['course_id'];
//pr($course_id);
$stream_id = $getrecord_info[0]['stream_id'];
$get_course_info = $database->get("courses","*",array("course_id"=>$course_id));
//pr($get_course_info);exit;
$total_parts = $get_course_info["part"];
//pr($total_parts);exit;
//pr($getrecord_info[0]['course_id']);
for($sem_count = 1; $sem_count <=$total_parts; $sem_count++){   
    $get_subjects = $database->select("subjects","*",array("AND" => array("part"=>$sem_count,"course_id"=>$course_id,"stream_id"=>$stream_id))); 
    //pr($get_subjects);exit;
    //fetch student marks
        $get_marks = $database->select("students_marks", "*", array("AND" => array("part" => $sem_count, "course_id" => $course_id, "roll_no" => $roll_no,"stream_id"=>$stream_id)));
      
        $total_obtain = "";
        //fetch student marks according to subject
        foreach ($get_subjects as $key1 => $val) {
            //pr($val);
            foreach ($get_marks as $key => $value) {
               //pr($value);
                if ($val['subject_id'] == $value['subject_id'] && $val['course_id'] == $value['course_id']) {
                   
                    
                    $get_subjects[$key1]['marks_obtain'] = $value['subject_marks'];
                    //count total marks obtain by student
                    $total_obtain += $get_subjects[$key1]['marks_obtain'];
                }
            }
        }
    
    $max_total = $database->sum("subjects","maximum_marks",array("AND"=>array("part"=>$sem_count,"course_id"=>$course_id,"stream_id"=>$stream_id)));
    $min_total = $database->sum("subjects","minimum_marks",array("AND"=>array("part"=>$sem_count,"course_id"=>$course_id,"stream_id"=>$stream_id)));
    
    //$student_marks = $database->get("students_marks","subject_marks",array("AND"=>array("part"=>$sem_count,"course_id"=>$course_id)));
    //pr($get_subjects);
   $subjects_data[$sem_count] = $get_subjects;
   $subjects_data[$sem_count]['max'] = $max_total;
   $subjects_data[$sem_count]['min'] = $min_total; 
   //$subjects_data[$sem_count]['marks'] = $student_marks;
    $subjects_data[$sem_count]['marks'] = $total_obtain; //marks obtain by student
}
//pr($subjects_data);                      
$tpl->subject_data = $subjects_data;                
//pr($subjects_data);

$tpl->student_id = $student_id;
$tpl->roll_no = $roll_no;
$tpl->reg_no = $reg_no;
$tpl->stream_id = $stream_id;

//function get_marks(){
//    echo "hello";
//}
//echo get_marks();

//$tpl->student_marks_id = $student_marks;
//pr($student_marks);
include(getcwd()."/modules/adminarea/common.php");
echo $tpl->render("themes/adminarea/html/detail.php");
             