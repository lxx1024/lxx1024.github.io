<?php
      include "conn/conn.php";
      if(empty($_POST['type-name'])){
          ?>
          <script>
                alert ("商品分类名称不能为空!");
                history.go(-1);
          </script>
          <?php
          die('密码不能为空');
      }

        $id=intval($_GET['id']);
      $name=$_POST['type-name'];    //提交的商品分类名称     id会自动递增

      $dbtypename=null;
      $result=mysql_query("select * from prod_type where prodTypeName='".$name."';");  //从数据库调取分类名为...的数据
      while($row=mysql_fetch_array($result)){
            $dbtypename=trim($row["prodTypeName"]);
      }
      if(is_null($dbtypename)){
              echo "添加成功";
              mysql_query("UPDATE prod_type SET prodTypeName='$name' WHERE prodTypeId='$id'");
              //排错并返回
              if(mysql_error()){
                   echo mysql_error();
              }
?>

      <script>
              alert ("修改成功");
              window.location.href="product-type.php";
      </script>

<?php
       }else{
?>
      <script>
              alert("已存在该分类名！请重新输入");
              history.go(-1);
      </script>

<?php
      }
        //关闭连接
       mysql_close($conn);

 ?>


