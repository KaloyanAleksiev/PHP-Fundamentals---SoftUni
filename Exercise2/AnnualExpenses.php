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
        <form action="AnnualExpenses.php" method="get">
            Enter number of years <input type="text" name="Years">
            <input type="submit" value="Show costs">    
        </form>
        <?php
        if (!empty($_GET['Years'])) {
            $Years = $_GET['Years'];
            $html = '<table>';
            
            $html .= '<tr><td>Year</td>';
            $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            foreach ($months as $month) {
               $html .= "<td>$month</td>";
            }
            $html .= '<td>Total</td></tr>';
            
            $currentYear = 2017;
            for($i=0; $i<$Years; ++$i){
                $Year = $currentYear - $i;
                $html .= "<tr><td>$Year</td>";
                $totalCosts = 0;
                for($k=1; $k<=12; ++$k){
                    $cost = rand(0,999);
                    $html .= "<td>$cost</td>";
                   $totalCosts = $totalCosts + $cost;
                }
                $html .= "<td>$totalCosts</td></tr>";
                    
            }

            $html .= '</table>';
            echo $html;
        } else {
            echo "Ivalid Input!";
        }
        ?>
    </body>
</html>
