<?php
session_start();
include "conn/conn.php";       //导入连接数据库php代码
if(empty($_POST['admin-name'])){
    ?>
    <script>
          alert ("用户名不能为空!");
          history.go(-1);
    </script>
    <?php
    die('用户名不能为空');
}
if(empty($_POST['admin-psd'])){
     ?>
    <script>
          alert ("密码不能为空!");
          history.go(-1);
    </script>
    <?php
    die('密码不能为空');
}
$id=intval($_GET['id']);
$name=$_POST['admin-name'];
$psd=$_POST['admin-psd'];        //获取表单提交过来的数据

//修改指定数据
mysql_query("UPDATE admin SET adminName='$name',adminPsd='$psd 'WHERE adminId='$id'");
// $_SESSION["adminname"]=$name;
// $_SESSION["adminpsd"]=$psd;   //更新修改后的session

//排错并返回
if(mysql_error()){
    echo mysql_error();
} ?>
<script>
alert ("修改成功");
window.location.href="admin.php";
</script>
<?php
  //关闭连接
 mysql_close($conn);

 ?>