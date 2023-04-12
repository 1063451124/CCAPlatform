<?php
////
//author sunyt
//func get timeslot of a single day
////
function get_profile($sid="72534128"){
    require_once 'db_conn.php';
    
    $conn = get_conn();
    // how to connect mysql fast
    $get_timeslot_status= "select * from cca.student_profile where student_id = {$sid};";
    $result = $conn->query($get_timeslot_status);
    // example even for multiple rows
    //print($get_timeslot_status);
    if (!$result) { 
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $ret = array();
    
    while ($row = mysqli_fetch_assoc($result))
    {
    $tmp = array();
    $tmp["student_id"] = $row['student_id'];
    $tmp["first_name"] = $row['first_name'];
    $tmp["last_name"] = $row['last_name'];
    $tmp["hk_mobile_no"] = $row['hk_mobile_no'];
    $tmp["cityu_email"] = $row['cityu_email'];
    $tmp["work_location"] = $row['work_location'];
    $tmp["last_modify_time"] = $row['last_modify_time'];
    $tmp["cv"] = base64_encode($row['cv']);
    $tmp["wechat_id"]= $row['wechat_id'];
    $ret[] = $tmp;
    }
    //last row returned
    //print_r($tmp);
    return $ret;
}

//get_profile($sid="72534128");


function upsert_profile($sid="72534128"){
    require_once 'db_conn.php';
    $conn = get_conn();
    // how to connect mysql fast
    $get_timeslot_status= "select * from cca.student_profile where student_id = {$sid}";
    $result = $conn->query($get_timeslot_status);
    // example even for multiple rows
    
    if (!$result) { 
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $ret = array();
    
    // if there is record
    //if (){

    //}
    //else{

    //}
    //last row returned
    //print_r($tmp);
    return $ret;
}


?>