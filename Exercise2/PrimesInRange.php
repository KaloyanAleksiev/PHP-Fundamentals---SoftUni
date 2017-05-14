<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="PrimesInRange.php" method="get">
            Starting index: <input type="text" name="Start">
            End: <input type="text" name="End">
            <input type="submit" value="Submit">    
        </form>
        <?php
        function isPrime($num) {
            if ($num == 1) {
                return false;
            }
            if ($num == 2) {
                return true;
            }
            if ($num % 2 == 0) {
                return false;
            }
            for ($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
                if ($num % $i == 0)
                    return false;
            }
            return true;
        }
        if (!empty($_GET['Start']) && !empty($_GET['End']) && is_numeric($_GET['Start']) && is_numeric($_GET['End'])) {
            $theStart = $_GET['Start'];
            $theEnd = $_GET['End'];
            $allNumbers = '';
            for ($i = $theStart; $i <= $theEnd; ++$i) {
                if (isPrime($i)) {
                    $allNumbers .= "<b>$i</b>";
                } else {
                    $allNumbers .= "$i";
                }
                if($i != $theEnd ){
                    $allNumbers .= ', ';
                }
            }
            echo $allNumbers;
        } else {
            echo "Ivalid Input!";
        }
        ?>
    </body>
</html>
