<?php
$DumpVariable = (object)[2,34];
if(!is_numeric($DumpVariable)){
    $typeOfDump = gettype($DumpVariable);
    echo $typeOfDump;
}else{
var_dump($DumpVariable);
}