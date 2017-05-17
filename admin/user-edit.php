<?php
include "conn/conn.php";       //导入连接数据库php代码
if(empty($_POST['psw'])){
     ?>
    <script>
          alert ("密码不能为空!");
          history.go(-1);
    </script>
    <?php
    die('密码不能为空');
}
$id=intval($_POST['id']);
$psw=$_POST['psw'];        //获取表单提交过来的数据

//修改指定数据
mysql_query("UPDATE user SET userPsw='$psw 'WHERE userId='$id'");

//排错并返回
if(mysql_error()){
    echo mysql_error();
} ?>
<script>
alert ("修改成功");
history.go(-1);
</script>
<?php
  //关闭连接
 mysql_close($conn);

 ?>