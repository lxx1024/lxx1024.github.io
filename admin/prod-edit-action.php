<?php
header("Content-Type: text/html;charset=utf-8");
include_once('conn/conn.php');

$id=intval($_GET['id']);
$prodName=$_POST['prod-name'];   //商品名称
$price=$_POST['prod-price'];   //商品单价
$prodTypeId=$_POST['prod-type'];   //商品分类id
$prodDesc=$_POST['prod-desc'];   //商品介绍
$inventory=$_POST['prod-inventory'];   //商品库存
$content=$_POST['content'];   //商品详情

// 商品属性部分  Begin
 $attr = "SELECT * FROM attrType";
 $attrRs = mysql_query($attr, $conn);
// $attrName=mysql_fetch_row($attrRs);    //获取记录数组----插在后面循环里面
 $count1 = mysql_num_rows($attrRs);    //获取记录数量
 // echo $count1;
 $i=0;
 while ($attrName=mysql_fetch_row($attrRs)){
    if ($i<$count1+1) {
         $i++;
         $attr = "attr".$i;              //input 的name值
         // echo $attr."name值";       //attr1 , attr2.......
         $attr1=$_POST[$attr];      //获取input的value值
         // echo $attr1."value值";    //黑色,有可能是空值
    }
    // echo $attrName[0]."属性类id";

    $attr2 = "SELECT * FROM attribute where attrTypeId='".$attrName[0]."'and prodId='".$id."';";   //对应属性且对应商品ID的属性值
    $attrRs2 = mysql_query($attr2, $conn);                     //执行sql查询
    $attrName2=mysql_fetch_row($attrRs2);
    $count2 = mysql_num_rows($attrRs2);    //获取记录数量

    if ($count2>0) {                      //该商品存在该属性----修改原来记录
          // echo $attrName2[3]."-----原记录的属性类id-----";
          //  echo $attr1;
        mysql_query("UPDATE attribute SET attrName='$attr1' WHERE attrTypeId='$attrName2[3]'");
    }else{                                       //该商品不存在该属性-----添加新记录
      echo $attr1;
      $sql1="insert into attribute (prodId,attrName,attrTypeId) values('$id','$attr1','$attrName[0]')";
               $result1=mysql_query($sql1,$conn);
               if ($result1) {
                 echo "成功";
               }else{
                echo "失败";
               }
       }
}

// 商品属性部分 End

if($prodName == "" || $price == "" || $prodTypeId == "" || $inventory == ""){
      echo"<script>window.alert('对不起！你输入的信息不完整!');history.back()</script>";
}else {
      include_once('prod-edit-upload.php');
      if (isset($uploadfile)) {
               $pic=$uploadfile;     //$uploadfile是在uploadfile文件里面定义的 ------是一个存放了多个图片相对路径的字符串(由逗号隔开)
             $result = mysql_query("UPDATE product SET prodName='$prodName',prodTypeId='$prodTypeId',inventory='$inventory',prodPrice='$price',prodDesc='$prodDesc',prodPic='$pic' WHERE prodId='$id'");
              if ($result) {
                    echo "成功";
               }else{
                    echo "失败";
               }
      }else{
              $sql="insert into product (prodName,prodTypeId,inventory,prodPrice,prodDesc) values('$prodName','1','$inventory','$price','1111111')";
               $result=mysql_query($sql,$conn);
               if ($result) {
                 echo "成功";
               }else{
                echo "失败";
               }
      }
}
?>
<script>
  window.location.href="prod-details.php?id=<?php echo $id ?>";
</script>
<?php
     mysql_close($conn);
 ?>