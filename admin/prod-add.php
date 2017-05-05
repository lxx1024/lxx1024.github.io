<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>商品信息管理-添加</title>
    <link rel="stylesheet" href="css/base.css"/>
    <link rel="stylesheet" href="css/prod-edit.css"/>
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
        <li><a href="user.php">会员信息管理<i class="fa fa-users" aria-hidden="true"></i></a></li>
        <li><a href="product-type.php">商品分类管理<i class="fa fa-sitemap" aria-hidden="true"></i></a></li>
        <li  class="product"><a href="product.php">商品信息管理<i class="fa fa-cubes" aria-hidden="true"></i></a></li>
        <li><a href="order.php">商品订单管理<i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
        <li class="topic"><a href="topic.php">留言信息管理<i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
        <li><a href="#">报表统计分析 <i class="fa fa-bar-chart" aria-hidden="true"></i></a></li>
    </ul>
</div>
<!-- 侧边栏left-nav End-->
<!--后台通用头部和侧边栏 End-->
<!---------------------------------------商品信息管理主体部分 Begin-->
<div class="main-content fr">
        <div class="product">
                    <!-- 头部内容 返回\追加\修改\删除 -->
                <div class="wrapper">
                        <div class="fl">
                                  <a href="product.php">
                                      <i class="fa fa-reply-all" aria-hidden="true"></i>
                                      返回商品管理首页
                                  </a>
                          </div>
                </div>
                 <!-- 商品详细内容显示 -->
                <form action="prod-add-action.php" method="post" enctype="multipart/form-data">
                         <ul class="prod-details clearfix">
                                <li>
                                        <div class="fl">
                                                商品名称:
                                        </div>
                                        <div class="content fl">
                                                <input class="prod-name" name="prod-name" type="text" maxlength="20">
                                        </div>
                                </li>
                                 <li>
                                        <div class="fl">
                                                商品单价:
                                        </div>
                                        <div class="content fl">
                                                <input class="prod-name" name="prod-price" type="text">
                                                <span>0-9999.99,单位RMB</span>
                                        </div>
                                </li>
                                <li>
                                        <div class="fl">
                                               商品分类:
                                        </div>
                                        <div class="content fl">
                                                   <?php
                                                            include 'conn/conn.php';
                                                           $qname = "SELECT * FROM prod_type";                   //SQL查询语句 -----在此处改表名
                                                            $prodTypeRs = mysql_query($qname, $conn);                     //执行sql查询
                                                            $num = 0;
                                                           while ($typename=mysql_fetch_row($prodTypeRs)){
                                                            $num++;
                                                   ?>

                                                   <input type="radio" class="prod-type" name="prod-type" value="<?php echo "$typename[0]";?>" <?php if($num==1) echo("checked");?>>     <?php echo "$typename[1]";?>

                                                    <?php
                                                          }
                                                    ?>
                                        </div>
                                </li>
                                <li>
                                        <div class="fl">
                                               商品介绍:
                                        </div>
                                        <div class="content fl">
                                               <input class="prod-desc" name="prod-desc" type="text" maxlength="50">
                                        </div>
                                </li>
                                <li clearfix>
                                        <div class="fl">
                                                商品属性:
                                        </div>
                                        <div class="content fl">
                                                  <?php
                                                 $attr1 = "SELECT * FROM attrType";                   //SQL查询语句 -----在此处改表名
                                                 $attrRs1 = mysql_query($attr1, $conn);                     //执行sql查询
                                                 $n = 0;
                                                 while ($attrName1=mysql_fetch_row($attrRs1)){
                                                         echo "<p>$attrName1[1]：";
                                                         $n++;
                                                   ?>
                                                   <input class="prod-name" name="attr<?php echo $n;?>" type="text" maxlength="20">
                                                   <?php
                                                        }
                                                  ?>
                                        </div>
                                </li>
                                <li>
                                        <div class="fl">
                                                商品库存:
                                        </div>
                                        <div class="content fl">
                                                <input class="prod-name" name="prod-inventory" type="text" maxlength="20">
                                        </div>
                                </li>
                                <li>
                                        <div class="fl">
                                               商品图片:
                                        </div>
                                        <div class="content fl">

                                            <?php
                                                // 判断索引是否小于5,小于5的话则继续增加input添加图片
                                                $num=1;
                                                for ($num ;$num <=5 ; $num++) {
                                             ?>
                                             <div class="prod-pic">
                                                  <?php echo $num ?>
                                                  <input type="file" name="file[]" class="file" onchange="preview(this)" />
                                            </div>
                                             <?php
                                                }
                                            ?>
                                        </div>
                                </li>
                                <li>
                                        <div class="fl">
                                               商品详情:
                                        </div>
                                        <div class="content fl">
                                            <textarea name="content" id="" cols="80" rows="10">

                                              </textarea>
                                        </div>
                                </li>
                                <li>
                                        <div class="fl">
                                                提交表单:
                                        </div>
                                        <div class="content fl">
                                                 <input class="submit" type="submit" value="确定添加"  onclick="return confirm('确定添加商品分类信息?');">
                                        </div>
                                </li>
                         </ul>
                </form>
        </div>
</div>
<!--商品信息管理主体部分 End-->

<script>
   function preview(x){
         var files = document.getElementsByClassName("file");
         console.log(x.value);   //获取当前触发的input对象对应的值
          if(!x || !x.value) return;
          var path = /\.jpg$|\.png$|\.bmp$|\.jpeg$|\.gif$/i;               //检测文件是否为图片格式
          if(path.test(x.value)){
                 console.log(x.value);    //为后面获取图片路径--------------实现预览效果
                 // x.nextElementSibling.src =" file://"+x.value;
           }else{
                 alert("只能上传jpg、png、bmp、jpeg、gif格式的图片，请重新选择！");
                 x.value="";     //不传入非图片文件
          }
    }
</script>
</body>
</html>