<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>商品分类管理-编辑</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/product-type.css"/>
    <link rel="stylesheet" href="css/admin-modify.css"/>
    <link rel="stylesheet" href="../Font-Awesome-master/css/font-awesome.min.css">
</head>
<body>
<?php       //---------连接数据库PHP代码
include "conn/conn.php";       //导入连接数据库php代码
$q = "SELECT * FROM admin";                   //SQL查询语句 -----在此处改表名
$result = mysql_query($q, $conn);                     //执行sql查询,
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
        <li><a href="admin.php">管理员信息管理<i class="fa fa-diamond" aria-hidden="true"></i></a></li>
        <li><a href="user.php">会员信息管理<i class="fa fa-users" aria-hidden="true"></i></a></li>
        <li class="prod-type"><a href="product-type.php">商品分类管理<i class="fa fa-sitemap" aria-hidden="true"></i></a></li>
        <li><a href="product.php">商品信息管理<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
        <li><a href="order.php">商品订单管理<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
        <li><a href="topic.php">留言信息管理<i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
        <li><a href="#">报表统计分析 <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- 侧边栏left-nav End-->

<!--后台通用头部和侧边栏 End-->
<!---------------------------------------商品分类管理主体部分 Begin-->
<div class="main-content fr">
    <!-- 要修改的商品分类信息原来的信息 -->
<?php
if(!empty($_GET['id'])){
        //连接mysql数据库
        include "conn/conn.php";
        //查找id
        $id=intval($_GET['id']);
        $result1=mysql_query("SELECT * FROM prod_type where prodTypeId='".$id."';");
        if(mysql_error()){
            die('can not connect db');
        }
        //获取结果数组
        $result_arr=mysql_fetch_row($result1);
    }else{
        die('id not define');
    }
?>

    <div class="current-admin">
        <form action="#" method="post">
            <label for="type-name"> 原来商品类别名称: </label><input type="text" value="<?php echo $result_arr[1]?>" disabled name="type-name" id="type-name"/>
            <input type="submit" name="submit" value="ID:<?php echo $id?>" disabled  style="background:#ccc" />
        </form>
    </div>

    <!-- ---------------------修改商品分类信息------------------- -->
    <div class="admin-modify-form">
        <div class="admin-cancel"><a href="product-type.php">取消修改</a></div>
                <form action="product-type-modify1.php?id=<?php echo $id?>" method="post">
                        <label for="type-name"> 修改商品类别名称: </label><input type="text" value="<?php echo $result_arr[1]?>" maxlength="10" name="type-name" id="type-name"/>
                       <input type="submit" name="submit" value="修改"  onclick="return confirm('确定修改该商品分类信息?');" />
                </form>
        </div>

        <!-- -----------------展示所有管理员信息------------- -->
    <div class="admins">
        <form action="#" method="post">
            <table>
                <tr>
                    <th>序号ID</th>
                    <th>商品类别名称</th>
                    <th>编辑</th>
                    <th>删除</th>
                </tr>

                 <?php     //----------------------------- 循环显示数据库admin表的内容 PHP代码开始
                    $qname = "SELECT * FROM prod_type;";                   //SQL查询语句 -----在此处改表名
                     $prodTypeRs = mysql_query($qname, $conn);                     //执行sql查询
                     while ($typename=mysql_fetch_row($prodTypeRs)){
                ?>
                <tr>
                    <td>
                        <?php echo "$typename[0]" ?>
                    </td>
                    <td class="type-name">
                        <?php echo "$typename[1]" ?>
                    </td>
                    <td>
                        <a href="product-type-modify.php?id=<?php echo "$typename[0]" ?>" class="admin-edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                    </td>
                    <td>
                        <a href="product-type-del.php?id=<?php echo "$typename[0]" ?>" onclick="return confirm('确定删除该商品分类吗?');"  class="admin-del"><i class="fa fa-times" aria-hidden="true"></i> 删除</a>
                    </td>
                </tr>
                <?php   //-------------------------------- 循环显示数据库商品分类表的内容 PHP代码结束
                    }

                ?>

            </table>
        </form>
    </div>
</div>
<!--管理员信息管理主体部分 End-->

</body>
</html>