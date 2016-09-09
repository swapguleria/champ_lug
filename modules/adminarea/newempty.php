<?php
$tpl =  new bQuickTpl();
include(getcwd()."/modules/adminarea/common.php");

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


$tpl->page_title = "Detail Page";
$tpl->tb_primaryid =  $primary_key;
$tpl->record_info =  $getrecord_info[0];
$tpl->table_name =  $table_name;
$tpl->custom_data = $custom_data;
   //['course_id']               
//pr($getrecord_info[0]);          
$course_info = $database->select("subjects","*",array("course_id"=>$getrecord_info[0]['course_id'],"ORDER"=>"semester ASC"));                        
//pr($course_info);exit;
$student_data = array();
foreach($course_info as $key=>$value){       
    //$student_data = array();
    //pr($value);
    //echo $value['semester'];
    if($value['semester'] == 1){
       $student_data['semester_1'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_1'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_1'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_1'][$key]['semester'] = $value['semester'];
        $student_data['semester_1'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_1'][$key]['minimum_marks'] = $value['minimum_marks'];
    }elseif($value['semester'] ==2){
        $student_data['semester_2'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_2'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_2'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_2'][$key]['semester'] = $value['semester'];
        $student_data['semester_2'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_2'][$key]['minimum_marks'] = $value['minimum_marks'];
    }
    elseif($value['semester'] ==3){
        $student_data['semester_3'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_3'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_3'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_3'][$key]['semester'] = $value['semester'];
        $student_data['semester_3'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_3'][$key]['minimum_marks'] = $value['minimum_marks'];
    }
    elseif($value['semester'] ==4){
        $student_data['semester_4'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_4'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_4'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_4'][$key]['semester'] = $value['semester'];
        $student_data['semester_4'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_4'][$key]['minimum_marks'] = $value['minimum_marks'];
    }
    elseif($value['semester'] ==5){
        $student_data['semester_5'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_5'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_5'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_5'][$key]['semester'] = $value['semester'];
        $student_data['semester_5'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_5'][$key]['minimum_marks'] = $value['minimum_marks'];
    }
    elseif($value['semester'] ==6){
        $student_data['semester_6'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_6'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_6'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_6'][$key]['semester'] = $value['semester'];
        $student_data['semester_6'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_6'][$key]['minimum_marks'] = $value['minimum_marks'];
    }
    elseif($value['semester'] ==7){
        $student_data['semester_7'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_7'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_7'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_7'][$key]['semester'] = $value['semester'];
        $student_data['semester_7'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_7'][$key]['minimum_marks'] = $value['minimum_marks'];
    }
    elseif($value['semester'] ==8){
        $student_data['semester_8'][$key]['subject_id'] = $value['subject_id'];
        $student_data['semester_8'][$key]['subject_name'] = $value['subject_name'];
        $student_data['semester_8'][$key]['course_id'] = $value['course_id'];
        $student_data['semester_8'][$key]['semester'] = $value['semester'];
        $student_data['semester_8'][$key]['maximum_marks'] = $value['maximum_marks'];
        $student_data['semester_8'][$key]['minimum_marks'] = $value['minimum_marks'];
    }
}
$tpl->student_data = $student_data;;
//pr($student_data);

//$tpl->course_info = $course_info;

//pr($course_info);


include(getcwd()."/modules/adminarea/common.php");
echo $tpl->render("themes/adminarea/html/newempty.php");
