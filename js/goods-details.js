/*
* @Author: 20161024
* @Date:   2017-05-07 10:24:49
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-11 10:54:26
*/

// ------------------------------------------------------------ 商品图片切换 Begin
$(function(){
    var $titles = $('.buying-details .spec-items li');   // 小图片DOM元素
    var $contents = $('.buying-details .main-img li');   // 切换大图片标签
    $titles.getOnlyclick($contents);  // 切换图片   调用getOnlyclick方法
    $titles.click(function () {
        $titles.css('border','none');
        $(this).css('border','1px solid #fba45e');
    })
});
// 商品图片切换 End

// ------------------------------------------------------------商品数量Begin
$(function(){
    var $minus = $('.counter-box .btn-minus');   // 数量减号DOM元素
    var $plus = $('.counter-box .btn-plus');   // 数量加号DOM元素
    var $num =  $('.counter-box .number');   //  商品数量
    var $max =  $('#inventor i')[0];   //  商品库存
    var max = +$($max).text();    //将字符型转为数值类型
    console.log(max);
    var num = $num.val();
    // console.log($num.val());   //获取数值
      $minus.click(function () {
            $($plus).css("background","#f0f0f0");
             $(this).css("background","#f0f0f0");
             if(num>1){
                    num--;
                    $num.val(num);
              }else {
                    $(this).css("background","#fba45e");
              }
      })
      $plus.click(function () {
             $($minus).css("background","#f0f0f0");
             $(this).css("background","#f0f0f0");
             if(num<max){
                    num++;
                    $num.val(num);
              }else {
                    $(this).css("background","#fba45e");
              }
      })
      // 点击添加到购物车
      var $cartAdd = $('.button-container .button-light');
      var $href = $cartAdd.attr("href");
      $cartAdd.click(function(){
                var str = window.location.search;// ?id=32   url跟问号后面的内容--传值
                var id = str.split("=")[1];   //32
                window.location.href="buying-car-add.php?id="+id+"&num="+num;
      })

})

// 商品数量
