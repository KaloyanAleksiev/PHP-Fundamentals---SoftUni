<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div><b>Enter Tags:</b></div>
        <form method="get">
            <input name='tags'>
            <input type="submit">
        </form>
        <?php
        if(isset($_GET['tags'])){
            $tagsString = $_GET['tags'];
            $tagsArray = explode(',', $tagsString);
            foreach ($tagsArray as $key => $value) {
                echo $key.' : '.$value.'<br />';
            }
            
        }
        ?>
    </body>
</html>
