<style>
    <?php  include "../style/list.css"?>
</style>

<?php
require_once("../DB_config.php");

if(empty($_GET['libid'])){
    echo"<script>alert('換証證號為空');window.history.back(-1);</script>";
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
    echo '<script>alert("此人未在圖書館內");window.location.assign("../adduser.html");</script>';
}
echo '<script>window.location.assign("./")</script>';
