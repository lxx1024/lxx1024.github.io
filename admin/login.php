<?php
session_start();   //session开始
$adminname=$_REQUEST["adminname"];  //接收login.html提交的数据
$adminpsd=$_REQUEST["adminpsd"];
include "conn/conn.php";       //导入连接数据库php代码
$dbadminname=null;    //自定义的变量
$dbadminpsd=null;
$result=mysql_query("select * from admin where adminName='".$adminname."';");  //从数据库调取登录名为...的数据
mysql_query("SET NAMES UTF8");           //设置统一的字符格式utf-8
while($row=mysql_fetch_array($result)){
 $dbadminname=$row["adminName"];
 $dbadminpsd=$row["adminPsd"];    //将数据库获取的字段赋值给自定义的变量
}
if(is_null($dbadminname)){
?>
<script>
alert("查无此人！请重新登录");
window.location.href="login.html";
</script>
<?php
 }
else{
 if($dbadminpsd!=$adminpsd){
?>
<script>
alert("密码错误！请重新输入密码");
window.location.href="login.html";
</script>
<?php
 }
 else{
 $_SESSION["adminname"]=$dbadminname;
 $_SESSION["code"]=mt_rand(0,100000);    //给session附一个随机值，防止用户直接通过调用界面访问welcome.php
?>
<script>
window.location.href="index.php";
</script>
<?php
 }
 }
mysql_close($conn);//关闭数据库连接，如不关闭，下次连接时会出错
?>