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
    <form action="GetFormData.php" method="get">
        Name :  <input type="text" name="name"><br>
        Age : <input type="text" name="age"><br>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="submit">

    </form>
    <body>
        <?php
        if (!empty($_GET['name']) && !empty($_GET['age']) && !empty($_GET['gender'])) {
            $Name = $_GET['name'];
            $Age = $_GET['age'];
            $Gender = $_GET["gender"];
            //echo $Name . $Email . $Address. $Gender;
             echo "My name is {$Name}. I am {$Age} years old. I am {$Gender}.";
        }else{
            echo "Ivalid Input!";
        }
        ?>
    </body>
</html>
