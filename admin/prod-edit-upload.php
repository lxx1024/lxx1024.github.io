<?php
header("Content-Type: text/html;charset=utf-8");
$uploaddir = "images/";//设置文件保存目录 注意包含/
$k = -1;
print_r("**************".count($_FILES['file']['name']));
foreach ($_FILES['file']['name'] as $key => $value) {
      // 判断有没有上传图片,没有的话则不做一下处理,并且索引减一,要用一个新定义的key来重新写入$uploadfile数组
      if ($value=='') {
        continue;
      }else{
        $k++;
      }
     //获取$_FILES['file']['name'][$key]客户端文件的原名称
      print_r("**************".$_FILES['file']['name'][$key]);
            $filename=explode(".",$_FILES['file']['name'][$key]);   //将一个字符串用分割符转变为一数组形式
            // do {
                $name=implode(".",$filename);     //将数组用特定的分割符转变为字符串
                //$name1=$name.".Mcncc";
                $uploadfile[$k]=$uploaddir.$name;    //相对路径加上文件名
                print_r($uploadfile[$k]); //  数组
              // }
              // while(file_exists($uploadfile[$k]));
              if (move_uploaded_file($_FILES['file']['tmp_name'][$key],$uploadfile[$k])){     //move_uploaded_file() 函数将上传的文件移动到新位置。
                  if(is_uploaded_file($_FILES['file']['tmp_name'][$key])){
                      echo "上传失败!";
                  }
            }
}
if ($k > -1) {
    print_r("**************".$k);
    print_r("**************".count($uploadfile));
    $uploadfile=implode(",",$uploadfile);   //将数组转为字符串
}
?>
