<!-- <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>哆咪-订单管理</title>
</head>
<body>

</body>
</html> -->

<?php
    // $value =  $_POST['checkbox1'];  //如果没选中,则无法接收该值,会报错
    $numbers =  $_REQUEST['checkbox'];
     foreach ($numbers as $key => $value) {
          echo $key."购物车id号".$value."-------";


    }
?>