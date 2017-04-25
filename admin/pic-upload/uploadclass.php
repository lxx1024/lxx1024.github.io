<?php
header("Content-Type: text/html;charset=utf-8");
$uploaddir = "upfiles/";//设置文件保存目录 注意包含/
$type=array("jpg","gif","bmp","jpeg","png");//设置允许上传文件的类型
// $patch="upload/";//程序所在路径
//获取文件后缀名函数
function fileext($filename)
{
    return substr(strrchr($filename, '.'), 1);
}
//生成随机文件名函数
function random($length){
    $hash = 'CR-';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    mt_srand((double)microtime() * 1000000);
    for($i = 0; $i < $length; $i++){
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}
$k = -1;
$_isWrong=0;
foreach ($_FILES['file']['name'] as $key => $value) {
      // 判断有没有上传图片,没有的话则不做一下处理,并且索引减一,要用一个新定义的key来重新写入$uploadfile数组???
      if ($value=='') {
        continue;
      }else{
        $k++;
      }
      $a=strtolower(fileext($_FILES['file']['name'][$key]));  //获取$_FILES['file']['name'][$key]客户端文件的原名称
      print_r("**************".$_FILES['file']['name'][$key]);
      //判断文件类型     in_array是判断$a是否在$type数组里面
      if(!in_array($a,$type))
      {
          $text=implode(",",$type);    //将数组用特定的分割符转变为字符串
          // 当存在是不符合要求的格式的文件时
          $_isWrong=1;
?>
<script>
      alert("<?php  echo '您只能上传以下类型文件: ',$text;?>");
      window.location.href="upload.php";
</script>
<?php
      }
      //生成目标文件的文件名
      else{
            $filename=explode(".",$_FILES['file']['name'][$key]);   //将一个字符串用分割符转变为一数组形式
            do {
                $filename[0]=random(10); //设置随机数长度    调用了自定义的random函数
                $name=implode(".",$filename);     //将数组用特定的分割符转变为字符串
                //$name1=$name.".Mcncc";
                $uploadfile[$k]=$uploaddir.$name;    //相对路径加上文件名
                print_r($uploadfile[$k]); //  数组
              }
              while(file_exists($uploadfile[$k]));
              if (move_uploaded_file($_FILES['file']['tmp_name'][$key],$uploadfile[$k])){     //move_uploaded_file() 函数将上传的文件移动到新位置。
                  if(is_uploaded_file($_FILES['file']['tmp_name'][$key])){
                      echo "上传失败!";
                  }
            }
      }
}
$uploadfile=implode(",",$uploadfile);   //将数组转为字符串
?>
