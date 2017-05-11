<?php
     session_start();
     $id = $_SESSION['userId'];     //当前用户id----userId
      $addrId = $_GET['addrId'];   //收货地址id ------addressId
      $addrName = $_GET['addrName'];   //收货人姓名---userName
      $addrAddress = $_GET['addrAddress'];   //收货地址---addressName
      $addrPhone = $_GET['addrPhone'];   //联系电话 ---phone  字符型
      // echo $id;
      // echo $addrId;
      // echo $addrName;
      // echo $addrAddress;
      // echo $addrPhone;   //以上获取的数据正确
      include "../conn/conn.php";
      // 对数据库进行操作收货地址修改
      // $sql = "insert into address (addressName,userId,userName,phone)  values('$addrAddress','$id','$addrName','$addrPhone');";
      // if(mysql_query($sql,$conn)){
      //     echo "成功";
      // }else{
      //   echo "shibai";
      // }
     mysql_query("UPDATE address SET addressName='$addrAddress',userName='$addrName',phone='$addrPhone' WHERE addressId='$addrId' and userId='$id'");
?>
<script>
      alert("修改成功");
      history.go(-1);
</script>
<?php
    mysql_close($conn);
?>