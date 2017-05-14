<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table, th, td {
                border: 1px solid;
            }
        </style>
    </head>
    <body>  
        <form method="get">
            <div>
                <textarea type="text" name="input"></textarea>
            </div>
            <div>
                <input type="submit" name="color" value="Color Text"/>
            </div>
        </form>
        <?php
            $stringInput = $_GET['input'];
            $stringInputTextOnly = preg_replace('/()\s+/', '', $stringInput);
            $arrayInput = preg_split('//', $stringInputTextOnly, -1, PREG_SPLIT_NO_EMPTY);
            $html = '';
            foreach ($arrayInput as $letter) {
                $color = 'blue';
                if (ord($letter) % 2 == 0) {
                    $color = 'red';
                }
                $html .= "<font color='$color'>$letter </font>";
            }
            echo $html;
        
        ?>
    </body>
</html>
