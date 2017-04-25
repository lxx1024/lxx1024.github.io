<html>
<head>
<title>文件上传实例</title>
</head>
<body>
<?php
include 'conn/conn.php';
$result=mysql_query("select * from upload");  //从数据库调取登录名为...的数据
$rows=mysql_fetch_array($result);
while($rows=mysql_fetch_array($result)){
    $row=$rows[2];
    $row=explode(",",$row);
    foreach ($row as $key => $value) {
       print_r($value);
?>
<div>
  <img src="<?php   echo $value ?>" alt="">
</div>
<?php
  }
}
?>


</body>
</html>