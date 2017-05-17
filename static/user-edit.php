<?php
session_start();
include "../conn/conn.php";       //导入连接数据库php代码
if(empty($_POST['psw'])){
    ?>
    <script>
          alert ("请输入原来的密码!");
          history.go(-1);
    </script>
    <?php
    die('原密码不能为空');
}
if(empty($_POST['new-psw'])){
     ?>
    <script>
          alert ("请输入新密码!");
          history.go(-1);
    </script>
    <?php
    die('新密码不能为空');
}
$id=$_SESSION['userId'];
$psw=trim($_POST['psw']);
$newPsw=trim($_POST['new-psw']);        //获取表单提交过来的数据

$q1 = "SELECT * FROM user where userId=$id;";                   //SQL查询语句 -----在此处改表名
$rs1= mysql_query($q1, $conn);                     //执行sql查询
$row1=mysql_fetch_row($rs1);
echo '*'.$row1[2].'*';   //从数据库提取的密码存在空格
echo '*'.$psw.'*';
if(trim($row1[2])==$psw && trim($row1[2])!=$newPsw){
  mysql_query("UPDATE user SET userPsw='$newPsw 'WHERE userId='$id'");

//排错并返回
if(mysql_error()){
    echo mysql_error();
} ?>
<script>
alert ("修改成功,请记住新密码");
history.go(-1);
</script>
<?php
  //关闭连接

}else if(trim($row1[2])==$psw && trim($row1[2])==$newPsw){
  ?>
<script>
    alert ("新输入的密码和原来密码一样,请重新输入");
    history.go(-1);
</script>
<?php
  }else{
?>
<script>
    alert ("原来的密码不正确,请重新输入");
    history.go(-1);
</script>
<?php
   }
   mysql_close($conn);
 ?>
