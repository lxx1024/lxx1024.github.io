<?php
session_start();     //登录系统开启一个session内容
 if( isset($_SESSION["userName"])){     //判断是否存在session对象
      $userId = $_SESSION["userId"];
      $id = intval($_GET['id']);
      $replyContent=$_POST["content"];  //接收topic-details.php提交的数据
      include "../conn/conn.php";
      $sql = "insert into topic_reply (topicId,userId,replyContent)  values('$id','$userId ','$replyContent')";
      mysql_query($sql,$conn);
      ?>
      <script>
      alert ("评论成功!");
        history.go(-1);
      </script>
      <p>
      <?php
      mysql_close($conn);//关闭数据库连接，如不关闭，下次连接时会出错
    }else {
  ?>
<script>
  alert ("您还没登录,需要登录才可以评论!");
   history.go(-1);
</script>
<?php
  }
?>