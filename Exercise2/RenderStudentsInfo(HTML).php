<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="get">
            <div>
                Delimiter: 
                <select name="delimiter">
                    <option value=",">,</option>
                    <option value="|">|</option>
                    <option value="&">&</option>
                </select> 
            </div>
            <div>
                Names:
                <input type="text" name="names"/>
            </div>
            <div>
                Ages:
                <input type="text" name="ages"/>
            </div>
            <div>
                <input type="submit" name="filter" value="Filter"/>
            </div>
            <input type="hidden" name="page" value="1" />
        </form>
        <?= $html;?>
    </body>
</html>
