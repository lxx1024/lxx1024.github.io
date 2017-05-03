<?php
if(empty($_POST['userName'])){
    echo "<a href='register.html'>返回</a>";
    die('用户名不能为空');
}
if(empty($_POST['userPsw'])){
    echo "<a href='register.html'>返回</a>";
    die('密码不能为空');
}
if(empty($_POST['password-confirm'])){
    echo "<a href='register.html'>返回</a>";
    die('请再次确认密码');
}
if(empty($_POST['phone'])){
    echo "<a href='register.html'>返回</a>";
    die('手机号码不能为空');
}

$name=$_POST['userName'];
$psd=$_POST['userPsw'];        //获取表单提交过来的数据
$phone=$_POST['phone'];        //获取表单提交过来的数据

include "../conn/conn.php";

$dbuserName=null;    //自定义的变量
$result=mysql_query("select * from user where userName='".$name."';");
while($row=mysql_fetch_array($result)){
 $dbuserName=trim($row["userName"]);
}
if(is_null($dbuserName)){     //----------------判断注册名是否已经被注册
?>

<?php
$sql = "insert into user (userName,userPsw,phone)  values('$name','$psd','$phone')";
 if (!mysql_query($sql,$conn))
 {
   die('Error: ' . mysql_error());
 }
 ?>
<script>
alert ("注册成功,请登录!");
window.location.href="../index.php";
</script>
<?php
}else{
?>
<script>
alert("该用户名已被注册！请重新输入");
window.location.href="register.html";
</script>
<?php
 }
?>

<?php
  //关闭连接
 mysql_close($conn);

 ?>