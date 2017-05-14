<?php
$startDate = mktime(0,0,0,8,1,2014);
$endDate = mktime(12, 59, 59, 8, 31, 2014);
for($i=$startDate; $i<$endDate; $i+=86400){
    $Sunday = date("l", $i);
    if($Sunday == 'Sunday'){
     echo date('jS F, Y', $i).'<br />';
    }
}
///echo $currentDate;
//echo "Created date is " . date("Y-m-d h:i:sa", $d);