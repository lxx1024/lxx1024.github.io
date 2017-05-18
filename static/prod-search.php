<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="keywords" content="哆咪手机,oppo,新品,哆咪"/>
    <meta name="description" content="哆咪手机商城,oppo新品,充电两分钟,通话两小时!"/>
    <title>哆咪-商品搜索</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/prod-search.css"/>
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
<?php
    if ($_GET['search']!="") {
         $search=$_GET['search'];
    }else{
        $search="";
    }
?>

<!-- -------------------------------------logo\搜索栏\购物车 dm-header  Begin -->
<div class="dm-header w">
    <div class="logo fl">
        <a href="../index.php"><h1>哆咪手机商城</h1></a>
    </div>
    <!-- 商品搜索部分Begin -->
    <form class="search fl">
        <input type="text" class="search-txt" name="search" value="<?php echo $search; ?>" placeholder="请输入搜索关键字"/>
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
        <li><a href="javascript:;">品牌汇</a></li>
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
        $q7 = "SELECT * FROM product where prodName like '%$search%' or prodDesc like '%$search%' or prodContent like '%$search%';";                   //SQL查询语句 -----在此处改表名
        $rs7= mysql_query($q7, $conn);                     //执行sql查询
        $count7=mysql_num_rows($rs7);
        if ($count7==0) {
                echo "<div class='tips w'>对不起,没有找到您想要的商品!</div>";
        }else{
?>
<div class="oppo-goods w clearfix">
    <div class="oppo-goods-title">搜索结果 <i class="left"></i> <i class="right"></i></div>
    <ul class="goods-content">
            <?php
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
                } }
        ?>
    </ul>
</div>
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