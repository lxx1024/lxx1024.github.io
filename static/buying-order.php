<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-订单详情</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/buying-order.css"/>
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
    </ul>
</div>
<!-- 面包屑导航 wrapper End-->
<!------------------------------------------ 我的订单 Begin-->
<div class="order-form w">
            <ul class="nav clearfix">
                    <li class="current">全部订单 <span></span></li>
                    <li>待收货</li>
            </ul>
            <ul class="order-box clearfix">
            <!-- 全部订单内容 Begin -->
                    <li class="current">
                            <!-- 订单内容Begin -->
                            <?php
                                     $userId=$_SESSION['userId'];
                                     $result1=mysql_query("select * from orders where userId='".$userId."';");  //订单表
                                     while($row1 = mysql_fetch_row($result1)){
                                            // echo $row1[0]."订单";
                                            // echo $row1[1]."用户";
                                            // echo $row1[2]."地址";
                                            // echo $row1[3]."状态";
                                            // echo $row1[4]."时间";
                            ?>
                            <div class="orders clearfix">
                                    <div class="message">
                                            <span><?php  echo $row1[4]; ?></span>
                                            订单编号:<span class="order-id"><?php  echo $row1[0]; ?></span>
                                    </div>
                                    <div class="product fl">
                                    <?php
                                            $result2=mysql_query("select * from order_detail where orderId='".$row1[0]."';");  //订单详情表
                                            $allPrice = 0;
                                            while($row2 = mysql_fetch_row($result2)){
                                                // echo $row2[1]; //订单id  ----- $row1[0]
                                                // echo $row2[2]; //商品id
                                                // echo $row2[3]; //商品数量
                                                $result3=mysql_query("select * from product where prodId='".$row2[2]."';");  //商品信息表
                                                $row3= mysql_fetch_row($result3);
                                                // echo $row3[1];  //商品名称
                                                $allPrice = $allPrice + $row2[3]*$row3[5];   //订单总额
                                    ?>
                                           <!-- 订单里的商品详情Begin -->
                                            <div class="prod-details clearfix">

                                                     <a class="product-img fl" href="" target="_blank">
                                                    <?php
                                                             $img=$row3[8];
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
                                                            <h3 class="title"><a href="" target="_blank"><?php echo $row3[1]; ?></a></h3>
                                                            <p>
                                                            <?php
                                                                     $attr = "SELECT * FROM attribute where prodId='".$row3[0]."';";                   //SQL查询语句 -----在此处改表名
                                                                      $attrRs = mysql_query($attr, $conn);                     //执行sql查询
                                                                     while ($attrName=mysql_fetch_row($attrRs)){
                                                                           echo"<span>".$attrName[2]."</span>";     //循环输出属性名称
                                                                    }
                                                          ?>
                                                          </p>
                                                   </div>
                                                    <div class="product-price fr">
                                                             <span class="price">￥<?php echo $row3[5]; ?></span>
                                                             <span class="num">x <?php echo $row2[3]; ?></span>
                                                    </div>
                                            </div>
                                            <!-- 订单里的商品详情End -->
                                        <?php
                                             }
                                        ?>
                                    </div>
                                    <div class="other fl">
                                            <span class="addr-name">张三</span><br/>
                                            <span class="addr">  广州市天河区中山大道西 18819462390</span>
                                    </div>
                                    <div class="other fl">
                                            订单总额 <br/>
                                            <span class="price">￥<?php echo $allPrice; ?></span>
                                    </div>
                                    <div class="other fl">
                                            订单状态<br/>
                                            <span class="state">待发货</span><br/>
                                            <a href="#">订单详情</a>
                                    </div>
                                    <div class="other fl">
                                            订单操作<br/>
                                            <a href="buying-order-cancel.php" class="make">确认收货</a><br/>
                                            <a href="buying-order-cancel.php" class="cancel">取消订单</a>
                                    </div>
                            </div>

                            <!-- 订单内容End -->
                            <?php
                                }
                            ?>
                    </li>
            <!-- 全部订单内容 End -->
            <!-- 待收货订单内容Begin -->
                    <li>待收货内容</li>
            </ul>
            <!-- 待收货订单内容End -->
</div>
<!--购物车内容order-form End-->
<script src="../js/jquery.min.js"></script>
<script src="../js/base.js"></script>
<script src="../js/index.js"></script>
<script src="../js/buying-order.js"></script>
</body>
</html>