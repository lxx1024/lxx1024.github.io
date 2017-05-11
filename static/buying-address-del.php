<?php
     session_start();
     $id = $_SESSION['userId'];     //当前用户id----userId
      $addrId = $_GET['id'];   //收货人姓名---userName
      echo $id;
      echo $addrId;
      echo $_SESSION['userName'];     //以上获取的数据正确
      include "../conn/conn.php";
      // 对数据库进行操作收货地址修改
      // $sql = "insert into address (addressName,userId,userName,phone)  values('$addrAddress','$id','$addrName','$addrPhone');";
      // if(mysql_query($sql,$conn)){
      //     echo "成功";
      // }else{
      //   echo "shibai";
      // }
?>
<script>
      alert("删除成功");
      // history.go(-1);
</script>
<?php
    mysql_close($conn);
?>