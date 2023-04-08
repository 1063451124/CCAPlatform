<?php
#TODO: fixed input
function get_timeslot_status($date="20230301"){
    require_once 'db_conn.php';
    $conn = get_conn();
    // how to connect mysql fast
    $get_timeslot_status= "select coach, timeslot, case booker when booker then 'booked' else 'available' end as status from cca.timeslots where book_date={$date}";
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
    $tmp["status"] = $row['status'];
    $ret[] = $tmp;
    }
    //last row returned
    #print_r($ret);
    return $ret;
}

?>