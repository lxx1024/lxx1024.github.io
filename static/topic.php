<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-手机社区</title>
    <link rel="shortcut icon" href="../www.ico.dm.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="../css/base.css"/>
    <link rel="stylesheet" href="../css/topic.css"/>
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
        <li>手机社区</li>
    </ul>
</div>
<!-- 面包屑导航 wrapper End-->
<!-----------------------------------------------------------------------------手机社区topic Begin-->
<div class="topic w clearfix">
    <!-- --------------------------------左边话题内容topic-left Begin -->
    <div class="topic-left fl">
            <!-- 话题tab栏切换 -->
            <ul class="topic-tabs">
                <li><a href="javascript:;">热点话题</a></li>
                <li><a href="javascript:;">最新话题</a></li>
                <li><a href="javascript:;">全部话题</a></li>
            </ul>
            <!-- 话题对应的内容 -->
            <ul class="topics">
                <li class="topic-hot">
                 <!-- 从数据库提取手机社区对应的数据PHP代码 -->
                            <?php
                                include "../conn/conn.php";       //导入连接数据库php代码
                                $q = "SELECT * FROM topic where type=0 order by publicTime DESC";                   //SQL查询语句 -----在此处改表名
                                // type 为0 代表是热点话题
                                $result = mysql_query($q, $conn);                     //执行sql查询,
                                  while ($row=mysql_fetch_row($result)){
                           ?>

                        <div class="topic-content clearfix">
                            <a href="topic-details.php?id=<?php   echo $row[0] ?>" class="fl"><img src="../images/user1.jpg" alt=""></a>
                            <h2><a href="topic-details.php?id=<?php   echo $row[0] ?>"><?php   echo $row[3] ?></a></h2>
                            <p class="desc"><?php   echo $row[4] ?></p>
                            <p class="message">
                            <?php
                                 $qname = "SELECT * FROM user where userId='".$row[1]."';";                   //SQL查询语句 -----在此处改表名
                                  $nameRs = mysql_query($qname, $conn);                     //执行sql查询
                                 while ($name=mysql_fetch_row($nameRs)){
                            ?>
                                    <span><i class="fa fa-user" aria-hidden="true"></i> 作者 <b><?php echo "$name[1]" ?></b></span>
                             <?php
                                }
                          ?>
                                     <span><i class="fa fa-clock-o" aria-hidden="true"></i> 发表时间 <b><?php   echo $row[6] ?></b></span>
                                      <span><i class="fa fa-comments-o" aria-hidden="true"></i>评论<b>9999</b></span>
                            </p>
                        </div>
                          <?php
                                }
                                mysql_close($conn);    //关闭数据库
                            ?>
                </li>
                <li class="topic-new">
                  <!-- 从数据库提取手机社区对应的数据PHP代码 -->
                            <?php
                                include "../conn/conn.php";       //导入连接数据库php代码
                                $q = "SELECT * FROM topic order by publicTime DESC limit 0,5";                   //SQL查询语句 -----在此处改表名
                                //   按时间最新排序并提取前5条记录
                                $result = mysql_query($q, $conn);                     //执行sql查询,
                                  while ($row=mysql_fetch_row($result)){
                           ?>

                        <div class="topic-content clearfix">
                            <a href="topic-details.php?id=<?php   echo $row[0] ?>" class="fl"><img src="../images/user1.jpg" alt=""></a>
                            <h2><a href="topic-details.php?id=<?php   echo $row[0] ?>"><?php   echo $row[3] ?></a></h2>
                            <p class="desc"><?php   echo $row[4] ?></p>
                            <p class="message">
                            <?php
                                 $qname = "SELECT * FROM user where userId='".$row[1]."';";                   //SQL查询语句 -----在此处改表名
                                  $nameRs = mysql_query($qname, $conn);                     //执行sql查询
                                 while ($name=mysql_fetch_row($nameRs)){
                            ?>
                                    <span><i class="fa fa-user" aria-hidden="true"></i> 作者 <b><?php echo "$name[1]" ?></b></span>
                             <?php
                                }
                          ?>
                                     <span><i class="fa fa-clock-o" aria-hidden="true"></i> 发表时间 <b><?php   echo $row[6] ?></b></span>
                                      <span><i class="fa fa-comments-o" aria-hidden="true"></i>评论 <b>9999</b></span>
                            </p>
                        </div>
                          <?php
                                }
                                mysql_close($conn);    //关闭数据库
                            ?>
                </li>
                <li class="topic-whole">
                   <!-- 从数据库提取手机社区对应的数据PHP代码 -->
                            <?php
                                include "../conn/conn.php";       //导入连接数据库php代码
                                $q = "SELECT * FROM topic order by publicTime DESC";                   //SQL查询语句 -----在此处改表名
                                $result = mysql_query($q, $conn);                     //执行sql查询,
                                  while ($row=mysql_fetch_row($result)){
                           ?>

                        <div class="topic-content clearfix">
                            <a href="topic-details.php?id=<?php   echo $row[0] ?>" class="fl"><img src="../images/user1.jpg" alt=""></a>
                            <h2><a href="topic-details.php?id=<?php   echo $row[0] ?>"><?php   echo $row[3] ?></a></h2>
                            <p class="desc"><?php   echo $row[4] ?></p>
                            <p class="message">
                            <?php
                                 $qname = "SELECT * FROM user where userId='".$row[1]."';";                   //SQL查询语句 -----在此处改表名
                                  $nameRs = mysql_query($qname, $conn);                     //执行sql查询
                                 while ($name=mysql_fetch_row($nameRs)){
                            ?>
                                    <span><i class="fa fa-user" aria-hidden="true"></i> 作者 <b><?php echo "$name[1]" ?></b></span>
                             <?php
                                }
                          ?>
                                     <span><i class="fa fa-clock-o" aria-hidden="true"></i> 发表时间 <b><?php   echo $row[6] ?></b></span>
                                      <span><i class="fa fa-comments-o" aria-hidden="true"></i>评论 <b>9999</b></span>
                            </p>
                        </div>
                          <?php
                                }
                                mysql_close($conn);    //关闭数据库
                            ?>
                </li>
            </ul>
    </div>
    <!-- 左边话题内容topic-left End -->
    <!----------------------------------- 右边发表话题及个人信息展示部分 topic-right Begin-->
    <div class="topic-right fr">
             <!-- 发布话题 -->
            <div class="publish">
                    <a href="topic-publish.php">
                        <span>
                             <i class="fa fa-file-text" aria-hidden="true"></i>
                        </span>
                        <b>发布帖子</b>
                    </a>
            </div>
            <!-- 签到 -->
         <div class="sign">
                    <a href="#">
                        <span>
                             <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        </span>
                        <b class="signW">签到</b>
                        <i class="number">签到 <b> 9999 </b> 人</i>
                    </a>
            </div>
             <!-- 个人话题 -->
         <!-- 判断会员是否登录 php代码 -->
     <?php
                if( isset($_SESSION["userName"])){     //判断是否存在session对象
    ?>
      <?php
              include "../conn/conn.php";       //导入连接数据库php代码
              $id = $_SESSION["userId"];
              $q = "SELECT * FROM topic where userId='".$id."' order by publicTime DESC limit 0,8;";                   //SQL查询语句 -----在此处改表名
              // type 为0 代表是热点话题
               $result = mysql_query($q, $conn);                     //执行sql查询,
               $num = mysql_num_rows($result);
       ?>
        <div class="person">
                    <a href="topic-person.php?id=<?php echo "$id"?>">
                        <span>
                             <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <b class="signW">
                              <?php
                                      echo "${_SESSION["userName"]}";
                             ?>
                    </b>
                        <i class="number">已发布 <b> <?php
                                      echo "$num" ?> </b> 条帖子</i>
                    </a>
                    <ul class="topics">
                    <?php
                            while ($row=mysql_fetch_row($result)){
                    ?>
                            <li>
                                <a href="topic-details.php?id=<?php   echo $row[0] ?>">
                                        <h5>  <?php   echo $row[3] ?></h5>
                                        <p> <?php   echo $row[4] ?></p>
                                </a>
                            </li>
                  <?php
                      }
                      mysql_close($conn);    //关闭数据库
                 ?>
                    </ul>
            </div>

                <?php
                     }else{
                 ?>
                <div class="person">
                    <a href="login-topic.html">
                        <span>
                             <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        <b class="signW">个人中心</b>
                        <i class="login-go">请登录会员</i>
                    </a>
                    </div>

             <?php
                  }
              ?>
    </div>
    <!-- 右边发表话题及个人信息展示部分 topic-right  End -->
</div>
<!--手机社区topic End-->

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