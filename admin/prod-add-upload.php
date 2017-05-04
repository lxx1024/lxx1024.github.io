<?php
header("Content-Type: text/html;charset=utf-8");
$uploaddir = "images/";//设置文件保存目录 注意包含/
$k = -1;
foreach ($_FILES['file']['name'] as $key => $value) {
      // 判断有没有上传图片,没有的话则不做以下处理
      if ($value=='') {
        continue;
      }else{
        $k++;
      }
     //获取$_FILES['file']['name'][$key]客户端文件的原名称
      $filename=explode(".",$_FILES['file']['name'][$key]);   //将一个字符串用分割符转变为一数组形式
      $name=implode(".",$filename);     //将数组用特定的分割符转变为字符串
      $uploadfile[$k]=$uploaddir.$name;    //相对路径加上文件名
      if (move_uploaded_file($_FILES['file']['tmp_name'][$key],$uploadfile[$k])){     //move_uploaded_file() 函数将上传的文件移动到新位置。
          if(is_uploaded_file($_FILES['file']['tmp_name'][$key])){
              echo "上传失败!";
          }
    }
}
if ($k > -1) {
    $uploadfile=implode(",",$uploadfile);   //将数组转为字符串
}
?>
