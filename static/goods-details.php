<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-商品详情</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/goods-details.css"/>
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
<!-- -------------------------------------logo\导航栏 dm-header  Begin -->
<div class="dm-header w">
    <div class="logo fl">
        <a href="../index.php"><h1>哆咪手机商城</h1></a>
    </div>
    <ul class="goods-nav fl">
        <li><a href="../index.php">首页</a></li>
        <li><a href="javascript:;">品牌汇</a></li>
        <li><a href="prod-index.php?id=1">手机配件</a></li>
        <li><a href="prod-new.php">新品发布</a></li>
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
        <a href="javascript:;">
                <i class="fa fa-shopping-cart icon-4x" aria-hidden="true"></i>
                 购物车  <span class="arrow-right"> > </span>
        </a>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->
<?php
        include "../conn/conn.php";
        $id = intval($_GET['id']);
        $q1 = "SELECT * FROM product where prodId='".$id."';";                   //SQL查询语句 -----在此处改表名
        $rs1= mysql_query($q1, $conn);
        $row1 = mysql_fetch_row($rs1);                      //商品信息记录

        $q2 = "SELECT * FROM prod_type where prodTypeId='".$row1[2]."';";                   //SQL查询语句 -----在此处改表名
        $rs2= mysql_query($q2, $conn);
        $row2 = mysql_fetch_row($rs2);                    //商品分类信息记录
?>
<!--------------------------------------------面包屑导航wrapper Begin-->
<div class="wrapper w">
    <ul class="breadcrumb">
        <li><a href="../index.php">首 页 </a></li>
        <li> / </li>
        <li><a href="prod-index.php?id=<?php echo $row2[0]; ?>"><?php echo $row2[1];?></a></li>
        <li> / </li>
        <li><?php echo $row1[1];?></li>
    </ul>
</div>
<!-- 面包屑导航 wrapper End-->
<!-------------------------------------------商品选购内容 Begin-->
<div class="buying-details w clearfix">
    <!------------------ 商品图片信息buying-preview ------------------->
    <div class="buying-preview fl">
        <!-- ------商品大图信息main-img -->
        <ul class="main-img clearfix">
           <!-- <li>     静态样式
                <img src="../images/details-R9s-big2.jpg" alt=""/>
            </li> -->
        <?php
                 $img1=$row1[8];
                 if ($img1!="") {

                 $imgs1=explode(",",$img1);
                 foreach ($imgs1 as $key1 => $value1) {
        ?>
            <li>
                <img src="../admin/<?php   echo $value1 ?>" alt=""/>
            </li>
      <?php
                    }
                 }else{
                    echo "暂无图片";
                 }
        ?>

        </ul>
        <!----- 商品小图列表spec-items------>
        <ul class="spec-items clearfix">
<!--      <li>    静态样式
                 <img src="../images/details-R9s-1.jpg" alt=""/>
            </li> -->
         <?php
                if ($img1!="") {
                 foreach ($imgs1 as $key1 => $value1) {
        ?>
            <li>
                <img src="../admin/<?php   echo $value1 ?>" alt=""/>
            </li>
      <?php
                    }
               }else{
                    echo "暂无图片";
                 }
        ?>

        </ul>
        <!--商品图片底部信息preview-info -->
        <div class="preview-info">
            <div class="left-btns fl">
                <a href="javascript:;"><i class="fa fa-heart" aria-hidden="true"></i> 关注 </a>
                <a href="javascript:;"><i class="fa fa-share-alt" aria-hidden="true"></i> 分享 </a>
                <a href="javascript:;"><i class="fa fa-arrows-v" aria-hidden="true"></i> 对比 </a>
            </div>
            <div class="right-btns fr">
                <a href="javascript:;">举报</a>
            </div>
        </div>
    </div>
    <!---- ----------------- 商品内容信息buying-itemInfo ----------------- -->
    <div class="buying-itemInfo fr clearfix">
        <h2 class="product-title">
            <?php echo $row1[1]; ?>
        </h2>
        <p class="product-summary">
           <!--  6寸超清大屏，6GB运存+64GB内存，正面指纹识别，4000mAh大电池，充电5分钟通话2小时 -->
            <?php echo $row1[6]; ?>
        </p>
        <p class="product-price">
            ￥<?php echo $row1[5]; ?>
            <span id="inventor">库存: <i><?php echo $row1[3]; ?></i></span>
            <span id="inventor">销量: <i><?php echo $row1[4]; ?></i></span>
        </p>
        <div class="add-cart-form">
                <!--商品选购属性/颜色,容量,网络product-attribute-->
                <div class="product-attribute">
                        <!--   <div class="attribute clearfix">    静态样式
                                <p class="fl">颜色</p>
                                <a href="javascript:;">玫瑰金</a>
                        </div> -->
         <?php
                     $attr = "SELECT * FROM attribute where prodId='".$row1[0]."';";                   //SQL查询语句 -----在此处改表名
                      $attrRs = mysql_query($attr, $conn);                     //执行sql查询
                     while ($attrName=mysql_fetch_row($attrRs)){
                            $attr1 = "SELECT * FROM attrType where attrTypeId='".$attrName[3]."';";                   //SQL查询语句 -----在此处改表名
                            $attrRs1 = mysql_query($attr1, $conn);                     //执行sql查询
                            $attrName1=mysql_fetch_row($attrRs1);

             ?>
                     <div class="attribute clearfix">
                                <p class="fl"><?php echo $attrName1[1];?></p>
                                <a href="javascript:;"><?php echo $attrName[2];?></a>
                        </div>
             <?php
                      }
             ?>


                </div>
                <!----------------------- 商品选购服务信息 product-service-->
                <div class="product-service">
                    <p class="fl">服务</p>
                    <ul class="service-list fl">
                        <li><a href="javascript:;"><i>厂</i>厂家服务</a></li>
                        <li><a href="#"><i>承</i>哆咪承诺</a></li>
                        <br/>
                        <li><a href="javascript:;"><i>正</i>正品行货</a></li>
                        <li><a href="javascript:;"><i>保</i>全国联保</a></li>
                    </ul>
                </div>
                <!---------------------- 修改数量,提交到购物车或立即购买buying-actions-->
                <div class="buying-actions">
                        <div class="counter-box fl">
                                <a class="btn-minus">－</a>
                                <input type="text" class="number" value="1"/>
                                <a class="btn-plus">+</a>
                        </div>
                        <div class="button-container fr">
                                <a href="javascript:;" class="button-primary fr">立即购买</a>
                                <a href="javascript:;" class="button-light fr">加入购物车</a>
                        </div>
                </div>
        </div>
        <!-- ----- 配送信息提示delivery-specs ------>
        <div class="delivery-specs">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;温馨提示&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp;
            顺丰包邮&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp;
            支持7天无理由退货&nbsp;&nbsp;&nbsp;&nbsp;·&nbsp;&nbsp;&nbsp;&nbsp;购物返积分
        </div>
    </div>
</div>
<!-- 商品选购内容 End-->
<!--------------------------------------------------- 商品详情信息 Begin-->
<div class="product-details w">

</div>
<!-- 商品详情信息 End -->

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
<!-- 底部 End -->
<script src="../js/jquery.min.js"></script>
<script src="../js/base.js"></script>
<script src="../js/index.js"></script>
<script src="../js/goods-details.js"></script>
<script src="../js/go-to-car.js"></script>
<script src="../js/go-to-order.js"></script>
<script src="../js/go-to-user.js"></script>
</body>
</html>