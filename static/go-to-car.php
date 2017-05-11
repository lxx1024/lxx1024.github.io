<!-- 跳转到购物车/提示用户登录 -->
<?php
session_start();     //登录系统开启一个session内容
if (isset($_SESSION["userName"])) {

 ?>
<script>
      window.location.href="buying-car.php";
</script>

<?php
       }else{
?>
<script>
    alert ("您当前还没有登录,登录后才可以添加到购物车!");
    history.go(-1);
</script>
<?php
     }
?>