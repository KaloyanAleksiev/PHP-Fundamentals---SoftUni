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
                border: 3px solid black;
            }
        </style>
    </head>
    <body>
        <?php
        $Name = '<b>Gosho</b>';
        $Phone = '0882-321-423';
        $Age = '24';
        $Address = 'Hadji Dimitar';
        ?>
        <table>
            <tr>
                <td>Name</td>
                <?php
                echo "<td>$Name</td>"
                ?>
            </tr>
            <tr>
                <td>Phone Number</td>
                <?php
                echo "<td>$Phone</td>"
                ?>
            </tr>
            <tr>
                <td>Age</td>
                <?php
                echo "<td>$Age</td>"
                ?>
            </tr>
            <tr>
                <td>Address</td>
                <?php
                echo "<td>$Address</td>"
                ?>
            </tr>
        </table>
    </body>
</html>
