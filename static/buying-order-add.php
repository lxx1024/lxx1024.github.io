<?php
     session_start();
     include '../conn/conn.php';

      $id=$_SESSION['userId'];   //当前用户id
      $addrId=$_REQUEST['address'];  //选中的收货地址id
      $cartId = $_REQUEST['cartId'];   //多个购物车id---多个商品

      // 追加一个新的订单记录 order表 --- 添加用户id、地址id即可
      $sql = "insert into orders (userId,addressId)  values('$id','$addrId');";
      if(mysql_query($sql,$conn)){
          echo "成功";
      }else{
        echo "shibai";
      }

        $result1=mysql_query("select * from orders where userId='".$id."' order by orderTime DESC limit 0,1;");  //收货地址表
        $row1=mysql_fetch_row($result1);
        echo $row1[0]."订单id";    //获取当前订单id

       foreach ($cartId as $key => $value) {
              // echo $value."购物车id对应的商品";   //购物车id
              //从购物车表提取商品id和商品数量(根据购物车id)
              $result2=mysql_query("select * from cart where id='$value' ;");  //收货地址表
              $row2=mysql_fetch_row($result2);
              echo $row2[0]."购物车id";
              echo $row2[1]."用户id";
              echo $row2[2]."商品id";
              echo $row2[3]."商品数量";
              // 添加该订单下的所有商品及对应的数量到订单表(商品订单id,商品id,商品数量)
               $sql1 = "insert into order_detail (orderId,prodId,orderNum)  values('$row1[0]','$row2[2]','$row2[3]');";
              if(mysql_query($sql1,$conn)){
                  echo "成功";
              }else{
                echo "shibai";
              }
              //删除原来购物车该商品的记录 (根据购物车id)
              mysql_query("DELETE FROM cart WHERE id='$value';");

      }
?>
<script>
      alert("添加成功");
      window.location.href="buying-order-details.php?id=<?php echo $row1[0];?>";
</script>
<?php
    mysql_close($conn);
?>