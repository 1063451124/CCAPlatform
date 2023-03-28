<?php


function get_month_status($month, $year){
require 'db_conn.php';
$conn = get_conn();
// how to connect mysql fast
$get_calendar_status = "select JSON_OBJECTAGG(book_date,available) as ret from (select book_date,10 - sum(booker) as available from (SELECT book_date, case booker when booker then '1' else '0' end as booker FROM 
cca.timeslots where book_date like '".$year.$month."%') each_day group by book_date) fn;";
$result = $conn->query($get_calendar_status);
// example even for multiple rows
while ($row = mysqli_fetch_assoc($result))
 {
//print_r($row['ret']);
$ret = $row['ret'];
 }
 //last row returned
return $ret;
}
?>