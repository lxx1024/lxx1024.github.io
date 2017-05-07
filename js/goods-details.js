/*
* @Author: 20161024
* @Date:   2017-05-07 10:24:49
* @Last Modified by:   20161024
* @Last Modified time: 2017-05-07 11:12:08
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
    var minus = $('.buying-actions .counter-box .btn-minus');   // 数量减号DOM元素
    var plus = $('.buying-actions .counter-box .btn-plus');   // 数量加号DOM元素
    var num =  $('.buying-actions .counter-box .number');   //  商品数量
})

// 商品数量
