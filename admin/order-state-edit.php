<?php
        $id=$_GET['orderId'];
        $state=$_GET['states'];
        include "../conn/conn.php";
        mysql_query("UPDATE orders SET stateId='$state' WHERE orderId='".$id."' ");
 ?>
<script>
      alert("修改订单状态成功!");
      history.go(-1);
</script>

<?php
  //关闭连接
     mysql_close($conn);
?>