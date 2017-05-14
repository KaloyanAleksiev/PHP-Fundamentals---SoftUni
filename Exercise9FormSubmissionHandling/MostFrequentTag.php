<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div><b>Enter Tags:</b></div>
        <form  method="get">
            <input name='tags'>
            <input type="submit" value="Submit" name="submit">
            <input type="submit" value="Clear" name="clear">
        </form>
        <?php
        if (isset($_GET['clear'])) {
            header("Location: MostFrequentTag.php");
            exit;
        }
        if (!empty($_GET['tags']) && isset($_GET['submit'])) {
            $tagsString = $_GET['tags'];
            $tagsArray = explode(', ', $tagsString);
            $orderedArray = [];
            foreach ($tagsArray as $key => $value) {
                if (array_key_exists($value, $orderedArray)) {
                    $orderedArray[$value] ++;
                } else {
                    $orderedArray[$value] = 1;
                }
            }

            arsort($orderedArray);
            
            foreach ($orderedArray as $key => $value) {
                echo $key . ' : ' . $value . ' times<br />';
            }
            
             echo 'Most Frequent Tag is: '. key($orderedArray); 
             
        }
        ?>
    </body>
</html>
