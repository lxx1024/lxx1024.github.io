<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理员信息管理</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/topic.css"/>
    <link rel="stylesheet" href="../Font-Awesome-master/css/font-awesome.min.css">
</head>
<body>

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
        <li class="user"><a href="user.php">会员信息管理<i class="fa fa-users" aria-hidden="true"></i></a></li>
        <li><a href="product-type.php">商品分类管理<i class="fa fa-sitemap" aria-hidden="true"></i></a></li>
        <li><a href="product.php">商品信息管理<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
        <li><a href="order.php">商品订单管理<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
        <li class="topic"><a href="topic.php">留言信息管理<i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
        <li><a href="#">报表统计分析 <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- 侧边栏left-nav End-->
 <!-- 从数据库提取手机社区对应的数据PHP代码 -->
        <?php
            include "../conn/conn.php";       //导入连接数据库php代码
            $q = "SELECT * FROM topic";                   //SQL查询语句 -----在此处改表名
            // type 为0 代表是热点话题
            $result = mysql_query($q, $conn);                     //执行sql查询,
       ?>

<!--后台通用头部和侧边栏 End-->
<!---------------------------------------留言信息管理主体部分 Begin-->
<div class="main-content fr">
    <div class="topics">
        <form action="#" method="post">
            <table>
                <tr>
                    <th>序号</th>
                    <th>作者</th>
                    <th>标题</th>
                    <th>详情</th>
                    <th>热点设置</th>
                    <th>删除</th>
                </tr>
                 <tr>
                <?php     //----------------------------- 循环显示数据库admin表的内容 PHP代码开始
                    mysql_data_seek($result, 0);  // 循环取出记录
                    while ($row=mysql_fetch_row($result)){
                ?>
                <tr>
                    <td>
                        <?php echo "$row[0]" ?>
                    </td>
                    <td>
                    <!-- 根据当前话题的userId找到对应的作者姓名 -->
                     <?php
                                 $qname = "SELECT * FROM user where userId='".$row[1]."';";                   //SQL查询语句 -----在此处改表名
                                  $nameRs = mysql_query($qname, $conn);                     //执行sql查询
                                 while ($name=mysql_fetch_row($nameRs)){
                                         echo "$name[1]";
                                }
                          ?>
                    </td>
                    <td class="title">
                        <?php echo "$row[3]";
                         if ($row[2]==0) {
                                     ?>
                                     <span class="hot">#热点话题</span>
                             <?php
                                        }
                            ?>
                    </td>
                    <td>
                        <a href="topic-details.php?id=<?php echo "$row[0]" ?>" class="admin-edit">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                查看详情
                        </a>
                    </td>
                    <td>
                    <?php
                            if ($row[2]==1) {
                    ?>
                         <a href="topic-hot-y.php?id=<?php echo "$row[0]" ?>" onclick="return confirm('确定设置为热点话题?');"  class="topic-hot-y">
                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                    设置热点
                            </a>
                    <?php
                            }else {

                    ?>
                               <a href="topic-hot-n.php?id=<?php echo "$row[0]" ?>" onclick="return confirm('确定取消该热点话题?');"  class="topic-hot-n">
                                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                                取消热点
                        </a>
                    <?php
                            }
                    ?>
                    </td>
                    <td class="topic-del">
                                <a href="topic-del.php?id=<?php echo "$row[0]" ?>" onclick="return confirm('确定取消该热点话题?');"  class="topic-hot-n">
                                <i class="fa fa-times" aria-hidden="true"></i>
                               删除
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