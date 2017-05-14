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
        <form action="StringModifier.php" method="get">
            <input type="text" name="theString">
            <input type="radio" name="Modify" value="Palindrome">Check Palindrome
            <input type="radio" name="Modify" value="Reverse">Reverse String
            <input type="radio" name="Modify" value="Split">Split
            <input type="radio" name="Modify" value="Hash">Hash String
            <input type="radio" name="Modify" value="Shuffle">Shuffle String
            <input type="submit" value="Submit">    
        </form>
        <?php
        if (!empty($_GET['theString']) && !empty($_GET['Modify'])) {
            $theString = $_GET['theString'];
            $Modify = $_GET['Modify'];
            switch ($Modify) {
                case 'Palindrome':
                    $reverseTheString = strrev($theString);
                    if($reverseTheString == $theString){
                        echo "$theString is a palindrome!";
                    }else{
                        echo "$theString is not a palindrome!";
                    }
                    break;
                case 'Reverse':
                    $theReversedString = strrev($theString);
                    echo $theReversedString;
                    break;                    
                case 'Split':
                    $split = str_split($theString);
                    foreach ($split as $letter) {
                        if($letter != ' '){
                            echo "$letter ";
                        }
                    }
                    break;
                case 'Hash':
                    $hash = crypt($theString, '');
                    echo $hash;
                    break;
                case 'Shuffle':
                    $shuffled = str_shuffle($theString);
                    echo $shuffled;
                    break;
                default:
                    echo 'Ivalid Input!';
            }
        } else {
            echo "Ivalid Input!";
        }
        ?>
    </body>
</html>
