<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="keywords" content="哆咪手机,手机,手机通讯,运营商手机,手机配件,哆咪"/>
    <meta name="description" content="哆咪手机商城,专业提供手机通讯,运营商手机,手机配件等的最新报价、促销、评论、导购、图片等相关信息!为您提供愉悦的网上购物体验!"/>
    <title>哆咪手机商城</title>
    <link rel="shortcut icon" href="www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="Font-Awesome-master/css/font-awesome.min.css">
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
                <a href="static/exit.php">退出</a>
                <?php
            }else{
            ?>
                     <a href="static/login.html" class="col-main">你好，
            <?php
                    echo "请登录";
            ?>
                </a>
                &nbsp;&nbsp;
                <a href="static/register.html">免费注册</a>
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
            <li class="fore5 dropdown">
                <a href="javascript:;">联系客服</a>
                <i class="icon-arrow"><s>◇</s></i>
            </li>
        </ul>
    </div>
</div>
<!-- 通栏 End -->
<div class="main">

<!-- -------------------------------------logo\搜索栏\购物车 dm-header  Begin -->
<div class="dm-header w">
    <div class="logo fl">
        <a href="index.php"><h1>哆咪手机商城</h1></a>
    </div>
    <div class="search fl">
        <input type="text" class="search-txt" placeholder="请输入搜索关键字"/>
        <input type="button" class="search-btn" value="搜 索"/>
    </div>
    <div class="cart fr">
        <i class="fa fa-shopping-cart icon-4x" aria-hidden="true"></i>
        <a href="javascript:;">我的购物车  <span class="arrow-right"> > </span></a>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->
<!-- -------------------------------------导航栏dm-nav Begin-->
<div class="dm-nav w">
    <ul class="nav">
        <li><a href="index.php" class="col-main">首页</a></li>
        <li><a href="javascript:;">品牌汇</a></li>
        <li><a href="#">手机配件</a></li>
        <li><a href="#">新品发布</a></li>
        <li><a href="static/topic.php">手机社区</a></li>
        <li><a href="#">哆咪文化</a></li>
    </ul>
    <ul class="nav-content">
        <li> </li>
        <li>
             <!-- 这是品牌汇下的分类内容Begin -->
<?php
        include "conn/conn.php";       //导入连接数据库php代码
        $q1 = "SELECT * FROM prod_type;";                   //SQL查询语句 -----在此处改表名
        $rs1= mysql_query($q1, $conn);                     //执行sql查询
         while ($row1=mysql_fetch_row($rs1)){
                 $q2 = "SELECT * FROM product where prodTypeId='".$row1[0]."';";                   //SQL查询语句 -----在此处改表名
                  $rs2 = mysql_query($q2, $conn);                     //执行sql查询
                  $count2 = mysql_num_rows($rs2);
                  if ($count2>0 && $row1[0]!=1) {
?>

             <a href="static/prod-index.php?id=<?php echo $row1[0]; ?>"><?php echo  $row1[1]; ?></a>

<?php
                  }
    }
?>
            <!-- 这是品牌汇下的分类内容End -->
        </li>
    </ul>
</div>
<!-- 导航栏 End-->
<!-- --------------------------------------轮播图dm-lbt   Begin-->
<div class="dm-lbt w">
    <ul class="lbt-img">
        <li class="first"><a href="#"><img src="images/lbt1.jpg" alt=""/></a></li>
        <li><a href="#"><img src="images/lbt2.jpg" alt=""/></a></li>
        <li><a href="#"><img src="images/lbt3.jpg" alt=""/></a></li>
        <li><a href="#"><img src="images/lbt4.jpg" alt=""/></a></li>
        <li><a href="#"><img src="images/lbt5.jpg" alt=""/></a></li>
    </ul>
    <div class="lbt-arrow">
        <span class="arrow-left fl"> < </span>
        <span class="arrow-right fr"> > </span>
    </div>
    <ul class="lbt-num">
        <li class="current"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<!-- 轮播图 End-->
<!-- -------------------------------------------- 今日热门dm-today  Begin -->
<div class="dm-today w">
    <ul class="today-title fl">
        <li class="bg-pink new">新 品</li>
        <li class="bg-green">热 销</li>
    </ul>
    <ul class="today-content fr">

<!--         <li>                      静态格式
                <div>
                        <a href="static/goods-details.php" class="prod-pic">
                                <img src="admin/new1.jpg">
                        </a>
                        <a href="static/goods-details.php" class="prod-name">小米</a>
                        <p>￥129 <span>销量99</span></p>
                </div>
        </li>
 -->
        <li class="b-pink new">
                <!-- 这是新品下的商品内容Begin -->
<?php
        $q3 = "SELECT * FROM product where prodTypeId>1 order by prodAddTime DESC limit 0,4;";                   //SQL查询语句 -----在此处改表名
        $rs3= mysql_query($q3, $conn);                     //执行sql查询
         while ($row3=mysql_fetch_row($rs3)){
?>
                <div>
                        <a href="static/goods-details.php?id=<?php echo $row3[0]; ?>" class="prod-pic">
<?php
                 $img=$row3[8];
                 $imgs=explode(",",$img);
                 foreach ($imgs as $key => $value) {
                        if ($key==0 && $value!="") {
?>
                                <img src="admin/<?php   echo $value ?>">
<?php
                        }else  if($key==0 && $value==""){
                                echo "暂无图片";
                        }
                    }
?>
                        </a>
                        <a href="static/goods-details.php?id=<?php echo $row3[0]; ?>" class="prod-name"><?php echo $row3[1]; ?></a>
                        <p>￥<?php echo $row3[5]; ?> <span>销量 <?php echo $row3[4]; ?></span></p>
                </div>

<?php
    }
?>

                <!-- 这是新品下的商品内容end -->
        </li>
        <li class="b-green">

   <!-- 这是热销下的商品内容Begin -->
<?php
        $q4 = "SELECT * FROM product where prodTypeId>1 order by salsNum DESC limit 0,4;";                   //SQL查询语句 -----在此处改表名
        $rs4= mysql_query($q4, $conn);                     //执行sql查询
         while ($row4=mysql_fetch_row($rs4)){
?>
                <div>
                        <a href="static/goods-details.php?id=<?php echo $row4[0]; ?>" class="prod-pic">
<?php
                 $img1=$row4[8];
                 $imgs1=explode(",",$img1);
                 foreach ($imgs1 as $key1 => $value1) {
                        if ($key1==0 && $value1!="") {
?>
                                <img src="admin/<?php   echo $value1 ?>">
<?php
                        }else  if($key1==0 && $value1==""){
                                echo "暂无图片";
                        }
                    }
?>
                        </a>
                        <a href="static/goods-details.php?id=<?php echo $row4[0]; ?>" class="prod-name"><?php echo $row4[1]; ?></a>
                        <p>￥<?php echo $row4[5]; ?>  <span>销量 <?php echo $row4[4]; ?></span></p>
                </div>

<?php
    }
?>
                <!-- 这是热销下的商品内容end -->

        </li>
    </ul>
</div>
<!-- 今日热门dm-today End-->
<!-- ---------------------------------------------品牌汇dm-pinpaihui Begin  -->
<div class="dm-pinpaihui w">
    <div class="clearfix">
        <h2 class="title fl">品牌汇</h2>
        <ul class="classes fr nav">
        <!-- 品牌汇模块下的导航栏 Begin-->
<?php
        $q5 = "SELECT * FROM prod_type;";                   //SQL查询语句 -----在此处改表名
         $rs5= mysql_query($q5, $conn);                     //执行sql查询
         $num5 = 0;
            while ($row5=mysql_fetch_row($rs5)){
                 $q6 = "SELECT * FROM product where prodTypeId='".$row5[0]."';";                   //SQL查询语句 -----在此处改表名
                  $rs6= mysql_query($q6, $conn);                     //执行sql查询
                  $count6 = mysql_num_rows($rs6);
                  if ($count6>0 && $row5[0]!=1) {
                    $num5++;
                         if ($num5<=5) {    //设定五个类以内

?>
            <li><a href="javascript:;"><span><?php echo  $row5[1]; ?></span></a></li>

<?php
                             }
                    }
            }
?>
<!-- 品牌汇模块下的导航栏End -->
        </ul>
    </div>
    <ul class="goods-content clearfix">
    <!--      <li>         静态样式
                <div>
                        <a href="#" class="picture"><img src="images/oppo-goods1.png" alt=""/></a>
                        <a href="#" class="content">
                            <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>
                            <p class="goods-desc">全新配色震撼上市</p>
                        </a>
                </div>
        </li>  -->
<!-- 品牌汇模块下的内容动态php代码    Begin -->
<?php
        $q7 = "SELECT * FROM prod_type;";                   //SQL查询语句 -----在此处改表名
         $rs7= mysql_query($q7, $conn);                     //执行sql查询
         $num7 = 0;
             while ($row7=mysql_fetch_row($rs7)){
                 $q8 = "SELECT * FROM product where prodTypeId='".$row7[0]."';";                   //SQL查询语句 -----在此处改表名
                  $rs8= mysql_query($q8, $conn);                     //执行sql查询
                  $count8 = mysql_num_rows($rs8);
                  if ($count8>0 && $row7[0]!=1) {
                    $num7++;
                         if ($num7<=5) {    //设定五个类以内
?>
            <li>       <!--- ----------------------------   每个类别下对应的商品内容Begin     -->

            <?php
                    $q9 = "SELECT * FROM product where prodTypeId='".$row7[0]."' order by salsNum DESC limit 0,4;";                   //SQL查询语句 -----在此处改表名
                    $rs9= mysql_query($q9, $conn);                     //执行sql查询
                     while ($row9=mysql_fetch_row($rs9)){
            ?>

                            <div>   <!---    一个商品的内容Begin     -->
                                    <a href="static/goods-details.php?id=<?php echo $row9[0]; ?>" class="picture">    <!--图片显示Begin'-->

                            <?php
                                             $img2=$row9[8];
                                             $imgs2=explode(",",$img2);
                                             foreach ($imgs2 as $key2 => $value2) {
                                                    if ($key2==0 && $value2!="") {
                            ?>

                                                            <img src="admin/<?php   echo $value2 ?>">

                            <?php
                                                    }else  if($key2==0 && $value2==""){
                                                            echo "暂无图片";
                                                    }
                                                }
                            ?>

                                    </a>   <!--图片显示End'-->
                                    <a href="static/goods-details.php?id=<?php echo $row9[0]; ?>" class="content">
                                    <p class="goods-title"><?php echo $row9[1]; ?> <br/><i> ￥<?php echo $row9[5]; ?> </i></p>  <!-- 产品信息-->
                                </a>
                            </div>  <!---    一个商品的内容End  -->

            <?php
                }
            ?>

            </li>      <!--- ----------------------------   每个类别下对应的商品内容end     -->
<?php
                             }
                    }
            }
?>
<!-- 品牌汇模块下的内容End -->

    </ul>
</div>
<!-- 品牌汇dm-pinpaihui End  -->
<!--  ---------------------------------------------广告dm-advertise Begin  -->
<div class="dm-advertise w">
   <ul class="clearfix">
       <li><a href="javascript:;"><img src="images/guanggao1.png" alt=""/></a></li>
       <li><a href="javascript:;"><img src="images/guanggao3.png" alt=""/></a></li>
       <li><a href="javascript:;"><img src="images/guanggao4.png" alt=""/></a></li>
   </ul>
</div>
<!-- 广告dm-advertise End  -->
<!-- ---------------------------------------------精选配件dm-peijian  Begin  -->
<div class="dm-peijian w">
    <h2 class="title">精品配件</h2>
    <div class="content">
        <div class="content-left fl">
            <ul class="lbt-img">
                <li class="first"><a href="#"><img src="images/peijian1.jpg" alt=""/></a></li>
                <li><a href="#"><img src="images/peijian2.jpg" alt=""/></a></li>
                <li><a href="#"><img src="images/peijian3.jpg" alt=""/></a></li>
            </ul>
            <ul class="lbt-num">
                <li class="current"></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <ul class="content-right fr">
<!--                 <li>         静态样式
                                <a href="static/goods-details.php" class="prod-pic">
                                        <img src="images/new1.jpg">
                                </a>
                                <a href="static/goods-details.php" class="prod-name">小米</a>
                                <p>￥129 <span>销量99</span></p>
                </li> -->

<?php
        $q10 = "SELECT * FROM product where prodTypeId=1 order by salsNum DESC limit 0,6;";                   //SQL查询语句 -----在此处改表名
        $rs10= mysql_query($q10, $conn);                     //执行sql查询
         while ($row10=mysql_fetch_row($rs10)){
?>
                <li>
                        <a href="static/goods-details.php?id=<?php echo $row10[0]; ?>" class="prod-pic">
<?php
                 $img10=$row10[8];
                 $imgs10=explode(",",$img10);
                 foreach ($imgs10 as $key10 => $value10) {
                        if ($key10==0 && $value10!="") {
?>
                                <img src="admin/<?php   echo $value10 ?>">
<?php
                        }else  if($key10==0 && $value10==""){
                                echo "暂无图片";
                        }
                    }
?>
                        </a>
                        <a href="static/goods-details.php?id=<?php echo $row10[0]; ?>" class="prod-name"><?php echo $row10[1]; ?></a>
                        <p>￥<?php echo $row10[5]; ?>  <span>销量 <?php echo $row10[4]; ?></span></p>
                </li>

<?php
    }
?>










        </ul>
    </div>
</div>
<!-- 精选配件dm-peijian End  -->
</div>

<!--这是分割线-->
<!-- <div class="footer-before">固定滑动效果</div> -->
<div class="footer">
    <div class="w">
        <!--<a href="https://github.com/lxx1024/lxx1024.github.io">源码下载</a>-->
        <div class="footer-logo">哆咪手机商城</div>
        <div class="footer-share clearfix">
            <a href="#"><i class="fa fa-weibo" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-weixin" aria-hidden="true"></i></a>
            <a href="https://github.com/lxx1024/lxx1024.github.io"><i class="fa fa-github" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-android" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-qq" aria-hidden="true"></i></a>
            <i class="line"></i>
            <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i> 哆咪在线客服</a>
        </div>
        <div class="footer-siteLinks">
            <a href="#">新闻中心</a>
            <a href="#">哆咪招聘</a>
            <a href="#">采购平台</a>
            <a href="#">开发者平台</a>
            <a href="#">手机寻回</a>
            <a href="#">网站地图</a>
            <a href="#">手机真伪查询</a>
            <a href="#">免责声明</a>
        </div>
        <div class="footer-copyright">
            <p>COPYRIGHT © 2017-2027
                <br>
                ALL RIGHTS RESERVED.
                <a href="http://www.liangxiaoxin.com/" target="_blank">
                    13信息管理与信息系统 2013034843007 梁小欣
                </a>
            </p>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/base.js"></script>
<script src="js/index.js"></script>
</body>
</html>
