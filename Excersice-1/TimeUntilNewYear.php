<?php
date_default_timezone_set('Europe/Sofia');
$currentDateTemp = getdate();
$currentDateTemp = mktime($currentDateTemp['hours'], $currentDateTemp['minutes'], $currentDateTemp['seconds'], $currentDateTemp['mon'], $currentDateTemp['mday'], $currentDateTemp['year']);
$currentDate = new DateTime();
$currentDate->setTimestamp($currentDateTemp);
$newYear = new DateTime(date("2018-1-1 0:0:0"));
$differenceInSeconds = $newYear->getTimestamp() - $currentDate->getTimestamp();
echo $differenceInSeconds. ' seconds <br />';

echo round(($differenceInSeconds / 60)). ' minutes <br />';

echo round((($differenceInSeconds / 60) /60)). ' hours <br />';

echo round(((($differenceInSeconds / 60) /60) /24)). ' days <br />';
$diff= date_diff($currentDate,$newYear);
//$interval = new DateInterval($diff);
echo $diff->format('Days:Hours:Minutes:Seconds %a:%h:%i:%s');