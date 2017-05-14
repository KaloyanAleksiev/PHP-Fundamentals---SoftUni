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
        <form action="CarRandomizer.php" method="get">
            Enter cars <input type="text" name="Cars">
            <input type="submit" value="Show result">    
        </form>
        <?php
        if (!empty($_GET['Cars'])) {
            $Cars = $_GET['Cars'];
            $html = '<table>';
            $html .= '<tr><td>Cars</td><td>Color</td><td>Count</td></tr>';
            $arrayCars = explode(",", $Cars);
            $arrayColors = array('yellow', 'green', 'black', 'blue', 'dark blue', 'white', 'red');
            foreach($arrayCars as $car){
                $color = $arrayColors[rand(0, 6)];
                $count = rand(1, 5);
                $html .= "<tr><td>$car</td><td>$color</td><td>$count</td></tr>";
            }

            $html .= '</table>';
            echo $html;
        } else {
            echo "Ivalid Input!";
        }
        ?>
    </body>
</html>
