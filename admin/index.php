<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理主页</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="../Font-Awesome-master/css/font-awesome.min.css">
</head>
<body>
<!-----------------------------------------------------------后台通用头部和侧边栏 Begin -->

<?php
    session_start();
    if(isset($_SESSION["code"])){       // --------登录后台系统-php代码------
?>

<!-- ------------------------------------头部top Begin-->
<div class="top clearfix">
    <div class="logo fl">
        <a href="index.php"><h1>哆咪手机商城后台管理系统</h1></a>
    </div>
     <div class="login-massage fl">
            欢迎登录!&nbsp;<span class="admin-name">
            <?php
            echo "${_SESSION["adminname"]}";
            ?>
            </span>
            <a href="exit.php" class="quit fr">退出</span>
        </div>
        <div class="datetime fr">
            日期 :20<?php echo date("y-m-d",time()); ?>
        </div>
</div>
<!-- 头部top End-->

<?php              // ---------登录后台系统php代码------
}
else{
?>
<script>
alert("后台系统仅系统管理员可进,请登录！");  //进入后台系统提示
window.location.href="login.html";
</script>
<?php
}
?>

<!---------------------------------------侧边栏left-nav Begin-->
<div class="left-nav fl">
    <ul>
        <li><a href="admin.php">管理员信息管理<i class="fa fa-diamond" aria-hidden="true"></i></a></li>
        <li><a href="user.php">会员信息管理<i class="fa fa-users" aria-hidden="true"></i></a></li>
        <li><a href="product-type.html">商品分类管理<i class="fa fa-sitemap" aria-hidden="true"></i></a></li>
        <li><a href="product.html">商品信息管理<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
        <li><a href="order.html">商品订单管理<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
        <li><a href="community.html">留言信息管理<i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
        <li><a href="#">报表统计分析 <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- 侧边栏left-nav End-->

<!--后台通用头部和侧边栏 End-->
<!----------------------------------------主要内容主体 Begin-->
<div class="main-content fr">
    <h3>管理员权限说明 - - 您当前的身份是<span>超级管理员</span>!</h3>
    <div class="super-admin fl">
        <h5>超级管理员权限:</h5>
        <p>维护管理员信息</p>
        <p>维护会员信息</p>
        <p>维护管理员信息</p>
        <p>维护管理员信息</p>
        <p>维护管理员信息</p>
        <p>维护管理员信息</p>
        <p>维护管理员信息</p>
    </div>
    <div class="general-admin fr">
        <h5>普通管理员权限:</h5>
        <p>管理商品信息</p>
        <p>管理商品信息</p>
        <p>管理商品信息</p>
        <p>管理商品信息</p>
        <p>管理商品信息</p>
        <p>管理商品信息</p>
    </div>
</div>
<!--主要内容主体 End-->
</body>
</html>