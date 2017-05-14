<?php
$largest = intval(fgets(STDIN));
while ($number = intval(fgets(STDIN))){
    $largest = max($largest, $number);
}
echo "Max: $largest";
