<?php
    require_once("./index_menu.html");
?>

<!DOCTYPE html>
<html lang="ch-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="POST" action="./admin_sys/admin_auth/admin_login_check.php">
        管理員帳號:<input name="admin_ac" type="text" />
        <br> 密碼:
        <input name="admin_ps" type="password" />
        <br>
        <input type="submit" value="Login" />
    </form>
</body>

</html>