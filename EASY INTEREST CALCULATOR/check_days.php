<?php
#$date1=new DateTime("2007-03-24");
$date3=date("Y-m-d");
$date2=new DateTime("2009-11-21");
$date1=new DateTime("$date3");
#echo $date1;
#echo $date2;
$interval=$date1->diff($date2);
echo "difference  ".$interval->y."years ".$interval->m." months  ".$interval->d."  days <br>";
echo "difference ".$interval->days."days<br>";
echo $interval->days/30;
?>

