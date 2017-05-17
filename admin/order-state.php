<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理员信息管理</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/order.css"/>
    <link rel="stylesheet" href="css/order-state.css">
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
        <li><a href="product.php">商品信息管理<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
        <li class="order"><a href="order.php">商品订单管理<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
        <li><a href="topic.php">留言信息管理<i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
        <li><a href="#">报表统计分析 <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- 侧边栏left-nav End-->

<!--后台通用头部和侧边栏 End-->
<!---------------------------------------商品订单信息管理主体部分 Begin-->
<div class="main-content fr">
    <ul class="order-type clearfix ">
              <?php
                    $q1= "SELECT * FROM order_state";
                    $rs1= mysql_query($q1, $conn);
                    while ($r1=mysql_fetch_row($rs1)){
                          $q2 = "SELECT * FROM orders where stateId='$r1[0]';";
                          $rs2= mysql_query($q2, $conn);
                          $n1=mysql_num_rows($rs2);
                          if ($n1>0) {
            ?>
                      <li><a href="order-state.php?id=<?php echo "$r1[0]"; ?>">
                       <!-- 商品分类,传入对应id,到商品分类表提取对应的类名 -->
             <?php
                        // echo "$typename[0]";   商品分类id
                         echo "$r1[1]";
              ?>
                        </a></li>
                        <li>|</li>
            <?php
                         }
                }
            ?>

    </ul>
    <div class="wrapper w">
          <a href="order.php">
                      <i class="fa fa-reply-all" aria-hidden="true"></i>
                      返回商品订单管理
          </a>
    </div>
    <div class="admins">
        <form action="#" method="post">
            <table>
                <tr>
                    <th>订单ID</th>
                    <th>用户名</th>
                    <th>商品数量</th>
                    <th>订单总额</th>
                    <th>订单状态</th>
                    <th>订单详情</th>
                </tr>

                <?php     //----------------------------- 循环显示数据库admin表的内容 PHP代码开始
                        $stateId=$_GET['id'];
                        $result1=mysql_query("select * from orders where stateId=$stateId order by orderTime DESC;");  //订单表
                        while ($row1=mysql_fetch_row($result1)){
                ?>
                <tr>
                    <td>
                        <?php echo $row1[0]; ?>
                    </td>
                    <td>
                    <?php
                            $result2=mysql_query("select * from user where userId=$row1[1];");  //用户信息表
                            $row2=mysql_fetch_row($result2);
                            echo $row2[1];
                    ?>
                    </td>
                    <td>
                    <?php
                            $result3=mysql_query("select * from order_detail where orderId=$row1[0];");  //订单信息表
                            $num3=0;
                            $price3=0;
                            while ($row3=mysql_fetch_row($result3)){
                                $num3 = $num3 + $row3[3];

                                $result4=mysql_query("select * from product where prodId=$row3[2];");  //商品信息表
                                $row4=mysql_fetch_row($result4);
                                $price3 = $price3 + $row3[3] * $row4[5];
                            }
                            echo '共 <span>'.$num3.'</span> 件商品';
                    ?>
                    </td>
                    <td class="price">
                        ￥<?php echo $price3; ?>
                    </td>
                     <?php
                            $result5=mysql_query("select * from order_state where stateId=$row1[3];");  //订单状态信息表
                            $row5=mysql_fetch_row($result5);

                    ?>

                    <td class="<?php
                             if ($row1[3]>=5 && $row1[3]<=6) {
                                echo 'get';
                             }else if ($row1[3]==7) {
                                echo 'cancel';
                              }
                        ?>">
                          <?php echo $row5[1]; ?>
                    </td>
                    <td>
                        <a href="order-details.php?id=<?php echo "$row1[0]" ?>" class="admin-edit">
                                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                查看详情
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
<!--商品订单信息管理主体部分 End-->

</body>
</html>