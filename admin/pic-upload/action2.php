<?php
header("Content-Type: text/html;charset=utf-8");
// // print_r($_FILES);
// // print_r("**************".$_FILES['file']['name'][0]); //details-R9s-5.jpg
// // print_r("**************".$_FILES['file']['type'][0]); //image/jpeg
// print_r("**************".$_FILES['file']);
// if(!empty($_FILES)){
//     foreach($_FILES['file'] as $k=>$v){                  //$_FILES["file"][$k]==$v   键值对
//          //$_FILES["file"]都变成$_FILES["file"][$k]操作    $v得到的是如$_FILES["file"]["name"]数组
//          print_r("**************".$_FILES["file"][$k][0]);
//          print_r("+++++++++++++++++".$v[0]);
//          // if ($_FILES['file']['error'][0] == 0) {     //上传成功后的操作
//          //        $filetype = array("jpg","JPG");
//          //        $arr = explode(".", $_FILES["file"][$k][0]);
//          //        //同样的代码
//          //        print_r("_----------------------------------------");
//          //        print_r($arr);
//          // }
//     }
// }


$title=$_POST['title'];
if($title == ""){
      echo"<script>window.alert('对不起！你输入的信息不完整!');history.back()</script>";
}else {
      include_once('conn/conn.php');
      include_once('uploadclass2.php');

           $pic=$uploadfile;     //$uploadfile是在uploadfile文件里面定义的 ------是一个存放了多个图片相对路径的字符串(由逗号隔开)
           $sql="insert into upload(title,pic) values('$title','$pic')";
           $result=mysql_query($sql,$conn);
            echo "<script>window.location.href='pic.php'</script>";

}
?>