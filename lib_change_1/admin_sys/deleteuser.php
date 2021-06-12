<?php
require_once ("../DB_config.php");
require_once("./admin_auth/admin_session.php");

//排空錯誤
if(empty($_GET['id'])){
    die('id is empty');
}

$id=$_GET['id'];

//刪除指定資料
mysqli_query($link,"DELETE FROM `readerinfo` WHERE R_Identity='$id'");

header("Location:alluser.php");

