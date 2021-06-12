
<table>
    <tr><th>ID</th><th>名字</th><th>電話</th><th>生日</th><th>最後進入日期</th><th>合約同意</th><th>同意日期</th>
    <th>最後修改日期</th><th>備註</th><th>修改/刪除</th></tr>
<?php
require_once ("../DB_config.php");
require_once("./admin_auth/admin_session.php");
require_once("./admin_menu.html");



$result=mysqli_query($link,"SELECT * FROM `readerinfo`");

if($result)
{
    while ($result_arr=mysqli_fetch_assoc($result)) 
    {
        $id=$result_arr['R_Identity'];
        $name=$result_arr['R_Name'];
        $telephone=$result_arr['R_Telephone'];
        $BD=$result_arr['R_Birthday'];
        $LET=$result_arr['R_LastEnterTime'];
        $ATC=$result_arr['R_AgreementClause'];
        $AGD=$result_arr['R_AgreeDate'];
        $AD=$result_arr['R_AccessDate'];
        $REM=$result_arr['R_Remark'];
    
        //print_r($result_arr);
        echo "<tr><td>$id</td><td>$name</td><td>$telephone</td><td>$BD</td><td>$LET</td><td>$ATC</td><td>$AGD</td>
        <td>$AD</td><td>$REM</td>
        <td><a href='./edituser.php?id=$id'>修改</a> 
        <a href='./deleteuser.php?id=$id'>刪除</a></td></tr>";
    }
}



?>
</table>
