<?php
      $checks = $_REQUEST['checks'];
     foreach ($checks as $key => $value) {
          echo $key."索引";    //这个可以得到被选中的又多少商品
          echo $value."复选框值";    //该用户下选中的购物车id的商品
     }

?>