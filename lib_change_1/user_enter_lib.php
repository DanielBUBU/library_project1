<?php
require_once("./DB_config.php");
require_once("./index_menu.html");

if(empty($_POST['id'])){
    die('id is empty');
}
if(empty($_POST['libid'])){
    die('libID is empty');
}

$id=$_POST['id'];
$readerlibid=$_POST['libid'];

$sql="SELECT `R_Identity` FROM `readerinfo` WHERE `R_Identity`='$id' ";
$result = mysqli_query($link,$sql);


        if ($result && mysqli_fetch_assoc($result) && mysqli_fetch_assoc($result)['R_Identity']==$id)
        {
            mysqli_free_result($result);
            $sql="SELECT * FROM `dailyinfo` WHERE D_Exitday IS NULL AND D_Identity='$id'";
            $result = mysqli_query($link,$sql);
            if($result && mysqli_num_rows($result)==0)
            {
                $indate=date("Y-m-n");
                $intime=date("H:i:s");
                mysqli_query($link,"INSERT INTO dailyinfo(D_Identity,D_Day,D_TodayID,D_Entertime) 
    VALUES ('$id','$indate','$readerlibid','$intime')");
                mysqli_query($link,"UPDATE `readerinfo` SET R_LastEnterTime='$indate'
     WHERE R_Identity='$id'");
            }
            else
            {
                die('Reader in library');
            }
        }
        else
        {
            die('Reader no fouund');
        }
        header("Location:./index.php");
?>