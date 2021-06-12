<?php
require_once("../DB_config.php");
require_once("./admin_menu.html");

if(empty($_GET['libid'])){
    die('libID is empty');
}
$libid=$_GET['libid'];

$sql="SELECT * FROM `dailyinfo` WHERE D_TodayID='$libid'";
$result = mysqli_query($link,$sql);

if($result && mysqli_num_rows($result)!=0)
{
    $outdate=date("Y-m-n");
    $outtime=date("H:i:s");
    mysqli_query($link,"UPDATE `dailyinfo` SET D_Exitday='$outdate',D_Exittime='$outdate'
    WHERE D_TodayID='$libid'");

}
else
{
    die('libID not found');
}
header("Location:./alluser.php");
