<?php
session_start();     //登录系统开启一个session内容
if (isset($_SESSION["userName"])) {

        $userId=$_SESSION['userId'];
        $num=intval($_GET['num']);
        $attrId=intval($_GET['id']);
        include "../conn/conn.php";
        $result=mysql_query("select * from cart where id='".$attrId."';");  //从数据库调取登录名为...的数据
        $row = mysql_fetch_row($result);
        echo $row[0].'购物车id---';
        echo $row[1].'用户id---';
        echo $row[2].'商品id---';
        echo $row[3].'商品数量---';
        mysql_query("UPDATE cart SET number='$num' WHERE id='$attrId'");

 ?>
<script>
      window.location.href="buying-car.php";
</script>

<?php
  //关闭连接
     mysql_close($conn);
     }
?>