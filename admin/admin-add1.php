<?php
if(empty($_POST['admin-name'])){
    echo "<a href='admin-add.php'>返回</a>";
    die('用户名不能为空');
}
if(empty($_POST['admin-psd'])){
    echo "<a href='admin-add.php'>返回</a>";
    die('密码不能为空');
}
$name=$_POST['admin-name'];
$psd=$_POST['admin-psd'];        //获取表单提交过来的数据
include "conn/conn.php";

$dbadminname=null;
$result=mysql_query("select * from admin where adminName='".$name."';");  //从数据库调取登录名为...的数据
while($row=mysql_fetch_array($result)){
 $dbadminname=trim($row["adminName"]);
}
if(is_null($dbadminname)){
$sql = "insert into admin (adminName,adminPsd)  values('$name','$psd')";
 if (!mysql_query($sql,$conn))
 {
   die('Error: ' . mysql_error());
 }
 ?>
<script>
alert ("添加成功");
window.location.href="admin.php";
</script>
<?php
}else{
?>
<script>
alert("已存在改用户！请重新输入");
window.location.href="admin-add.php";
</script>
<?php
}
?>
<?php
  //关闭连接
 mysql_close($conn);

 ?>