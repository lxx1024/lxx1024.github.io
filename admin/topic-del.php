<?php
if(empty($_GET['id'])){
    die('id is empty');
}
//连接数据库
include  "conn/conn.php";

$id=intval($_GET['id']);

//删除指定数据
mysql_query("DELETE FROM topic WHERE topicId=$id");
//排错并返回页面
if(mysql_error()){
    echo mysql_error();
}
 ?>
<script>
alert ("删除成功");
window.location.href="topic.php";
</script>
<?php
  //关闭连接
 mysql_close($conn);

 ?>