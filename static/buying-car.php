<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-购物车</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/buying-car.css"/>
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
            <a href="buying-order.php">
                <i class="fa fa-bell" aria-hidden="true"></i>
                我的订单</a>
        </div>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->
<!--------------------------------------------面包屑导航wrapper Begin-->
<div class="wrapper w">
    <ul class="breadcrumb">
        <li><a href="../index.php">首 页 </a></li>
        <li> / </li>
        <li>购物车</li>
    </ul>
</div>
<!-- 面包屑导航 wrapper End-->
<!------------------------------------------ 购物车内容cart-box Begin-->
<div class="cart-box w">
    <!---------------------------- 购物车列表表单-->
        <form action="buying-order-make.php" method="get" class="w">
        <!-- <form action="make-order.php" method="get" class="w"> -->
                <div class="cart-list-box">
                    <!--------- 购物车列表头部---->
                        <ul class="cart-list-header">
                                <li class="one">
                                        <input type="checkbox" name="checkbox1" class="allSelect" id="allSelect">
                                        <span>全选</span>
                                </li>
                                <li class="two">商品名称</li>
                                <li class="three">数量</li>
                                <li class="four">单价</li>
                                <li class="five">操作</li>
                        </ul>
                        <!--------- 购物车商品列表---->
                        <div class="cart-list-content">
                           <!-- 商品购买信息   静态样式-->
              <!--            <div class="cart-product cart-product-l">
                                        <div class="cart-product-choice fl">
                                                <input type="checkbox" name="checkbox1" class="select">
                                                <a class="cart-product-image" href="" target="_blank">
                                                        <img src="../images/cart-goods1.png">
                                                </a>
                                        </div>
                                        <div class="cart-product-info fr">
                                                <div class="cart-product-description">
                                                        <h3 class="heading"><a href="" target="_blank">R9s Plus 玫瑰金 6G+64GB</a></h3>
                                                        <p>玫瑰金|全网通|64G</p>
                                                </div>
                                                <div class="counter-box">
                                                        <a class="btn-minus">-</a>
                                                        <input type="text" name="number" class="number" value="5"/>
                                                        <a class="btn-plus">+</a>
                                                </div>
                                                <div class="cart-product-price">
                                                        <span class="normal">￥3499.00</span>
                                                </div>
                                                <div class="cart-product-delete cart-product-delete-word">删除</div>
                                        </div>
                                </div> -->
                            <!-- 商品购物车信息-->
<?php
        $userId = $_SESSION['userId'];
        $q1= "SELECT * FROM cart where userId = '".$userId ."' order by cartAddTime DESC;";                   //SQL查询语句 -----在此处改表名
        $rs1= mysql_query($q1,$conn);                     //执行sql查询
         while ($row1=mysql_fetch_row($rs1)){
            // echo $row1[0]."购物车id";
            // echo $row1[1];
?>
                                <div class="cart-product cart-product-l">
                                            <div class="cart-product-choice fl">
                                                        <input type="checkbox" name="checkbox[]" class="select" value="<?php echo $row1[0]; ?>">
                                            <?php
                                                        $result=mysql_query("select * from product where prodId='".$row1[2]."';");  //从数据库调取登录名为...的数据
                                                        $row = mysql_fetch_row($result);
                                            ?>
                                                        <input type="hidden" value="<?php echo $row[3]; ?>" class="inventor">
                                                        <a href="goods-details.php?id=<?php echo $row1[2]; ?>" class="cart-product-image" href="" target="_blank">
        <?php
                 $q2= "SELECT * FROM product where prodId = '".$row1[2]."';";                   //SQL查询语句 -----在此处改表名
                $rs2= mysql_query($q2,$conn);                     //执行sql查询
                 $row2 = mysql_fetch_row($rs2);                   //商品信息  $row1[2]和$row2[0]---商品id
                 $img=$row2[8];
                 $imgs=explode(",",$img);
                 foreach ($imgs as $key => $value) {
                        if ($key==0 && $value!="") {
       ?>
                                <img src="../admin/<?php   echo $value ?>">
       <?php
                        }else  if($key==0 && $value==""){
                                echo "暂无图片";
                        }
                    }
        ?>
                                                        </a>
                                            </div>
                                            <div class="cart-product-info fr">
                                                        <div class="cart-product-description">
                                                                <h3 class="heading"><a href="goods-details.php?id=<?php echo $row1[2]; ?>" target="_blank"><?php echo $row2[1]; ?></a></h3>
                                                                <p>
         <?php
                     $attr = "SELECT * FROM attribute where prodId='".$row1[2]."';";                   //SQL查询语句 -----在此处改表名
                      $attrRs = mysql_query($attr, $conn);                     //执行sql查询
                     while ($attrName=mysql_fetch_row($attrRs)){
                           echo"<span>".$attrName[2]."</span>";     //循环输出属性名称
                    }
         ?>
                                                                 </p>
                                                        </div>
                                                        <div class="counter-box">
                                                                <a class="btn-minus">-</a>
                                                                <input type="text"  name="number" class="number" value="<?php echo $row1[3]; ?>"/>
                                                                <a class="btn-plus">+</a>
                                                        </div>
                                                        <div class="cart-product-price">
                                                                ￥<span class="normal"><?php echo $row[5]; ?></span>
                                                        </div>
                                                        <div class="cart-product-delete cart-product-delete-word"><a  href="buying-car-del.php?id=<?php echo $row1[2]; ?>">删除</a></div>
                                            </div>
                                </div>
<?php

        }
?>


                                <div>
                                        <input type="submit" name="submit" value="去结算" class="fr btn-order" id="btn">
                                        <p class="fr amount">总计:  <span class="allPrice">0</span> <span class="allNum">(共3件商品)</span> </p>
                                </div>
                        </div>
                </div>
        </form>


</div>
<!--购物车内容cart-box End-->
<script src="../js/jquery.min.js"></script>
<script src="../js/base.js"></script>
<script src="../js/index.js"></script>
<script src="../js/buying-car.js"></script>
</body>
</html>