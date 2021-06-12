<?php
require_once ("./DB_config.php");


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
    die('name is empty');
}
if(empty($id)){
    die('id is empty');
}
if(empty($phone)){
    die('phone is empty');
}
if(empty($bd)){
    die('bd is empty');
}
if(empty($ATC)){
    die('agreementclause is empty');
}
if(empty($libid)){
    die('libid is empty');
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
        mysqli_query($link,"INSERT INTO readerinfo(R_Identity,R_Name,R_Telephone,R_Birthday,R_LastEnterTime,R_AgreementClause,R_AgreeDate,R_AccessDate) 
VALUES ('$id','$name','$phone','$bd','$LET','$ATC','$AGD','$AD')");
        mysqli_query($link,"INSERT INTO dailyinfo(D_Identity,D_Day,D_TodayID,D_Entertime) 
VALUES ('$id','$indate','$libid','$intime')");
    }
    else
    {
        die('id is existed');
    }
}
else
{
    die('result is not existed');
}

mysqli_free_result($result);


//返回列表頁面
 header("Location:./index.php");
