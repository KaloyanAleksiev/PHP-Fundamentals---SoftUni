<!DOCTYPE html>
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
        <?php
        $summary = 0;
        $html = '<table>';
        $html .= '<tr><td>Number</td><td>Square</td></tr>';
        for ($i = 0; $i <= 100;  ++$i){
            if($i%2==0){
                $html .= "<tr><td>$i</td>";
                $squareRoot = round(sqrt($i), 2);
                $html .= "<td>$squareRoot</td></tr>";
                $summary = $summary + $squareRoot;
            }
        }
        $html .= "<tr><td>Tatal: </td><td>$summary</td></tr>";
        $html .= '</table>';
        echo $html;
        ?>
    </body>
</html>
