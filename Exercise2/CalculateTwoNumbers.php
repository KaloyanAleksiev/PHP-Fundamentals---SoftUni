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
        <form method="get">
            <div>
                Operation:
                <select name="operation">
                    <option value="sum">Sum</option>
                    <option value="subtract">Subtract</option>
                </select>
            </div>
            <div>
                Number 1:
                <input type="text" name="number_one"/>
            </div>
            <div>
                Number 2:
                <input type="text" name="number_two"/>
            </div>
            <div>
                <input type="submit" name="calculate" value="Calculate!"/>
            </div>
        </form>
        <?php
        if (isset($_GET['calculate'])) {
            $operation = $_GET['operation'];
            $numberOne = $_GET['number_one'];
            $numberTwo = $_GET['number_two'];
            if ($operation == "sum") {
                echo "==" . ($numberOne + $numberTwo);
            } else if ($operation == "subtract") {
                echo "==" . ($numberOne - $numberTwo);
            } else {
                echo "Invalid operation supplied";
            }
        }
        ?>
    </body>
</html>
