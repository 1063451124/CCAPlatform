<?php
      //////////////////////////////////////
      //author: sunyt、
      //function: render calendar with data from model
      //////////////////////////////////////
	  require('calendar_model.php');
function build_calendar($month, $year) {

	
	$status = json_decode(get_month_status($month, $year),true);
	$daysOfWeek = array('S','M','T','W','T','F','S');
	$firstDayOfMonth = mktime(0,0,0,$month,1,$year);
	$numberDays = date('t',$firstDayOfMonth);
	$dateComponents = getdate($firstDayOfMonth);
	$monthName = $dateComponents['month'];
	$dayOfWeek = $dateComponents['wday'];
	$calendar = "<table class='calendar table table-bordered'>";
	$calendar .= "<caption  id = 'tbs'>$monthName $year</caption>";
	$calendar .= "<tr>";
	foreach($daysOfWeek as $day) {
		$calendar .= "<th class='header'>$day</th>";
	}
	$currentDay = 1;
	$calendar .= "</tr><tr>";
	if ($dayOfWeek > 0) {
		$calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
	}
	$month = str_pad($month, 2, "0", STR_PAD_LEFT);
	//print_r($status);
	while($currentDay <= $numberDays){
		if($dayOfWeek == 7){
			$dayOfWeek = 0;
			$calendar .= "</tr><tr>";
		}
		$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
		$date = "$year-$month-$currentDayRel";
		$datekey = "$year$month$currentDayRel";
		//print($datekey);
		//$datekey = (string)$datekey;

		// what is the status? by sunyt TODO: ajax & <a> link
		if( array_key_exists($datekey,$status) == true){
			if ($datekey <= date('Ymd')){
				$style_date = 'unselectable';
			}
			elseif ($status[$datekey] == 0){
				$style_date = 'table-danger day selectable';
			}
			elseif($status[$datekey] == 10){
				$style_date = 'table-success day selectable';
			}
			else{
				$style_date = 'table-warning day selectable';
			}
		}
		else{
			$style_date = '';
		}

		// Is this today? by sunyt
		if(date('Y-m-d') == $date) {
			$calendar .= "<td class='success $style_date' rel='$date'><b>$currentDay</b></td>";
		} else {
			$calendar .= "<td class='$style_date' rel='$date'>$currentDay</td>";
		}

		$currentDay++;
		$dayOfWeek++;
	}
	if($dayOfWeek != 7){
		$remainingDays = 7 - $dayOfWeek;
		$calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
	}
	$calendar .= "</tr>";
	$calendar .= "</table>";
	return $calendar;
}

function get_lastdate($sid){
	//require_once('calendar_model.php');
	echo get_last_date($sid);
	
}
  
?>