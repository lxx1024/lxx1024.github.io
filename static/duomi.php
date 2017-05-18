<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-手机社区</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/duomi.css"/>
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
<div class="dm-header">
    <div class="w">
        <div class="logo fl">
            <a href="../index.php"><h1>哆咪手机商城</h1></a>
        </div>
        <ul class="goods-nav fl">
            <li><a href="../index.php">首页</a></li>
            <li><a href="javascript:;">品牌汇</a></li>
            <li><a href="prod-other.php?id=1">手机配件</a></li>
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
        <a href="javascript:;"><i class="fa fa-shopping-cart icon-4x" aria-hidden="true"></i>
        购物车  <span class="arrow-right"> > </span></a>
    </div>
    </div>
</div>
<!-- logo\搜索栏\购物车  End -->
<!--------------------------------------------面包屑导航wrapper Begin-->
<div class="wrapper w">
    <ul class="breadcrumb">
        <li><a href="../index.php">首 页 </a></li>
        <li> / </li>
        <li>哆咪文化</li>
    </ul>
</div>
<!-- 面包屑导航 wrapper End-->
<div class="duomi w">
      <h1>哆咪文化——激励自己</h1>
      <p>我们最深的恐惧并非是我们力不能及。</br>
            我们最深的恐惧是我们的力量无可限量。</br>
            令我们恐惧的是我们的光芒，</br>
            而不是我们的黑暗。</br>
            我们都会扪心自问</br>
            我是谁，怎样才能灿烂夺目，才华横溢？</br>
            其实，你要问，你怎么能不是谁？你就是神之子。</br>
            你的碌碌无为无益于世界。</br>
            退缩并非明智之举，</br>
            以为这样就不会让人们不安。</br>
            我们注定要光彩照人,就像孩子一样。</br>
            我们生来就是为了展现我们心中上帝的荣耀。</br>
            它并非只是少数人拥有；而是藏在每个人的心中。</br>
            当我们让自己的光芒闪耀，</br>
            我们就在无意中默许他人去做同样的事。</br>
            当我们从自己的恐惧中解放，</br>
            我们就自然而然地解放他人！</p>
</div>
<!--哆咪文化duomi End-->
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
<script src="../js/base.js"></script>
<script src="../js/topic.js"></script>
<script src="../js/index.js"></script>
<script src="../js/go-to-car.js"></script>
<script src="../js/go-to-order.js"></script>
<script src="../js/go-to-user.js"></script>
</body>
</html>