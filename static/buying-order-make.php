<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-确认信息</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/buying-order-make.css"/>
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
<!-- <div class="wrapper w">
    <ul class="breadcrumb">
        <li><a href="../index.php">首 页 </a></li>
        <li> / </li>
        <li>确认订单</li>
    </ul>
</div> -->
<!-- 面包屑导航 wrapper End-->
<!------------------------------------------ 确认订单内容 Begin-->
<div class="w order-top">填写并核对订单信息</div>
<form action="buying-order.php" method="get" class="order-form w">
          <!--------- 订单收货地址选择  -->
            <div class="box">
                    <h5>收货人信息</h5>
                    <a class="add-address">新增收货地址</a>
                    <input type="hidden" class="address" name="address" value="1">
                    <div class="address">
                            <span class="addr-name">收货人姓名</span>
                            <span class="addr-address">收货人地址</span>
                            <div>
                                     <a class="addr-edit">编辑</a>
                                     <a class="addr-del">删除</a>
                            </div>
                    </div>
                     <div class="address">
                            <span class="addr-name">收货人姓名</span>
                            <span class="addr-address">收货人地址</span>
                            <div>
                                     <a class="addr-edit">编辑</a>
                                     <a class="addr-del">删除</a>
                            </div>
                     </div>
            </div>
            <!-- -------------------------------------------订单商品信息 Begin -->
             <div class="box">
                    <h5>送货清单</h5>
<?php
      $checks = $_REQUEST['checkbox'];
      foreach ($checks as $key => $value) {
              // echo $key."索引";    //这个可以得到被选中的又多少商品
              // echo $value."复选框值";    //该用户下选中的购物车id的商品

             $result2=mysql_query("select * from cart where id='".$value."';");  //购物车表
             $row2 = mysql_fetch_row($result2);
             // echo $row2[2];   //购物车id对应的商品id

             $result3=mysql_query("select * from product where prodId='".$row2[2]."';");   //商品信息表
             $row3 = mysql_fetch_row($result3);
             // echo $row3[1];   //商品名

?>
                    <!--  通过隐藏表单元素传递购物车id对应的订单商品 -->
                    <input type="hidden" name="checkbox[]" value="<?php echo $value; ?>">
                    <div class="product clearfix">
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
                     $attr = "SELECT * FROM attribute where prodId='".$row2[2]."';";                   //SQL查询语句 -----在此处改表名
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
            <!-- 订单商品信息End -->

            <!-- 订单总信息 -->
            <div class="all">
                        应付总额: ￥9888.00
            </div>

            <input type="submit" name="submit" value="确认订单">
</form>
<!--购物车内容order-form End-->
<script src="../js/jquery.min.js"></script>
<script src="../js/base.js"></script>
<script src="../js/index.js"></script>
</body>
</html>