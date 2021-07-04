<?php


    global $_DB;	
    $_DB['host'] = "localhost:3306";
    $_DB['username'] = "root";
    $_DB['password'] = "";
    $_DB['dbname'] = "libraryreaderregister";
    $link = mysqli_connect($_DB['host'],$_DB['username'],$_DB['password'],$_DB['dbname']);

    if($link)
    {
        mysqli_query($link,'SET NAMES uff8');
        //echo "正確連接資料庫";
    }
    else 
    {
        echo "不正確連接資料庫</br>" . mysqli_connect_error();
    }
    
?>