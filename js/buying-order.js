/*
* @Author: 20161024
* @Date:   2017-05-12 22:43:18
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-14 21:39:12
*/
// ------------------------------------------------------------ 订单导航 Begin
$(function(){
    var $titles = $('.order-form .nav li');   // 导航DOM元素
    var $contents = $('.order-form .order-box li');   // 切换今日热门内容标签
    $titles.getOnlyclick($contents);  // 切换内容   调用getOnlyclick方法
    $titles.click(function () {
        $titles.css('color','black').css('font-weight','normal');
        $(this).css('color','red').css('font-weight','bold');
    })
});
// 订单导航 End
// 设置同样高度 Begin
$(function(){
    var $orders=$('.order-box .orders');
    for (var i = 0; i < $orders.length; i++) {
        var $prod = $orders.eq(i).find(".product");
        console.log($prod);
        var $other= $orders.eq(i).find(".other");
        var $array = [];
        for (var j = 0; j < $other.length; j++) {
            $array.push($($other[j]).height());
        }
        $max = Math.max.apply(null, $array);
        if($max>$prod.height()){
            $other.height($max);
            $prod.height($max);
        }else{
            $other.height($prod.height());
       }

    }

})

// 设置同样高度End