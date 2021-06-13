<?php
require_once ("../DB_config.php");
require_once("./admin_auth/admin_session.php");
require_once("./admin_menu.html");


if(!isset($_POST['name'])){
    die('name is not define');
}
if(!isset($_POST['id'])){
    die('id is not define');
}
if(!isset($_POST['libid'])){
    die('libid is not define');
}
if(!isset($_POST['telephone'])){
    die('phone is not define');
}
if(!isset($_POST['birthday'])){
    die('BD is not define');
}
if(!isset($_POST['agreementclause'])){
    die('agreementclause is not define');
}
if(!isset($_POST['remark'])){
    die('remark is not define');
}


$name=$_POST['name'];
$id=$_POST['id'];
$phone=$_POST['telephone'];
$bd=$_POST['birthday'];
$ATC=$_POST['agreementclause'];
$REM=$_POST['remark'];
$libid=$_POST['libid'];

if(empty($name)){
    echo "<script>alert('讀者姓名未輸入');window.history.back(-1);</script>";
}
if(empty($id)){
    echo "<script>alert('讀者ID未輸入');window.history.back(-1);</script>";
}
if(empty($phone)){
    echo "<script>alert('讀者電話未輸入');window.history.back(-1);</script>";
}
if(empty($bd)){
    echo "<script>alert('讀者生日未輸入');window.history.back(-1);</script>";
}
if(empty($libid)){
    echo "<script>alert('讀者換証證號未輸入');window.history.back(-1);</script>";
}


$result=mysqli_query($link,"SELECT * FROM `readerinfo` WHERE R_Identity='$id'");

//$phone=intval($phone);
//插入資料
if($result)
{
    $dataCount=mysqli_num_rows($result);
    if($dataCount==0)
    {
        $LET=date("Y-m-d");
        $AGD=$LET;
        $AD=$LET;
        $indate=date("Y-m-n");
        $intime=date("H:i:s");
        mysqli_query($link,"INSERT INTO readerinfo(R_Identity,R_Name,R_Telephone,R_Birthday,R_LastEnterTime,R_AgreementClause,R_AgreeDate,R_AccessDate,R_Remark) 
VALUES ('$id','$name','$phone','$bd','$LET','$ATC','$AGD','$AD','$REM')");
        mysqli_query($link,"INSERT INTO dailyinfo(D_Identity,D_Day,D_TodayID,D_Entertime) 
VALUES ('$id','$indate','$libid','$intime')");
    }
    else
    {
        echo "<script>alert('讀者ID已存在');window.history.back(-1);</script>";
    }
}
else
{
    echo "<script>alert('資料庫存取錯誤');window.history.back(-1);</script>";
}

mysqli_free_result($result);


//返回列表頁面
 //header("Location:./alluser.php");
