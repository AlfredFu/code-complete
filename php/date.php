<?php

/*
 *计算日期差异
 */
date_default_timezone_set("Asia/Calcutta");

function dt_differ($start, $end){
  $start = date("G:i:s:m:d:Y", strtotime($start));
  $date1=explode(":", $start);

  $end  = date("G:i:s:m:d:Y", strtotime($end));
  $date2=explode(":", $end);
	
  $starttime = mktime(date($date1[0]),date($date1[1]),date($date1[2]),
  date($date1[3]),date($date1[4]),date($date1[5]));
  $endtime   = mktime(date($date2[0]),date($date2[1]),date($date2[2]),
  date($date2[3]),date($date2[4]),date($date2[5]));

  $seconds_dif = $starttime-$endtime;

  return $seconds_dif;
}


/*
 *转换秒到日期、时或者分     
 */
function seconds2days($mysec) {
    $mysec = (int)$mysec;
    if ( $mysec === 0 ) {
        return '0 second';
    }

    $mins  = 0;
    $hours = 0;
    $days  = 0;


    if ( $mysec >= 60 ) {
        $mins = (int)($mysec / 60);
        $mysec = $mysec % 60;
    }
    if ( $mins >= 60 ) {
        $hours = (int)($mins / 60);
        $mins = $mins % 60;
    }
    if ( $hours >= 24 ) {
        $days = (int)($hours / 24);
        $hours = $hours % 60;
    }

    $output = '';

    if ($days){
        $output .= $days." days ";
    }
    if ($hours) {
        $output .= $hours." hours ";
    }
    if ( $mins ) {
        $output .= $mins." minutes ";
    }
    if ( $mysec ) {
        $output .= $mysec." seconds ";
    }
    $output = rtrim($output);
    return $output;
}


/*
 *根据生日计算年龄
 */
function age_from_dob($dob){
$dob = strtotime($dob);
$y = date('Y', $dob);
 if (($m = (date('m') - date('m', $dob))) < 0) {
  $y++;
 } elseif ($m == 0 && date('d') - date('d', $dob) < 0) {
  $y++;
 }
return date('Y') - $y;
}

echo age_from_dob('2005/04/19'); //date in yyyy/mm/dd format.
