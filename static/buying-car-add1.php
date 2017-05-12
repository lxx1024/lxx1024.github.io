<?php      //通过商品详情直接购买时操作
session_start();     //登录系统开启一个session内容
if (isset($_SESSION["userName"])) {

        $userId=$_SESSION['userId'];
        $num=intval($_GET['num']);
        $prodId=intval($_GET['id']);
        include "../conn/conn.php";
        $sql = "insert into cart  (userId,prodId,number)  values('$userId','$prodId','$num')";
        mysql_query($sql,$conn);

         $result=mysql_query("select * from cart where userId='".$userId."' and prodId='".$prodId."' order by cartAddTime DESC limit 0,1;");  //从数据库调取登录名为...的数据
        $row = mysql_fetch_row($result);
        echo $row[2];  //商品id
        echo $row[3];   //数量
 ?>
<script>
      window.location.href="buying-order-make.php?checkbox[]=<?php echo $row[0]; ?>&number=<?php echo $row[3]; ?>";
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