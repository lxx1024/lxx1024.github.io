<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理员信息管理</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/admin.css"/>
    <link rel="stylesheet" href="../Font-Awesome-master/css/font-awesome.min.css">
</head>
<body>
<?php       //---------连接数据库PHP代码
include "conn/conn.php";       //导入连接数据库php代码
$q = "SELECT * FROM admin";                   //SQL查询语句 -----在此处改表名
$result = mysql_query($q, $conn);                     //执行sql查询,
//$row = mysql_fetch_row($result);    //  获取数据集  ------ 后面在while循环里面获取
?>
<!-----------------------------------------------------------后台通用头部和侧边栏 Begin -->

<?php        // --------登录后台系统-php代码------
    session_start();
    if(isset($_SESSION["code"])){
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

<?php                // ---------登录后台系统php代码------
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
        <li class="admin"><a href="admin.php">管理员信息管理<i class="fa fa-diamond" aria-hidden="true"></i></a></li>
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
<!---------------------------------------管理员信息管理主体部分 Begin-->
<div class="main-content fr">
    <div class="current-admin">
        <p>您当前的账号信息:</p>
        <form action="admin-current-edit.php" method="post">
            <label for="admin-name"> 用户名: </label><input type="text" value="<?php
        echo "${_SESSION["adminname"]}";
        ?>" maxlength="20" name="admin-name" id="admin-name"/>
            <label for="admin-psd"> 密码: </label><input type="text" maxlength="20" value="<?php
        echo "${_SESSION["adminpsd"]}";?>" name="admin-psd" id="admin-psd"/>
            <input type="submit" name="submit" value="保存" onclick="return confirm('确定修改当前登录账号信息');"/>
        </form>
    </div>
    <!-- 以下是超级管理员拥有的权限---管理员信息管理 -->
    <div class="admin-add-form">
        <div class="admin-add"><a href="admin-add.php">添加管理员</a></div>
    </div>
    <div class="admins">
        <form action="#" method="post">
            <table>
                <tr>
                    <th>序号</th>
                    <th>用户名</th>
                    <th>密码</th>
                    <th>操作</th>
                </tr>

                <?php     //----------------------------- 循环显示数据库admin表的内容 PHP代码开始
                    mysql_data_seek($result, 0);  // 循环取出记录
                    while ($row=mysql_fetch_row($result)){
                ?>
                <tr>
                    <td>
                        <?php echo "$row[0]" ?>
                    </td>
                    <td>
                        <?php echo "$row[1]" ?>
                    </td>
                    <td>
                        <?php echo "$row[2]" ?>
                    </td>
                    <td>
                        <a href="admin-modify.php?id=<?php echo "$row[0]" ?>" class="admin-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                        <a href="admin-del.php?id=<?php echo "$row[0]" ?>" onclick="return confirm('确定删除该用户吗?');"  class="admin-del"><i class="fa fa-times" aria-hidden="true"></i> 删除</a>
                    </td>
                </tr>
                <?php   //-------------------------------- 循环显示数据库admin表的内容 PHP代码结束
                    }

                ?>

            </table>
        </form>
    </div>
</div>
<!--管理员信息管理主体部分 End-->

</body>
</html>