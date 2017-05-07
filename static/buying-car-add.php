<?php
session_start();     //登录系统开启一个session内容
if (isset($_SESSION["userName"])) {

        $userId=$_SESSION['userId'];
        $num=intval($_GET['num']);
        $prodId=intval($_GET['id']);
        include "../conn/conn.php";
        $sql = "insert into cart  (userId,prodId,number)  values('$userId','$prodId','$num')";
          mysql_query($sql,$conn);
          // echo $userId;
          // echo $num;
          // echo $prodId;
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