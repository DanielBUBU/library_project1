<?php
require_once ("../DB_config.php");
require_once("./admin_auth/admin_session.php");

if(empty($_POST['originalid'])){
    die('Original id is empty');
}
if(empty($_POST['id'])){
    die('id is empty');
}
if(empty($_POST['name'])){
    die('name is empty');
}
if(empty($_POST['telephone'])){
    die('telephone is empty');
}
if(empty($_POST['birthday'])){
    die('birthday is empty');
}
if(empty($_POST['agreementclause'])){
    die('AgreementClause is empty');
}
if(empty($_POST['agreedate'])){
    die('AgreeDate is empty');
}


$Orid=$_POST['originalid'];
$id=$_POST['id'];
$name=$_POST['name'];
$telephone=$_POST['telephone'];
$BD=$_POST['birthday'];
$ATC=$_POST['agreementclause'];
$AGD=$_POST['agreedate'];
$AD=date("Y-m-d");
$REM=$_POST['remark'];


//修改指定資料

if(!mysqli_query($link,"UPDATE `readerinfo` SET R_Identity='$id',R_Name='$name',R_Telephone='$telephone',R_Birthday='$BD'
,R_AgreementClause='$ATC',R_AgreeDate='$AGD',R_AccessDate='$AD',R_Remark='$REM'
 WHERE R_Identity='$Orid'")
)
{
    die('Edit Fail');
}



header("Location:./alluser.php");
