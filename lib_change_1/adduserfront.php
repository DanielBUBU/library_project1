<?php
require_once("./index_menu.html")
?>

<!DOCTYPE html>
<html lang="ch-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="lib_add_user" content="width=device-width, initial-scale=1.0">
</head>



<body>
    <form action="./adduser.php" method="post">
        <p>日期格式為(YYYY-MM-DD)</p>
        <ul>
            <li><label>ID</label><input type="text" name="id"></li>
            <li><label>換証證號</label><input type="text" name="libid"></li>
            <li><label>名稱</label><input type="text" name="name"></li>
            <li><label>電話</label><input type="text" name="telephone"></li>
            <li><label>生日</label><input type="text" name="birthday"></li>
            <li><label>是否同意合約</label><input type="text" name="agreementclause"></li>
            <li><label>備註</label><input type="text" name="remark"></li>
            <li><input type="submit" value="提交"></li>
        </ul>
    </form>
</body>

</html>