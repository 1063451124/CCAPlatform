<?php
////
//author sunyt
//func get timeslot of a single day
////

function get_timeslot_status($date="20230301"){
    require_once 'db_conn.php';
    $conn = get_conn();
    // how to connect mysql fast
    $get_timeslot_status= "select a.*,b.industries as industry from (select coach, timeslot,date_timeslot, booker,case booker when booker 
    then 'booked' else 'available selectable' end as coach_status from cca.timeslots where book_date={$date}) a left join 
    (SELECT name, industries FROM cca.coach) b on b.name = a.coach;";
    $result = $conn->query($get_timeslot_status);
    // example even for multiple rows
    
    if (!$result) { 
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $ret = array();
    
    while ($row = mysqli_fetch_assoc($result))
    {
    $tmp = array();
    $tmp["coach"] = $row['coach'];
    $tmp["timeslot"] = $row['timeslot'];
    $tmp["status"] = $row['coach_status'];
    $tmp["industry"] = $row['industry'];
    $tmp["booker"] = $row['booker'];
    $tmp["date_timeslot"] = $row['date_timeslot'];
    $ret[] = $tmp;
    }
    //last row returned
    #print_r($ret);
    return $ret;
}


function get_booked($snumber){
    //require_once 'db_conn.php';
    $conn = get_conn();
    // how to connect mysql fast
    $get_timeslot_status= "select date_format(concat(date_timeslot,'00'), '%Y-%m-%d %H:%i:%s') as lastdate from timeslots where booker = {$snumber};";
    $result = $conn->query($get_timeslot_status);
    // example even for multiple rows
    
    if (!$result) { 
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    $ret = array();
    
    while ($row = mysqli_fetch_assoc($result))
    {
    $tmp = array();
    $tmp["lastdate"] = $row['coach'];
    $ret[] = $tmp;
    }
    //last row returned
    #print_r($ret);
    return $ret;
}
?>