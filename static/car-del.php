/**
 * @Author: 20161024
 * @Date:   2017-04-11 23:10:47
 * @Last Modified by:   20161024
 * @Last Modified time: 2017-05-09 20:22:29
 */
<?php
 session_start();
if(empty($_GET['id'])){
    die('id is empty');
}
//连接数据库
include  "../conn/conn.php";

$id=intval($_GET['id']);
$userId = $_SESSION['userId'];
//删除指定数据
mysql_query("DELETE FROM cart WHERE prodId='$id' and userId='$userId'");
//排错并返回页面
if(mysql_error()){
    echo mysql_error();
}
 ?>
<script>
alert ("删除成功");
history.go(-1);
</script>
<?php
  //关闭连接
 mysql_close($conn);

 ?>