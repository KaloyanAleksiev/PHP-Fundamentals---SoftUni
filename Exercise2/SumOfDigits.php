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
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="SumOfDigits.php" method="get">
            Input string: <input type="text" name="theString">
            <input type="submit" value="Submit">    
        </form>
        <?php
        if (!empty($_GET['theString'])) {
            $theStrings = $_GET['theString'];
            $html = '<table>';
            $arrayStrings = explode(",", $theStrings);
            foreach ($arrayStrings as $String) {
                $html .= "<tr><td>$String</td>";
                if (is_numeric($String)) {
                    $summary = 0;
                    for($i=0; $i<strlen($String); ++$i){
                        $summary = $summary + $String[$i];
                    }
                    $html .= "<td>$summary</td></tr>";
                } else {
                    $html .= '<td>I cannot sum that</td></tr>';
                }
            }
            $html .= '</table>';
            echo $html;
        } else {
            echo "Ivalid Input!";
        }
        ?>
    </body>
</html>
