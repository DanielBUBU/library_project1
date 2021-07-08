<?php
require_once("./DB_config.php");

if(empty($_POST['id'])){
    echo "<script>alert('ID為空');window.history.back(-1);</script>";
}
if(empty($_POST['libid'])){
    echo "<script>alert('換証證號為空');window.history.back(-1);</script>";
}

$id=$_POST['id'];
$libid=$_POST['libid'];

$sql="SELECT `R_Identity` FROM `readerinfo` WHERE R_Identity='$id'";
$result = mysqli_query($link,$sql);

if($result&&mysqli_num_rows($result)==1)
{
    $sql="SELECT * FROM `dailyinfo` WHERE D_Exitday IS NULL AND D_Identity='$id'";
    $result = mysqli_query($link,$sql);
    if($result && mysqli_num_rows($result)==0)
    {
        $sql="SELECT * FROM `dailyinfo` WHERE D_Exitday IS NULL AND D_TodayID='$libid'";
        $result = mysqli_query($link,$sql);
        if($result && mysqli_num_rows($result)==0)
        {
            $indate=date("Y-m-n");
            $intime=date("H:i:s");
            mysqli_query($link,"INSERT INTO dailyinfo(D_Identity,D_Day,D_TodayID,D_Entertime) 
        VALUES ('$id','$indate','$libid','$intime')");
            mysqli_query($link,"UPDATE `readerinfo` SET R_LastEnterTime='$indate'
        WHERE R_Identity='$id'");
        }
        else
        {
            echo"<script>alert('換証證號已使用');window.history.back(-1);</script>";
        }
    }
    else
    {
            echo "<script>alert('讀者已在館內');window.history.back(-1);</script>";
    }
}
else
{
    echo '<script>alert("讀者未註冊\n將跳轉至註冊畫面");window.location.assign("./adduserfront.php");</script>';
}
echo '<script>window.location.assign("./")</script>';
?>
