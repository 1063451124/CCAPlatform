<?php
////
//author sunyt
//func get timeslot of a single day
////

function get_timeslot_status($date="20230301"){
    require_once 'db_conn.php';
    $conn = get_conn();
    // how to connect mysql fast
    $get_timeslot_status= "select a.*,b.industries as industry from (select coach, timeslot, booker,case booker when booker then 'booked' else 'available selectable' end as coach_status from cca.timeslots where book_date={$date}) a left join (SELECT name, industries FROM cca.coach) b on b.name = a.coach;";
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
    $ret[] = $tmp;
    }
    //last row returned
    #print_r($ret);
    return $ret;
}

function verify(){
    include "public/KgCaptchaSDK.php";
// 填写你的 AppId，在应用管理中获取
$appId = "xxx";
// 填写你的 AppSecret，在应用管理中获取
$appSecret = "W68oJi0iqT2C3BFRGirO1IaYCDvsYEED";
$request = new kgCaptcha($appId, $appSecret);
// 填写应用服务域名，在应用管理中获取
$request->appCdn = "https://cdn.kgcaptcha.com";
// 前端验证成功后颁发的 token，有效期为两分钟
$request->token = $_POST["kgCaptchaToken"];
// 当安全策略中的防控等级为3时必须填写
$request->userId = "kgCaptchaDemo";
// 请求超时时间，秒
$request->connectTimeout = 10;
$requestResult = $request->sendRequest();
if ($requestResult->code === 0) {
    // 验签成功逻辑处理
    echo "验证通过";
} else {
    // 验签失败逻辑处理
    echo "验证失败，错误代码：{$requestResult->code}， 错误信息：{$requestResult->msg}";
}
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