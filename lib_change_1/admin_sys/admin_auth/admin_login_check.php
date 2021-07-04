<?php session_start(); ?>

<?php
    require_once ('../../DB_config.php');

        $login_data=$_POST;
        $admin_ac=$login_data['admin_ac'];
        $admin_ps=$login_data['admin_ps'];
        $sql="SELECT `password` FROM `passworddata` WHERE `user_id`='$admin_ac' ";
        $result = mysqli_query($link,$sql);


        if ($result && mysqli_fetch_assoc($result)['password']==$admin_ps)
        {
            $_SESSION['username'] = $admin_ac;
            header("location:../");
            exit();
        }
        else
        {
            
            header("location:../admin_login.php");
            exit();
        }
 ?>