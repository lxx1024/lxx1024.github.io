<?php
include "conn/conn.php";       //导入连接数据库php代码
$id=intval($_GET['id']);
//修改指定数据
mysql_query("UPDATE topic SET type=0 WHERE topicId='$id'");
?>
<script>
alert ("设置为热点话题成功!");
history.go(-1);
</script>
<?php
  //关闭连接
 mysql_close($conn);

 ?>