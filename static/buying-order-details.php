<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-订单详情</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/buying-order-details.css"/>
    <link rel="stylesheet" href="../Font-Awesome-master/css/font-awesome.min.css">
</head>
<body>
<?php
      session_start();     //登录系统开启一个session内容
?>
<!-- ------------------------------------通栏dm-shortcut  Begin -->
<div class="dm-shortcut">
    <div class="w">
        <ul class="fl">
            <li class="address dropdown"> 送至 : 广东<i class="icon-arrow"><s>◇</s></i></li>
        </ul>
        <ul class="fr">
            <li class="fore1">
            <!-- 判断会员是否登录 php代码 -->
             <?php
                if( isset($_SESSION["userName"])){     //判断是否存在session对象
            ?>
                     <a href="javascript:;" class="col-main">你好，
            <?php
                    echo "${_SESSION["userName"]}";
             ?>
                </a>
                &nbsp;&nbsp;
                <a href="exit.php">退出</a>
                <?php
            }else{
            ?>
                     <a href="login.html" class="col-main">你好，
            <?php
                    echo "请登录";
            ?>
                </a>
                &nbsp;&nbsp;
                <a href="register.html">免费注册</a>
                <?php
                  }
                  ?>
            </li>
            <li class="spacer"></li>
            <li class="fore2 dropdown">
                <a target="_blank" href="#">我的哆咪</a>
                <i class="icon-arrow"><s>◇</s></i>
            </li>
            <li class="spacer"></li>
            <li class="fore3 dropdown">
                <a target="_blank" href="#">我的订单</a>
                <i class="icon-arrow"><s>◇</s></i>
            </li>
            <li class="spacer"></li>
            <li class="fore6 dropdown">
                <a href="javascript:;">联系客服</a>
                <i class="icon-arrow"><s>◇</s></i>
            </li>
        </ul>
    </div>
</div>
<!-- 通栏 End -->
<!-- -------------------------------------logo\导航栏 dm-header  Begin -->
<div class="dm-header">
    <div class="w">
        <div class="logo fl">
            <a href="../index.php"><h1>哆咪手机商城</h1></a>
        </div>
        <ul class="goods-nav fl">
            <li><a href="../index.php">首页</a></li>
            <li><a href="javascript:;">品牌汇</a></li>
            <li><a href="#">手机配件</a></li>
            <li><a href="#">新品发布</a></li>
            <li><a href="topic.php">手机社区</a></li>
        </ul>
        <ul class="nav-content">
            <li> </li>
            <li>
             <!-- 这是品牌汇下的分类内容 -->


<?php
        include "../conn/conn.php";       //导入连接数据库php代码
        $q1 = "SELECT * FROM prod_type;";                   //SQL查询语句 -----在此处改表名
        $rs1= mysql_query($q1, $conn);                     //执行sql查询
         while ($row1=mysql_fetch_row($rs1)){
                 $q2 = "SELECT * FROM product where prodTypeId='".$row1[0]."';";                   //SQL查询语句 -----在此处改表名
                  $rs2 = mysql_query($q2, $conn);                     //执行sql查询
                  $count2 = mysql_num_rows($rs2);
                  if ($count2>0 && $row1[0]!=1) {

?>

             <a href="prod-index.php?id=<?php echo $row1[0]; ?>"><?php echo  $row1[1]; ?></a>

<?php
                  }
    }
?>

        </li>
    </ul>
        <div class="cart fr">
            <a href="buying-car.php">
                <i class="fa fa-shopping-cart icon-4x" aria-hidden="true"></i>
                 购物车  <span class="arrow-right"> > </span>
           </a>
        </div>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->


<!--------------------------------------------面包屑导航wrapper Begin-->
<div class="wrapper w">
    <ul class="breadcrumb">
        <li><a href="../index.php">我的哆咪 </a></li>
        <li> / </li>
        <li><a href="buying-order.php">我的订单</a></li>
        <li> / </li>
        <li>订单编号: <?php echo $_REQUEST['id'] ; ?></li>
    </ul>
</div>
<!-- 面包屑导航 wrapper End-->
<!------------------------------------------ 订单详情内容 Begin-->
<div class="order-form w">
          <!--------- 收货信息Begin  -->
            <div class="box clearfix">
                    <div class="left fl">
                          <h5>收货人信息</h5>
      <?php
                   $userId = $_SESSION['userId'];    //当前用户id
                   $orderId = $_REQUEST['id'];   //传递的id-----订单id
                   $result1=mysql_query("select * from orders where orderId='".$orderId."';");  //订单表
                   $row1=mysql_fetch_row($result1);
                   // echo $row1[2];   //地址id
                   // echo $row1[3];

                   $result2=mysql_query("select * from address where addressId='".$row1[2]."';");  //收货地址表
                   $row2=mysql_fetch_row($result2);
      ?>

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
       <?php
                   if ($row3[0]<5) {
      ?>
                            <a href="buying-state-edit.php?id=<?php echo $orderId; ?>" onclick="return confirm('确定确认收货?');">确认收货</a>
       <?php
              }
       ?>
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
<!--购物车内容order-form End-->
<script src="../js/jquery.min.js"></script>
<script src="../js/base.js"></script>
<script src="../js/index.js"></script>

</body>
</html>