<?php
session_start();     //登录系统开启一个session内容
if(empty($_POST['title'])){
    echo "<a href='topic-publish.php'>返回</a>";
    die('标题不能为空');
}
if(empty($_POST['content'])){
    echo "<a href='topic-publish.php'>返回</a>";
    die('内容不能为空');
}
$id=$_SESSION['userId'];
$title=$_POST['title'];
$descs=$_POST['descs'];        //获取表单提交过来的数据
$content=$_POST['content'];        //获取表单提交过来的数据

include "../conn/conn.php";
$sql = "insert into topic  (userId,title,descs,content)  values('$id','$title','$descs','$content')";
  mysql_query($sql,$conn);
 ?>
<script>
alert ("publish success!");
window.location.href="topic.php";
</script>

<?php
  //关闭连接
 mysql_close($conn);
 ?>