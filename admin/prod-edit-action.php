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

 $attr = "SELECT * FROM attrType";
 $attrRs = mysql_query($attr, $conn);
// $attrName=mysql_fetch_row($attrRs);    //获取记录数组
$counts = mysql_num_rows($attrRs);    //获取记录数量
echo $counts;
$i=0;
while ($attrName=mysql_fetch_row($attrRs)){
    if ($i<$counts+1) {
         $i++;
         $attr = "attr".$i;              //input 的name值
         echo $attr."name值";       //attr1 , attr2.......
         $attr1=$_POST[$attr];      //获取input的value值
         echo $attr1."value值";
    }
    echo $attrName[0]."属性类id";
}
// for ($i=1; $i < $counts+1; $i++) {
//       $attr = "attr".$i;              //input 的name值
//       echo $attr;       //attr1 , attr2.......
//       $attr1=$_POST[$attr];      //获取input的value值
//       echo $attr1;
// }


if($prodName == "" || $price == "" || $prodTypeId == "" || $inventory == ""){
      echo"<script>window.alert('对不起！你输入的信息不完整!');history.back()</script>";
}else {
      include_once('prod-edit-upload.php');
      if (isset($uploadfile)) {
               $pic=$uploadfile;     //$uploadfile是在uploadfile文件里面定义的 ------是一个存放了多个图片相对路径的字符串(由逗号隔开)
              $sql="insert into product (prodName,prodTypeId,inventory,prodPrice,prodDesc,prodPic) values('$prodName','$prodTypeId','$inventory','$price','1111111','$pic')";
               $result=mysql_query($sql,$conn);
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
  // window.location.href="prod-details.php?id=<?php echo $id ?>";
</script>
<?php
     mysql_close($conn);
 ?>