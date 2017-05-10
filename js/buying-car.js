/*
* @Author: 20161024
* @Date:   2017-05-07 10:24:49
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-10 15:44:58
*/

// ------------------------------------------------------------购物车商品操作Begin
$(function(){
    var $minus = $('.counter-box .btn-minus');   // 数量减号DOM元素
    var $plus = $('.counter-box .btn-plus');   // 数量加号DOM元素
    var $num =  $('.counter-box .number');   //  商品数量
     var $select =  $('.cart-product-choice .select');   //  选择框
    var $max =  $('.cart-product-choice .inventor');   //  商品库存
  for (let i = 0; i < $minus.length; i++) {
    // 点击减号时触发的事件
      $minus[i].index = i;    //存储当前触发对象的索引
      $($minus[i]).click(function () {
               var index = this.index;
               var num = $($num[index]).val();
               var cartId =$($select[index]).val();
                // console.log($($select[index]).val());   这个就是对应的购物车id
               $plus.css("background","#f0f0f0");
               $minus.css("background","#f0f0f0");
               $(this).css("background","#f0f0f0");
               if(num>1){    //这部分可以放到php里面判断
                      num--;
                      $($num[index]).val(num);
                      window.location.href="buying-car-edit.php?id="+cartId+"&num="+num;
                }else {
                      $(this).css("background","#fba45e");
                }
        })

      // 点击加号触发的事件
        $plus[i].index = i;
        $($plus[i]).click(function () {
              var  index = this.index;
              var num = $($num[index]).val();
              var cartId =$($select[index]).val();
               var max = +$($max[index]).val();  //将字符转为数字
               $minus.css("background","#f0f0f0");
               $plus.css("background","#f0f0f0");
               $(this).css("background","#f0f0f0");
               if(num<max){
                      num++;
                      $($num[index]).val(num);
                      window.location.href="buying-car-edit.php?id="+cartId+"&num="+num;
                }else {
                      $(this).css("background","#fba45e");
                }
        })

      // 文本框失去焦点触发的事件
        $num[i].index = i;
        $num[i].oldValue = $($num[i]).val();
        console.log
        $($num[i]).change(function () {
              var  index = this.index;
               var num = $(this).val();
               var cartId =$($select[index]).val();
               var max = $($max[index]).val();
               console.log(max);
               console.log(this.oldValue);
               if(num > 0 && num<=max){
                      $(this).val(num);
                      $(this).css("color","black");
                      window.location.href="buying-car-edit.php?id="+cartId+"&num="+num;
                }else {
                      // $(this).val(this.oldValue);
                      alert("输入的数量超出该商品库存数量")
                      $(this).css("color","red");
                }
        })
  }
})

// 购物车商品操作 End

// -------------------------------------------------------------- 全选/全不选功能 Begin
$(function(){
        var $allSelect=$('#allSelect');
         var $btn=$('#btn');
        var $selects = $('.cart-product-choice .select');
        $allSelect[0].checked=true;
        for(var i=0;i<$selects.length;i++) {
                    $selects[i].checked=true;
        }
        // 点击全选或取消全选事件
        $allSelect.click(function () {
                if(this.checked==true){
                      // console.log($selects);
                        for(var i=0;i<$selects.length;i++) {
                                 $selects[i].checked=true;
                        }
                }else{
                        for(var i=0;i<$selects.length;i++){
                                $selects[i].checked=false;
                        }
                }
                getPrice();
         })
        //单独点击下面的复选框时,判断是否全部勾选,如果全部勾选,则"全选"复选框要选中
        for (var i = 0; i < $selects.length; i++) {   //给点击对象注册事件
              $($selects[i]).click(function(){
                      // 判断是否全部都勾选
                           var isCheck = 1;
                           for (var j = 0; j < $selects.length; j++) {
                                  if($selects[j].checked==false){
                                          isCheck = 0;    //有没选中的则为0
                                  }
                           }
                           if(isCheck==1){
                                   $allSelect[0].checked=true;
                             }else{
                                   $allSelect[0].checked=false;
                             }
                             getPrice();

              })
        }
        // 判断商品是否全没选
        $btn.mouseenter(function(){
                var isNotCheck = 0;
                 for (var j = 0; j < $selects.length; j++) {
                          if($selects[j].checked==true){
                                  isNotCheck = 1;    //有选中的则为1
                          }
                 }
                 if(isNotCheck==1){
                          // console.log("有选中的");
                          $(this).css('background','#ff0000');
                }else{
                          // console.log("全没选中的");
                          $(this).css('background','#cccccc');
                          $(this).attr("type","button");
                }
        }).mouseout(function(){
                  $(this).attr("type","submit");//待解决问题
                  // $(this).removeAttr("disabled");//待解决问题----不能用disabled,设置了disabled不能进行其他操作
                  $(this).css('background','#f58e49');
        })
        getPrice();
})
// 全选/全不选功能 End
//  --------------------------------------------------购物车选中商品总金额 Begin
function getPrice(){
        var $num =  $('.counter-box .number');   //  商品数量
        var $price = $('.cart-product-price .normal');   //商品单价
        var $selects = $('.cart-product-choice .select');
        var $allPrice = $('.amount .allPrice');
        var $allNum = $('.amount .allNum');
        var sumNum = 0;
        var sumPrice = 0;
        for (var i = 0; i < $selects.length; i++) {
                if($selects[i].checked==true){
                          console.log($num[i]);
                          console.log($price[i]);
                          sumNum = sumNum + parseInt($($num[i]).val());
                          sumPrice = sumPrice + ($($num[i]).val())*($($price[i]).text());
                          console.log(sumPrice)
                }
         }
         $allPrice.text("￥"+sumPrice);
         $allNum.text("(共"+sumNum+"件商品)");
}
// 购物车选中商品总金额 End