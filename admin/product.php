<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理员信息管理</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/product.css"/>
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
        <li><a href="admin.php">管理员信息管理<i class="fa fa-diamond" aria-hidden="true"></i></a></li>
        <li><a href="user.php">会员信息管理<i class="fa fa-users" aria-hidden="true"></i></a></li>
        <li><a href="product-type.php">商品分类管理<i class="fa fa-sitemap" aria-hidden="true"></i></a></li>
        <li class="product"><a href="product.php">商品信息管理<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
        <li><a href="order.php">商品订单管理<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
        <li><a href="topic.php">留言信息管理<i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
        <li><a href="#">报表统计分析 <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- 侧边栏left-nav End-->
<!-- 从数据库提取商品信息对应的数据PHP代码 -->
        <?php
            include "../conn/conn.php";       //导入连接数据库php代码
            $q = "SELECT * FROM product";                   //SQL查询语句 -----在此处改表名
            // type 为0 代表是热点话题
            $result = mysql_query($q, $conn);                     //执行sql查询,
       ?>
<!--后台通用头部和侧边栏 End-->
<!---------------------------------------商品信息管理主体部分 Begin-->
<div class="main-content fr">
    <ul class="prod-type clearfix ">
              <?php
                    mysql_data_seek($result, 0);  // 循环取出记录
                    $array =array();
                    while ($row=mysql_fetch_row($result)){
                            if (!in_array($row[2], $array)) {
                                    array_push($array, $row[2]);
                                     $qname = "SELECT * FROM prod_type where prodTypeId='".$row[2]."';";                   //SQL查询语句 -----在此处改表名
                                      $prodTypeRs = mysql_query($qname, $conn);                     //执行sql查询
                                     while ($typename=mysql_fetch_row($prodTypeRs)){
            ?>
                      <li><a href="prod-type.php?id=<?php echo "$typename[0]"; ?>">
                       <!-- 商品分类,传入对应id,到商品分类表提取对应的类名 -->
             <?php
                        // echo "$typename[0]";   商品分类id
                         echo "$typename[1]";
              ?>
                        </a></li>
                        <li>|</li>
            <?php
                                      }
                         }
                }
            ?>

    </ul>
    <div class="prod-top clearfix">
        <div class="prod-add fr"><a href="prod-add.php">添加商品</a></div>
    </div>
    <div class="product">
        <form action="#" method="post">
            <table>
                <tr>
                    <th>商品ID</th>
                    <th>商品名称</th>
                    <th>商品分类</th>
                    <th>操作</th>
                </tr>
                <?php     //----------------------------- 循环显示数据库admin表的内容 PHP代码开始
                    mysql_data_seek($result, 0);  // 循环取出记录
                    while ($row=mysql_fetch_row($result)){
                ?>
                <tr>
                    <td class="prod-id">
                        <?php echo "$row[0]" ?>
                    </td>
                    <td>
                        <?php echo "$row[1]" ?>
                    </td>
                    <td class="prod-type">
                    <!-- 商品分类,传入对应id,到商品分类表提取对应的类名 -->
                     <?php
                             $qname = "SELECT * FROM prod_type where prodTypeId='".$row[2]."';";                   //SQL查询语句 -----在此处改表名
                              $prodTypeRs = mysql_query($qname, $conn);                     //执行sql查询
                             while ($typename=mysql_fetch_row($prodTypeRs)){
                                     echo "$typename[1]";
                            }
                      ?>
                    </td>
                    <td>
                        <a href="prod-details.php?id=<?php echo "$row[0]" ?>" class="admin-edit">
                                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                查看详情
                        </a>
                        <a href="prod-del.php?id=<?php echo "$row[0]" ?>" onclick="return confirm('确定删除该商品吗?');"  class="admin-del">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                删除
                        </a>
                    </td>
                </tr>
                <?php   //-------------------------------- 循环显示数据库admin表的内容 PHP代码结束
                    }
                ?>

            </table>
        </form>
    </div>
</div>
<!--商品信息管理主体部分 End-->

</body>
</html>