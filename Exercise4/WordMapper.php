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
                <input type="submit" name="count" value="Count words"/>
            </div>
        </form>
        <?php
        $stringInput = $_GET['input'];
        $stringInputToLower = strtolower($stringInput);
        $stringInputToLower = preg_replace('/([^a-z])/', ' ', $stringInputToLower);
        $arrayInput = preg_split('/\s+/', trim($stringInputToLower));
        $coutingArray = [];
        $html = "<table border='2'>";
        foreach ($arrayInput as $word) {
            if (array_key_exists($word, $coutingArray)) {
                $coutingArray[$word] ++;
            } else {
                $coutingArray[$word] = 1;
            }
        }
        foreach ($coutingArray as $key => $value) {
            $html .= "<tr><td>$key</td><td>$value</td></tr>";
        }
        $html .= '</table>';
        echo $html;
        ?>
    </body>
</html>
