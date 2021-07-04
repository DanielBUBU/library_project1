<?php
    require_once("./index_menu.html");
?>

<!DOCTYPE html>
<html lang="ch-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="user_enter_lib" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form action="./user_enter_lib.php" method="post">
        <ul>
            <li><label>讀者ID</label><input type="text" name="id"></li>
            <li><label>換証證號</label><input type="text" name="libid"></li>
            <li><input type="submit" value="提交"></li>
        </ul>
        
        
        
    </form>
</body>

</html>