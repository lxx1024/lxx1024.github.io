<?php
     session_start();
     $id = $_SESSION['userId'];     //当前用户id----userId
      $addrName = $_GET['addrName'];   //收货人姓名---userName
      $addrAddress = $_GET['addrAddress'];   //收货地址---addressName
      $addrPhone = $_GET['addrPhone'];   //联系电话 ---phone
      echo $addrName;
      echo $addrAddress;
      echo $addrPhone;
      echo $id;
      echo $_SESSION['userName'];     //以上获取的数据正确
      include "../conn/conn.php";
      // 对数据库进行操作
      $sql = "insert into address (addressName,userId,userName,phone)  values('$addrAddress','$id','$addrName','$addrPhone');";
      if(mysql_query($sql,$conn)){
          echo "成功";
      }else{
        echo "shibai";
      }

?>