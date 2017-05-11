<?php
     session_start();
    if(empty($_GET['id'])){
        die('id is empty');
    }
     $id = $_SESSION['userId'];     //当前用户id----userId
      $addrId = $_GET['id'];   //收货人姓名---addressId
      echo $id;
      echo $addrId;  //以上获取的数据正确
      include "../conn/conn.php";
      mysql_query("DELETE FROM address WHERE addressId='$addrId' and userId='$id'");
      //排错并返回页面
      if(mysql_error()){
          echo mysql_error();
      }
?>
<script>
      alert("删除成功");
      history.go(-1);
</script>
<?php
    mysql_close($conn);
?>