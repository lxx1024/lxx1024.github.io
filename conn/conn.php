<?php
$conn=mysql_connect("127.0.0.1","pig","123456");   //主机名  用户名  密码
mysql_select_db("phone_shop", $conn);          //选择数据库
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库
?>
