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


if($prodName == "" || $price == "" || $prodTypeId == "" || $inventory == ""){
      echo"<script>window.alert('对不起！你输入的信息不完整!');history.back()</script>";
}else {
      include_once('prod-edit-upload.php');     //导入处理文件
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


// 商品属性部分  Begin
$new = "SELECT * FROM product order by prodAddTime DESC limit 0,1";                   //SQL查询语句 -----在此处改表名
$newRs = mysql_query($new, $conn);                     //执行sql查询,
$newId=mysql_fetch_row($newRs);
echo $newId[0];//新添加的商品的id   ,也就是时间最新的记录
 $attr = "SELECT * FROM attrType";
 $attrRs = mysql_query($attr, $conn);
 $count1 = mysql_num_rows($attrRs);    //获取记录数量
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
     if ($attr1!="") {
        $sql1="insert into attribute (prodId,attrName,attrTypeId) values('$newId[0]','$attr1','$attrName[0]')";
               $result1=mysql_query($sql1,$conn);
               if ($result1) {
                    echo "成功";
               }else{
                    echo "失败";
               }
       }
     }
// 商品属性部分 End
?>
<script>
  window.location.href="product.php";
</script>
<?php
     mysql_close($conn);
 ?>