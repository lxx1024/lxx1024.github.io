<?php
session_start();     //登录系统开启一个session内容
if (isset($_SESSION["userName"])) {

        $id=$_GET['id'];
        include "../conn/conn.php";
        mysql_query("UPDATE orders SET stateId='6' WHERE orderId='".$id."' ");
 ?>
<script>
      alert("确认收货成功,本次交易已完成!");
      // history.go(-1);
</script>

<?php
  //关闭连接
     mysql_close($conn);

       }else{
?>
<script>
    alert ("您当前还没有登录,登录后才可以添加到购物车!");
    history.go(-1);
</script>
<?php
     }
?>