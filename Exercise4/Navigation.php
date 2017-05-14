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
                Categories: <input type="text" name="categories"/>
            </div>
            <div>
                Tags: <input type="text" name="tags"/>
            </div>
            <div>
                Months: <input type="text" name="months">
            </div>
            <div>
                <input type="submit" name="submit" value="Generate"/>
            </div>
        </form>
        <?php
        if (isset($_GET['submit'])) {
            $categories = $_GET['categories'];
            $tags = $_GET['tags'];
            $months = $_GET['months'];

            function unOrderedList(string $theList) {
                $arrayList = explode(", ", $theList);
                foreach ($arrayList as $item) {
                    echo "<li>$item</li>";
                }
            }

            echo "<h2>Categories</h2><ul>";
            unOrderedList($categories);
            echo "</ul><h2>Tags</h2><ul>";
            unOrderedList($tags);
            echo "</ul><h2>Months</h2><ul>";
            unOrderedList($months);
            echo "</ul>";
        }
        ?>
    </body>
</html>
