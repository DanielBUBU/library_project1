<?php
require_once ("../DB_config.php");
require_once("./admin_auth/admin_session.php");
require_once("./admin_menu.html");


if(!empty($_GET['id']))
{


        //查詢id
        $id=$_GET['id'];
        $result=mysqli_query($link,"SELECT * FROM `readerinfo` WHERE R_Identity='$id'");
        //獲取結果陣列
        $result_arr=mysqli_fetch_assoc($result);
        mysqli_free_result($result);
}
else
{
        die('id not define');
}
?>
<form id="userform" action="edituser_server.php" method="post">
        <p>日期格式為(YYYY-MM-DD)</p>
        <input name="originalid" type="hidden" value="<?php echo $id ?>">
        <label>ID</label><input id="identity" type="text" name="id" value="<?php echo $result_arr['R_Identity']?>">
        <label>名稱</label><input type="text" name="name" value="<?php echo $result_arr['R_Name']?>">
        <label>電話</label><input type="text" name="telephone" value="<?php echo $result_arr['R_Telephone']?>">
        <label>生日</label><input type="text" name="birthday" value="<?php echo $result_arr['R_Birthday']?>">
        <label>最後進入時間</label><?php echo $result_arr['R_LastEnterTime']?>
        <label>是否同意合約</label><input type="text" name="agreementclause" value="<?php echo $result_arr['R_AgreementClause']?>">
        <label>同意日期</label><input type="text" name="agreedate" value="<?php echo $result_arr['R_AgreeDate']?>">
        <label>最後修改日期</label><?php echo $result_arr['R_AccessDate']?>
        <label>備註</label><input type="text" name="remark" value="<?php echo $result_arr['R_Remark']?>">
        <input id="submit" type="submit" value="提交修改">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
        
// 驗證中文名稱
function isChinaName(name) {
var pattern = /^[\u4E00-\u9FA5]{1,6}$/;
return pattern.test(name);
}
// 驗證手機號
function isPhoneNo(phone) { 
var pattern = /^1[34578]\d{9}$/; 
return pattern.test(phone); 
}
// 驗證身份證 
function isCardNo(card) { 
var pattern = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/; 
return pattern.test(card); 
} 
// 驗證函式
function formValidate() {
var str = '';
// 判斷名稱
if($.trim($('#name').val()).length == 0) {
str  = '名稱沒有輸入\n';
$('#name').focus();
} else {
if(isChinaName($.trim($('#name').val())) == false) {
str  = '名稱不合法\n';
$('#name').focus();
}
}
// 判斷手機號碼
if ($.trim($('#phone').val()).length == 0) { 
str  = '手機號沒有輸入\n';
$('#phone').focus();
} else {
if(isPhoneNo($.trim($('#phone').val()) == false)) {
str  = '手機號碼不正確\n';
$('#phone').focus();
}
}
// 驗證身份證
if($.trim($('#identity').val()).length == 0) { 
str  = '身份證號碼沒有輸入\n';
$('#identity').focus();
} else {
if(isCardNo($.trim($('#identity').val())) == false) {
str  = '身份證號不正確；\n';
$('#identity').focus();
}
}
// 驗證地址
if($.trim($('#address').val()).length == 0) { 
str  = '地址沒有輸入\n';
$('#address').focus();
}
// 如果沒有錯誤則提交
if(str != '') {
alert(str);
return false;
} else {
$('#user').submit();
}
}
$('#submit').on('click', function() {
formValidate();
});
</script>