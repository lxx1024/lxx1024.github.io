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
<!-- -------------------------------------logo\导航栏 dm-header  Begin -->
<div class="dm-header w">
    <div class="logo fl">
        <a href="../index.php"><h1>哆咪手机商城</h1></a>
    </div>
    <ul class="goods-nav fl">
        <li><a href="../index.php">首页</a></li>
        <li><a href="oppo-index.php">品牌汇</a></li>
        <li><a href="#">手机配件</a></li>
        <li><a href="#">以旧换新</a></li>
        <li><a href="community.php">手机社区</a></li>
    </ul>
    <div class="cart fr">
        <a href="#"><i class="fa fa-shopping-cart icon-4x" aria-hidden="true"></i>
        购物车  <span class="arrow-right"> > </span></a>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->
<!--------------------------------------------面包屑导航wrapper Begin-->
<div class="wrapper w">
    <ul class="breadcrumb">
        <li><a href="../index.php">首 页 </a></li>
        <li> / </li>
        <li><a href="#">.......</a></li>
        <li> / </li>
        <li>商品名称</li>
    </ul>
</div>
<!-- 面包屑导航 wrapper End-->
<!-------------------------------------------商品选购内容 Begin-->
<div class="buying-details w clearfix">
    <!------------------ 商品图片信息buying-preview ------------------->
    <div class="buying-preview fl">
        <!-- ------商品大图信息main-img -->
        <ul class="main-img clearfix">
            <li>
                <img src="../images/details-R9s-big1.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-big2.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-big3.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-big4.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-big5.jpg" alt=""/>
            </li>
        </ul>
        <!----- 商品小图列表spec-items------>
        <ul class="spec-items clearfix">
            <li>
                <img src="../images/details-R9s-1.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-2.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-3.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-4.jpg" alt=""/>
            </li>
            <li>
                <img src="../images/details-R9s-5.jpg" alt=""/>
            </li>
        </ul>
        <!------ 商品图片底部信息preview-info ------->
        <div class="preview-info">
            <div class="left-btns fl">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 关注 </a>
                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> 分享 </a>
                <a href="#"><i class="fa fa-arrows-v" aria-hidden="true"></i> 对比 </a>
            </div>
            <div class="right-btns fr">
                <a href="#">举报</a>
            </div>
        </div>
    </div>
    <!------------------- 商品内容信息buying-itemInfo ------------------->
    <div class="buying-itemInfo fr clearfix">
        <h2 class="product-title">
            R9s Plus 金 6G+64GB
        </h2>
        <p class="product-summary">
            6寸超清大屏，6GB运存+64GB内存，正面指纹识别，4000mAh大电池，充电5分钟通话2小时
        </p>
        <p class="product-price">
            ￥3499.00
        </p>
        <div class="add-cart-form">
            <form action="#" id="add-cart-form" onsubmit="return false;">
                <!---------------商品选购属性/颜色,容量,网络product-attribute-->
                <div class="product-attribute">
                    <div class="attribute clearfix">
                        <p class="fl">颜色</p>
                        <ul class="color-list fl">
                            <li><a href="#">玫瑰金</a></li>
                            <li><a href="#">金色</a></li>
                            <li><a href="#">黑色</a></li>
                        </ul>
                    </div>
                    <div class="attribute clearfix">
                        <p class="fl">网络</p>
                        <ul class="color-list fl">
                            <li><a href="#">双网通</a></li>
                            <li><a href="#">全网通</a></li>
                        </ul>
                    </div>
                    <div class="attribute clearfix">
                        <p class="fl">容量</p>
                        <ul class="color-list fl">
                            <li><a href="#">32G</a></li>
                            <li><a href="#">64G</a></li>
                        </ul>
                    </div>
                </div>
                <!----------------------- 商品选购服务信息 product-service-->
                <div class="product-service">
                    <p class="fl">服务</p>
                    <ul class="service-list fl">
                        <li><a href="#"><i>碎</i>屏碎保一年 ￥129</a></li>
                        <li><a href="#"><i>意</i>意外保一年 ￥179</a></li>
                        <li><a href="#"><i>延</i>延保半年￥79</a></li>
                        <li><a href="#"><i>延</i>延保一年￥129</a></li>
                    </ul>
                </div>
                <!---------------------- 修改数量,提交到购物车或立即购买buying-actions-->
                <div class="buying-actions">
                    <div class="counter-box fl">
                        <a class="btn-minus">-</a>
                        <input type="text" class="number" value="1"/>
                        <a class="btn-plus">+</a>
                    </div>
                    <div class="button-container fr">
                        <button class="button-primary fr">立即购买</button>
                        <button class="button-light fr">加入购物车</button>
                    </div>
                </div>
            </form>
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
</body>
</html>