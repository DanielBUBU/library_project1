<?php
    require_once("./index_menu.html");
?>

<!DOCTYPE html>
<html lang="ch-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="user_exit_lib" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form action="./user_left_lib.php" method="GET">
        <ul>
            <li><label>換証證號</label><input type="text" name="libid"></li>
        </ul>
        <input type="submit" class="submit_but" value="提交">
    </form>
</body>

</html>