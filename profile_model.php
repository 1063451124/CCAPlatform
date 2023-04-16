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
    $tmp["cv"] = $row['cv'];
    $tmp["wechat_id"]= $row['wechat_id'];
    $tmp["purpose"]= $row['purpose'];
    $ret[] = $tmp;
    }
    $conn->close();
    //last row returned
    //print_r($tmp);
    return $ret;
}

//get_profile($sid="72534128");


function upsert_profile($POST,$FILES){
    session_start();
    require_once 'db_conn.php';
    $conn = get_conn();
    // how to connect mysql fast
PRINT_R($FILES["CV"]);
    if ($FILES["CV"]["error"] > 0)
    {
        $POST['CV'] = "";
    }
    else
    {
        $POST['CV'] = file_get_contents($FILES["CV"]["tmp_name"]);
    }
    echo $FILES["CV"]['type'];
    //echo "<img src='data:image/png;base64,".base64_encode($POST['CV'])."'  class='image rounded mx-auto d-block'>";
    $update_profile= "insert INTO `cca`.`student_profile` (`student_id`, `first_name`, `last_name`, `hk_mobile_no`, `cityu_email`, `work_location`, `wechat_id`, `purpose`,`file_type`,`cv`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?,?,?) on duplicate key update
     first_name = values(first_name),
      last_name = values(last_name),
       hk_mobile_no = values(hk_mobile_no),
        cityu_email = values(cityu_email),
         work_location = values(work_location),
           wechat_id = values(wechat_id),
            purpose = values(purpose),
            cv = values(cv),
            file_type = values(file_type)
    ";
    //echo($_SESSION["username"]);
    //print_r($POST);
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $update_profile);
    mysqli_stmt_bind_param($stmt, 'ssssssssss', $_SESSION["username"], 
    $POST['FirstName'],$POST['LastName'], $POST['HKMobile'],$POST['CityUEmail'],
    $POST['destination'],$POST['WechatID'],$POST['purpose'],$FILES["CV"]['type'],$POST['CV']);
    //print($update_profile);
    //$result = $conn->query($update_profile);
    // example even for multiple rows
    echo(mysqli_stmt_execute($stmt));
     
    $conn->close();
    
    // if there is record
    //if (){

    //}
    //else{

    //}
    //last row returned
    //print_r($tmp);
    return $ret;
}

if ( ! empty($_POST['action'])){
    $action  =  $_POST['action'];
    //print($action);
     // 判断函数是否存在
     if ($action == 'Update'){
        upsert_profile($_POST,$_FILES);
    }
}
?>