<?php session_start(); ?>

<style>
    <?php include ".././style/allfile.css";?>
</style>

<?php

$admin_name=$_SESSION['username'];
if($admin_name == null)
{
    header("location:../admin_login.php");
            exit();
}
else
{
    echo"<p>Welcome!$admin_name</p><a id='logout-but' href='./admin_logout.php'>登出</a>";
}


?>