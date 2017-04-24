<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>管理员信息管理</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/topic-details.css"/>
    <link rel="stylesheet" href="../Font-Awesome-master/css/font-awesome.min.css">
</head>
<body>

<!-----------------------------------------------------------后台通用头部和侧边栏 Begin -->
<?php        // --------登录后台系统-php代码------
    session_start();
    if(isset($_SESSION["code"])){
?>

<!-- ------------------------------------头部top Begin-->
<div class="top clearfix">
    <div class="logo fl">
        <a href="index.php"><h1>哆咪手机商城后台管理系统</h1></a>
    </div>
    <div class="login-massage fl">
        欢迎登录!&nbsp;<span class="admin-name">
        <?php
        echo "${_SESSION["adminname"]}";
        ?>
        </span>
        <a href="exit.php" class="quit fr">退出</span>
    </div>
    <div class="datetime fr">
         日期 :20<?php echo date("y-m-d",time()); ?>
    </div>
</div>
<!-- 头部top End-->

<?php                // ---------登录后台系统php代码------
}
else{
?>
<script>
alert("后台系统仅系统管理员可进,请登录！");  //进入后台系统提示
window.location.href="login.html";
</script>
<?php
}
?>

<!---------------------------------------侧边栏left-nav Begin-->
<div class="left-nav fl">
    <ul>
        <li><a href="admin.php">管理员信息管理<i class="fa fa-diamond" aria-hidden="true"></i></a></li>
        <li class="user"><a href="user.php">会员信息管理<i class="fa fa-users" aria-hidden="true"></i></a></li>
        <li><a href="product-type.html">商品分类管理<i class="fa fa-sitemap" aria-hidden="true"></i></a></li>
        <li><a href="product.html">商品信息管理<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
        <li><a href="order.html">商品订单管理<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
        <li class="topic"><a href="community.html">留言信息管理<i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
        <li><a href="#">报表统计分析 <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- 侧边栏left-nav End-->
 <!-- 从数据库提取手机社区对应的数据PHP代码 -->
<?php
      // 获取传过来的id
      $topicId=intval($_GET['id']);     //获取的是对应的帖子的id
      include "../conn/conn.php";       //导入连接数据库php代码
      $q = "SELECT * FROM topic where topicId='".$topicId."'order by publicTime DESC";            //SQL查询语句 -----在此处改表名
       $result = mysql_query($q, $conn);                     //执行sql查询,
       $row=mysql_fetch_row($result);     //------------------------帖子内容相关信息

       $qname = "SELECT * FROM user where userId='".$row[1]."';";                   //
       $nameRs = mysql_query($qname, $conn);                     //执行sql查询
       $name=mysql_fetch_row($nameRs);       //---------------------帖子对应作者相关信息

      $nums = "SELECT * FROM topic where userId='".$row[1]."'";            //SQL查询语句 -----在此处改表名
       $numsRs= mysql_query($nums, $conn);                     //执行sql查询,
       $num=mysql_num_rows($numsRs);                    //-----------------------帖子对应作者下的所有帖子数量

?>
<!--后台通用头部和侧边栏 End-->
<!---------------------------------------留言信息管理主体部分 Begin-->
<div class="main-content fr">
    <div class="topics">
        <div class="wrapper"><a href="topic.php"><i class="fa fa-reply-all" aria-hidden="true"></i>返回留言信息管理</a></div>
         <!-- 帖子内容 -->
        <div class="topic-details">
                <div class="topic-title clearfix">
                       <h5 class="fl"><?php   echo "$row[3]"?></h5>
                       <p class="author fl">作者: <?php   echo "$name[1]" ?></p>
                       <p class="publish-time fl">时间: <?php   echo "$row[6]" ?></p>
                       <p class="topic-del fr"><a href="topic-del.php?id=<?php echo $topicId ?>" onclick="return confirm('确定删除该帖子吗?');">删除</a></p>
                </div>
                <div class="content">
                      <p>简介:<?php   echo "$row[4]" ?></p>
                      内容:<?php   echo "$row[5]" ?>
                </div>
          </div>
          <!-- 该帖子下的所有评论 -->
          <?php
             $qreply = "SELECT * FROM topic_reply where topicId='".$topicId."' order by replyTime DESC";            //SQL查询语句 -----在此处改表名
             $replyRs = mysql_query($qreply, $conn);                     //执行sql查询,
              $replyNums=mysql_num_rows($replyRs);     //------------------------帖子评论数量
          ?>

          <div class="replys-top">全部评论<span>共<?php echo "$replyNums"?>条</span></div>
  <?php
        while($replyRows=mysql_fetch_row($replyRs)){
               $qname1 = "SELECT * FROM user where userId='".$replyRows[2]."';";
               $nameRs1 = mysql_query($qname1, $conn);                     //执行sql查询
               $name1=mysql_fetch_row($nameRs1);       //---------------------帖子对应作者相关信息

    ?>
          <div class="replys clearfix">
                   <div class="reply-left fl">
                         <a href="#"><img src="../images/user1.jpg" alt="" class="fl"></a>
                   </div>
                  <div class="reply-right fr">
                        <a href="" class="name">
                         <?php
                              echo "$name1[1]";
                        ?>
                        </a>
                        <p class="reply-content">
                        <?php
                              echo "$replyRows[3];"
                        ?>
                        </p>
                        <p class="replys-time">
                        <?php
                              echo "$replyRows[4];"
                        ?></p>
                        <p class="reply-del"><a href="topic-reply-del.php?id=<?php echo $replyRows[0] ?>" onclick="return confirm('确定删除该评论吗?');">删除</a></p>
                  </div>
          </div>
   <?php
        }
   ?>
    </div>
</div>
<!--管理员信息管理主体部分 End-->
</body>
</html>