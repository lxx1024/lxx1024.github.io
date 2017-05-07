<?php
session_start();     //登录系统开启一个session内容
if (isset($_SESSION["userName"])) {

        $userId=$_SESSION['userId'];
        $num=intval($_GET['num']);
        $prodId=intval($_GET['id']);
        include "../conn/conn.php";

        $result=mysql_query("select * from cart where userId='".$userId."' and prodId='".$prodId."' ;");  //从数据库调取登录名为...的数据
        $row = mysql_fetch_row($result);
        $sum = $row[3]+$num;
        $count = mysql_num_rows($result);

        if ($count>0) {
          // 如果当前用户已经添加过该商品到购物车则更新数据
                mysql_query("UPDATE cart SET number='$sum' WHERE prodId='$prodId'");
        }else{
          //否则添加新数据
                $sql = "insert into cart  (userId,prodId,number)  values('$userId','$prodId','$num')";
                  mysql_query($sql,$conn);
        }
 ?>
<script>
      alert("成功添加到购购物车!");
      window.location.href="buying-car.php";
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