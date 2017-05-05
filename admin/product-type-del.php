/**
 * @Author: 20161024
 * @Date:   2017-04-11 23:10:47
 * @Last Modified by:   20161024
 * @Last Modified time: 2017-05-05 14:38:36
 */
<?php
      if(empty($_GET['id'])){
          die('id is empty');
      }
      //连接数据库
      include  "conn/conn.php";
      $id=intval($_GET['id']);    //获取传递过来的商品分类id

      // 判断该商品分类是否已经被引用,是的话则提示不能删除,可以进行修改

      $type = "SELECT * FROM product where prodTypeId='".$id."';";                   //SQL查询语句 -----在此处改表名
      $typeRs = mysql_query($type, $conn);                     //执行sql查询
      $counts=mysql_num_rows($typeRs);
      // echo $counts;    //获取记录的数量,为0则是没有被引用
      if ($counts==0) {
              //删除指定数据
            mysql_query("DELETE FROM prod_type WHERE prodTypeId=$id");
            //排错并返回页面
            if(mysql_error()){
                echo mysql_error();
            }
?>

        <script>
                alert ("删除成功");
                window.location.href="product-type.php";
        </script>

<?php
        }else{
?>

        <script>
                alert ("该商品分类已被商品信息表引用,不能进行删除操作!");
                window.location.href="product-type.php";
        </script>

<?php
        }
?>
<script>
alert ("删除成功");
// window.location.href="product-type.php";
</script>
<?php
  //关闭连接
 mysql_close($conn);

 ?>