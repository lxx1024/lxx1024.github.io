<?php
session_start();   //session开始
$userName=trim($_REQUEST["userName"]);  //接收login.html提交的数据
$userPsw=trim($_REQUEST["userPsw"]);
include "../conn/conn.php";       //导入连接数据库php代码
$dbuserName=null;    //自定义的变量
$dbuserPsw=null;
$dbuserId=null;
$result=mysql_query("select * from user where userName='".$userName."';");  //从数据库调取登录名为...的数据
mysql_query("SET NAMES UTF8");           //设置统一的字符格式utf-8
while($row=mysql_fetch_array($result)){
 $dbuserName=trim($row["userName"]);
 $dbuserPsw=trim($row["userPsw"]);    //将数据库获取的字段赋值给自定义的变量
 $dbuserId=trim($row["userId"]);
}
if(is_null($dbuserName)){
?>
<script>
alert("查无此人！请重新登录");
window.location.href="login-topic.html";
</script>
<?php
 }
else{
 if($dbuserPsw!=$userPsw){
?>
<script>
alert("密码错误！请重新输入密码");
window.location.href="login-topic.html";
</script>
<?php
 }
 else{
$_SESSION["userName"]=$dbuserName;
$_SESSION["userPsw"]=$dbuserPsw;
$_SESSION["userId"]=$dbuserId;
 // $_SESSION["code"]=mt_rand(0,100000);
?>
<script>
window.location.href="topic.php";
</script>
<?php
 }
 }
mysql_close($conn);//关闭数据库连接，如不关闭，下次连接时会出错
?>