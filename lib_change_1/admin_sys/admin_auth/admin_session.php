<?php session_start(); ?>


<?php

$admin_name=$_SESSION['username'];
if($admin_name == null)
{
    header("location:./admin_login.html");
            exit();
}
else
{
    echo"<p>Welcome!$admin_name</p><a href='./admin_logout.php'>登出</a>";
}


?>