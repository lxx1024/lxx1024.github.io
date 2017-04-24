<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="keywords" content="哆咪手机,oppo,新品,哆咪"/>
    <meta name="description" content="哆咪手机商城,oppo新品,充电两分钟,通话两小时!"/>
    <title>哆咪-OPPO</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/oppo-index.css"/>
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
            <li class="fore2">
                <a target="_blank" href="#">我的订单</a>
            </li>
            <li class="spacer"></li>
            <li class="fore3 dropdown">
                <a target="_blank" href="#">我的哆咪</a>
                <i class="icon-arrow"><s>◇</s></i>
            </li>
            <li class="spacer"></li>
            <li class="fore5 dropdown">
                <a href="javascript:;">关注哆咪</a>
                <i class="icon-arrow"><s>◇</s></i>
            </li>
            <li class="spacer"></li>
            <li class="fore6 dropdown">
                <a href="javascript:;">客户服务</a>
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
    <div class="search fl">
        <input type="text" class="search-txt" placeholder="请输入搜索关键字"/>
        <input type="button" class="search-btn" value="搜 索"/>
    </div>
    <div class="cart fr">
        <i class="fa fa-shopping-cart icon-4x" aria-hidden="true"></i>
        <a href="buying-car.php">我的购物车  <span class="arrow-right"> > </span></a>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->
<!-- -------------------------------------导航栏dm-nav Begin-->
<div class="dm-nav w">
    <ul class="nav">
        <li><a href="#" class="col-main">首页</a></li>
        <li><a href="static/oppo-index.php">品牌汇</a></li>
        <li><a href="#">手机配件</a></li>
        <li><a href="#">新品发布</a></li>
        <li><a href="topic.php">手机社区</a></li>
        <li><a href="#">哆咪文化</a></li>
    </ul>
    <ul class="nav-content">
        <li> </li>
        <li>
             这是品牌汇下的分类内容
        </li>
    </ul>
</div>
<!-- 导航栏 End-->
<!-- -------------------------------------------------------------------------通用头部 分界线 -->
<!--OPPO-logo  -->
<div class="oppo-logo w">
    品牌汇 / <i>OPPO</i>
</div>
<!---------------------------主要产品oppo-main-content Begin -->
<div class="oppo-main-content w clearfix">
    <div class="oppo-main-left fl">
        <a href="goods-details.php" class="oppo-left-top">
            <img src="../images/oppo-rqs1.png" alt="" class="photo"/>
            <img src="../images/oppo-rqs.png" alt="" class="content"/>

        </a>
        <a href="#" class="oppo-left-bottom">
            <img src="../images/oppo-rqplus1.jpg" alt="" class="photo"/>
            <img src="../images/oppo-rqplus.png" alt="" class="content"/>
        </a>
    </div>
    <div class="oppo-main-right fr">
        <a href="#">
            <img src="../images/oppo-A571.jpg" alt="" class="photo"/>
            <img src="../images/oppo-A57.png" alt="" class="content"/>
        </a>
    </div>
</div>
<!--主要产品oppo-main-content End -->
<!-- ------------------------------------------------------产品系列oppo-goods Begin -->
<div class="oppo-goods w clearfix">
    <div class="oppo-goods-title">OPPO产品系列 <i class="left"></i> <i class="right"></i></div>
    <ul class="goods-content">
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods1.png" alt=""/></a>   <!-- 产品图片-->
            <a href="#" class="content">
                <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>  <!-- 产品信息-->
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods2.jpg" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods3.jpg" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods4.jpg" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods5.jpg" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods6.jpg" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s 黑色版 <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods7.png" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods1.png" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
        <li>
            <a href="#" class="picture"><img src="../images/oppo-goods1.png" alt=""/></a>
            <a href="#" class="content">
                <p class="goods-title">R9s <i> ￥2799 </i></p>
                <p class="goods-desc">全新配色震撼上市</p>
            </a>
        </li>
    </ul>
</div>
<!--产品系列oppo-goods End-->
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
</body>
</html>