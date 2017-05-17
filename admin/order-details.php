<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>商品订单详情信息</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/order-details.css"/>
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
<!---------------------------------------管理员信息管理主体部分 Begin-->
<div class="main-content fr">
    <div class="wrapper w">
          <a href="order.php">
                      <i class="fa fa-reply-all" aria-hidden="true"></i>
                      返回商品订单管理
          </a>
    </div>
    <div class="order-form">
   <!--------- 收货信息Begin  -->
            <div class="box clearfix">
                   <?php
                               $orderId = $_REQUEST['id'];   //传递的id-----订单id
                               $result1=mysql_query("select * from orders where orderId='".$orderId."';");  //订单表
                               $row1=mysql_fetch_row($result1);
                               // echo $row1[2];   //地址id
                               // echo $row1[3];

                               $result2=mysql_query("select * from address where addressId='".$row1[2]."';");  //收货地址表
                               $row2=mysql_fetch_row($result2);
                  ?>
                    <div class="order-id">
                            <span>订单编号 : <?php echo $row1[0]; ?></span>
                            <span class="order-time"><?php echo $row1[4]; ?></span>
                    </div>
                    <div class="left fl">
                          <h5>收货人信息</h5>
                          <div class="address">
                                  <i>收货人 ：</i><span class="addr-name"><?php echo $row2[3]; ?></span>
                                  <i>地 址 ：</i><span class="addr-address"><?php  echo $row2[1]; ?></span>
                                  <i>手机号码 ：</i><span class="addr-phone"><?php  echo $row2[4]; ?></span>
                          </div>
                    </div>
                    <!-- 收货信息End -->
                    <!-- 订单状态及确认收货操作Begin -->
                      <?php
                                   $result3=mysql_query("select * from order_state where stateId='".$row1[3]."';");  //订单状态表
                                   $row3=mysql_fetch_row($result3);

                      ?>
                    <div class="right fr">
                            <h5>订单状态:</h5>
                            <p><?php echo $row3[1]; ?></p>
                           <form action="order-state-edit.php?">
                                <input type="hidden" value="<?php echo $row1[0]; ?>" name="orderId">
                                <select name="states" class="states">
                                      <?php
                                           $state=mysql_query("select * from order_state;");  //订单状态表
                                           while ( $stateRs=mysql_fetch_row($state)) {
                                                if ($stateRs[1]==$row1[3]) {

                                                }

                                      ?>
                                     <option value="<?php echo $stateRs[0]; ?>" <?php  if ($stateRs[0]==$row1[3]) { ?> selected="selected" <?php } ?>>
                                            <?php echo $stateRs[1]; ?>   <!--选项的值-->
                                     </option>
                                      <?php
                                            }
                                      ?>
                                </select>
                                <input type="submit" value="修改状态" class="submit">
                           </form>
                    </div>
                    <!-- 订单状态及确认收货操作End -->
            </div>
            <!-- -------------------------------------------订单商品信息 Begin -->
             <div class="box">
                    <h5>送货清单</h5>
            <?php
                          $allPrice=0;
                          $allNum=0;
                          //根据$orderId获取订单详情表的商品
                         $result3=mysql_query("select * from order_detail where orderId='".$orderId."';");  //订单详情表
                         while($row3 = mysql_fetch_row($result3)){
                               // echo $row3[2];   //订单详情对应的商品id
                               // echo $row3[3];  //订单对应商品的商品数量
                                $result4=mysql_query("select * from product where prodId='".$row3[2]."';");   //商品信息表
                                $row4 = mysql_fetch_row($result4);
                                 // echo $row4[1];   //商品名
                                 // echo $row4[5];   //商品单价
                                 $allNum=$allNum+$row3[3];
                                 $allPrice = $allPrice +$row3[3]*$row4[5];
            ?>
                    <!-- 订单商品详情 Begin -->
                    <div class="product clearfix">
                            <a class="product-img fl" href="goods-details.php?id=<?php echo $row3[2]; ?>" target="_blank">

         <?php
                 $img=$row4[8];
                 $imgs=explode(",",$img);
                 foreach ($imgs as $key => $value) {
                        if ($key==0 && $value!="") {
       ?>

                                <img src="../admin/<?php   echo $value ?>">      <!--商品图片-->

       <?php
                        }else  if($key==0 && $value==""){
                                echo "暂无图片";
                        }
                    }
        ?>
                            </a>
                            <div class="product-info fl">
                                    <h3 class="title"><a href="goods-details.php?id=<?php echo $row3[2]; ?>" target="_blank"><?php echo $row4[1]; ?></a></h3>
                                    <p>
            <?php
                     $attr = "SELECT * FROM attribute where prodId='".$row4[0]."';";                   //SQL查询语句 -----在此处改表名
                      $attrRs = mysql_query($attr, $conn);                     //执行sql查询
                     while ($attrName=mysql_fetch_row($attrRs)){
                           echo"<span>".$attrName[2]."</span>";     //循环输出属性名称
                    }
          ?>
                                    </p>

                           </div>
                            <div class="product-price fr">
                                     <span class="price">￥<i><?php echo $row4[5]; ?></i> </span>
                                     <span class="num">x <i> <?php echo $row3[3]; ?></i></span>
                            </div>
                  </div>
<?php
  }
?>
                 <!--  <div class="product clearfix">     订单商品的静态样式
                            <a class="product-img fl" href="" target="_blank">
                                    <img src="../images/cart-goods1.png">
                            </a>
                            <div class="product-info fl">
                                    <h3 class="title"><a href="" target="_blank">R9s Plus 玫瑰金 6G+64GB</a></h3>
                                    <p>玫瑰金|全网通|64G</p>

                           </div>
                            <div class="product-price fr">
                                     <span class="price">￥3499.00</span>
                                     <span class="num">x 1</span>
                            </div>
                  </div> -->
            </div>
            <!-- 订单商品详情End -->
            <!-- 订单总信息Begin -->
            <div class="get-all">
                      共<span class="all-num"><?php   echo $allNum; ?></span>件商品 ,
                       订单总额:
                      <span class="all-price">￥ <?php  echo $allPrice; ?></span>
            </div>
            <!-- 订单总信息End -->
        </div>
</div>
<!--管理员信息管理主体部分 End-->

</body>
</html>