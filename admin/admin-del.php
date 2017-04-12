/**
 * @Author: 20161024
 * @Date:   2017-04-11 23:10:47
 * @Last Modified by:   20161024
 * @Last Modified time: 2017-04-12 11:50:01
 */
<?php
if(empty($_GET['id'])){
    die('id is empty');
}
//连接数据库
include  "conn/conn.php";

$id=intval($_GET['id']);

//删除指定数据
mysql_query("DELETE FROM admin WHERE adminId=$id");
//排错并返回页面
if(mysql_error()){
    echo mysql_error();
}
 ?>
<script>
alert ("删除成功");
window.location.href="admin.php";
</script>
<?php
  //关闭连接
 mysql_close($conn);

 ?>