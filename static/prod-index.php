<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="keywords" content="哆咪手机,oppo,新品,哆咪"/>
    <meta name="description" content="哆咪手机商城,oppo新品,充电两分钟,通话两小时!"/>
    <title>哆咪-OPPO</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/prod-index.css"/>
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
                <a href="javascript:;">我的哆咪</a>
                <i class="icon-arrow"><s>◇</s></i>
            </li>
            <li class="spacer"></li>
            <li class="fore3 dropdown">
                <a href="javascript:;">我的订单</a>
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

<!-- -------------------------------------logo\搜索栏\购物车 dm-header  Begin -->
<div class="dm-header w">
    <div class="logo fl">
        <a href="../index.php"><h1>哆咪手机商城</h1></a>
    </div>
    <!-- 商品搜索部分Begin -->
    <form class="search fl" action="prod-search.php">
        <input type="text" class="search-txt" name="search" placeholder="请输入搜索关键字"/>
        <input type="button" class="search-btn" value="搜 索"/>
    </form>
    <!-- 商品搜索部分End -->
    <div class="cart fr">
        <i class="fa fa-shopping-cart icon-4x" aria-hidden="true"></i>
        <a href="javascript:;">我的购物车  <span class="arrow-right"> > </span></a>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->
<!-- -------------------------------------导航栏dm-nav Begin-->
<div class="dm-nav w">
    <ul class="nav">
        <li><a href="../index.php">首页</a></li>
        <li><a href="javascript:;" class="col-main">品牌汇</a></li>
        <li><a href="prod-other.php?id=1">手机配件</a></li>
        <li><a href="prod-new.php">新品发布</a></li>
        <li><a href="topic.php">手机社区</a></li>
        <li><a href="duomi.php">哆咪文化</a></li>
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
                  if ($count2>0  && $row1[0]!=1 ) {
?>
             <a href="prod-index.php?id=<?php echo $row1[0]; ?>"><?php echo  $row1[1]; ?></a>
<?php
                  }
    }
?>

        </li>
    </ul>
</div>
<!-- 导航栏 End-->
<!-- -------------------------------------------------------------------------通用头部 分界线 -->
<?php
        $prodTypeId = $_GET['id'];   //当前商品分类id
        $q0 = "SELECT * FROM prod_type where prodTypeId=$prodTypeId;";                   //SQL查询语句 -----在此处改表名
        $rs0= mysql_query($q0, $conn);                     //执行sql查询
        $row0=mysql_fetch_row($rs0);    //商品类名$row0[1]
?>

<div class="oppo-logo w">
    品牌汇 / <i><?php echo $row0[1]; ?></i>
</div>
<!---------------------------主要产品oppo-main-content Begin -->
<div class="oppo-main-content w clearfix">
    <div class="oppo-main-left fl">
    <!-- 第一个主要产品 Begin -->
        <?php
                $q2 = "SELECT * FROM product where prodTypeId=$prodTypeId order by salsNum DESC limit 0,1;";                   //SQL查询语句 -----在此处改表名
                $rs2= mysql_query($q2, $conn);                     //执行sql查询
                $row2=mysql_fetch_row($rs2);    //获取该分类下销量第一的商品
         ?>
        <a href="goods-details.php?id=<?php echo $row2[0];?>" class="oppo-left-top">
        <?php
                 $img=$row2[8];
                 $imgs=explode(",",$img);
                 foreach ($imgs as $key => $value) {
                        if ($key==0 && $value!="") {
        ?>
            <img src="../admin/<?php   echo $value ?>" alt="" class="photo"/>
        <?php
                        }else  if($key==0 && $value==""){
                                echo "暂无图片";
                        }
                 }
        ?>
            <div class="content">
                    <h5><?php echo $row2[1]; ?></h5>
             <?php
                         $attr = "SELECT * FROM attribute where prodId='".$row2[0]."';";
                          $attrRs = mysql_query($attr, $conn);
                         while ($attrName=mysql_fetch_row($attrRs)){
                               echo"<p class='attitude'>".$attrName[2]."</p>";     //循环输出属性名称
                        }
             ?>
                    <p class="price">￥<?php echo $row2[5]; ?></p>
            </div>
        </a>
        <!-- 第二个主要产品内容Begin -->
     <?php
                $q3 = "SELECT * FROM product where prodTypeId=$prodTypeId order by salsNum DESC limit 1,1;";                   //SQL查询语句 -----在此处改表名
                $rs3= mysql_query($q3, $conn);                     //执行sql查询
                $row3=mysql_fetch_row($rs3);    //获取该分类下销量第一的商品
     ?>
        <a href="goods-details.php?id=<?php echo $row3[0];?>" class="oppo-left-bottom">
        <?php
                 $img=$row3[8];
                 $imgs=explode(",",$img);
                 foreach ($imgs as $key => $value) {
                        if ($key==0 && $value!="") {
        ?>
            <img src="../admin/<?php   echo $value ?>" alt="" class="photo"/>
        <?php
                        }else  if($key==0 && $value==""){
                                echo "暂无图片";
                        }
                 }
        ?>
            <div class="content">
                    <h5><?php echo $row3[1]; ?></h5>
             <?php
                         $attr = "SELECT * FROM attribute where prodId='".$row3[0]."';";
                          $attrRs = mysql_query($attr, $conn);
                         while ($attrName=mysql_fetch_row($attrRs)){
                               echo"<p class='attitude'>".$attrName[2]."</p>";     //循环输出属性名称
                        }
             ?>
                    <p class="price">￥<?php echo $row3[5]; ?></p>
            </div>
        </a>
    </div>
    <div class="oppo-main-right fr">
    <!-- 第三个主要产品Begin -->
    <?php
                $q4 = "SELECT * FROM product where prodTypeId=$prodTypeId order by salsNum DESC limit 2,1;";                   //SQL查询语句 -----在此处改表名
                $rs4= mysql_query($q4, $conn);                     //执行sql查询
                $row4=mysql_fetch_row($rs4);    //获取该分类下销量第一的商品
    ?>
        <a href="goods-details.php?id=<?php echo $row4[0];?>">
            <?php
                 $img=$row4[8];
                 $imgs=explode(",",$img);
                 foreach ($imgs as $key => $value) {
                        if ($key==0 && $value!="") {
           ?>
            <img src="../admin/<?php   echo $value ?>" alt="" class="photo"/>
            <?php
                            }else  if($key==0 && $value==""){
                                    echo "暂无图片";
                            }
                     }
            ?>
             <div class="content">
                    <h5><?php echo $row4[1]; ?></h5>
             <?php
                         $attr = "SELECT * FROM attribute where prodId='".$row4[0]."';";
                          $attrRs = mysql_query($attr, $conn);
                         while ($attrName=mysql_fetch_row($attrRs)){
                               echo"<p class='attitude'>".$attrName[2]."</p>";     //循环输出属性名称
                        }
             ?>
                    <p class="price">￥<?php echo $row4[5]; ?></p>
            </div>
        </a>
    </div>
</div>
<!--主要产品oppo-main-content End -->
<!-- ------------------------------------------------------产品系列oppo-goods Begin -->
<div class="oppo-goods w clearfix">
    <div class="oppo-goods-title"><?php echo $row0[1]; ?>产品系列 <i class="left"></i> <i class="right"></i></div>
    <ul class="goods-content">
<!--         <li>    商品静态样式
            <a href="#" class="picture"><img src="../images/oppo-goods2.jpg" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li> -->
            <?php
                $q6 = "SELECT * FROM product where prodTypeId=$prodTypeId;";
                $rs6= mysql_query($q6, $conn);
                $count6 = mysql_num_rows($rs6);
                // echo $count6;  //先统计该类别下有多少款产品
                $q7 = "SELECT * FROM product where prodTypeId=$prodTypeId order by salsNum DESC limit 3,$count6;";                   //SQL查询语句 -----在此处改表名
                $rs7= mysql_query($q7, $conn);                     //执行sql查询
                while ($row7=mysql_fetch_row($rs7)) {

          ?>
        <li>
                <a href="goods-details.php?id=<?php echo $row7[0];?>" class="picture">
                <?php
                     $img=$row7[8];
                     $imgs=explode(",",$img);
                     foreach ($imgs as $key => $value) {
                            if ($key==0 && $value!="") {
               ?>
                      <img src="../admin/<?php   echo $value ?>" alt=""/>
                <?php
                                }else  if($key==0 && $value==""){
                                        echo "暂无图片";
                                }
                         }
                ?>
                </a>
                <a href="goods-details.php?id=<?php echo $row7[0];?>" class="content">
                        <p class="goods-title"><?php echo $row7[1]; ?></p>
                        <p class="goods-title"><i> ￥<?php echo $row7[5]; ?> </i></p>
                </a>
        </li>
        <?php
                }
        ?>
    </ul>
</div>
<!--产品系列oppo-goods End-->
<?php
    if ($row0[0]==2 ) {
?>
<!---------------------------------------------------------产品特色 oppo-features Begin-->
<div class="oppo-features w clearfix">
    <div class="oppo-features-title">OPPO产品特色 <i class="left"></i> <i class="right"></i></div>
    <div class="features-content">
        <div class="features-left fl">
            <a href="#">
                <img src="../images/oppo-features1.jpg" alt=""/>
            </a>
        </div>
        <div class="features-right fr">
            <a href="#">
                <img src="../images/oppo-features2.jpg" alt=""/>
            </a>
        </div>
    </div>
</div>
<!--产品特色 oppo-features End-->
<?php
    }
?>
<!---------------------------------------------------------------------------------------------底部通用 分界线 -->
<div class="footer">
    <div class="w">
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

<script src="../js/jquery.min.js"></script>
<script src='../js/oppo-index.js'></script>
<script src="../js/base.js"></script>
<script src="../js/go-to-car.js"></script>
<script src="../js/go-to-order.js"></script>
<script src="../js/go-to-user.js"></script>
<script src="../js/search.js"></script>
</body>
</html>