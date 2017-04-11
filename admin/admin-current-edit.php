<?php
session_start();
include "conn/conn.php";       //导入连接数据库php代码
//mysql_query("SET NAMES UTF8");           //设置统一的字符格式utf-8
if(empty($_POST['admin-name'])){
    echo "<a href='admin.php'>返回</a>";
    die('用户名不能为空');
}
if(empty($_POST['admin-psd'])){
    echo "<a href='admin.php'>返回</a>";
    die('密码不能为空');
}
$id=$_SESSION["adminid"];         //获取session保存的id号
$name=$_POST['admin-name'];
$psd=$_POST['admin-psd'];        //获取表单提交过来的数据

//修改指定数据
mysql_query("UPDATE admin SET adminName='$name',adminPsd='$psd 'WHERE adminId='$id'");
$_SESSION["adminname"]=$name;
$_SESSION["adminpsd"]=$psd;   //更新修改后的session

//排错并返回
if(mysql_error()){
    echo mysql_error();
}else{
    header("Location:admin.php");    //返回管理员信息管理页面
}

?>