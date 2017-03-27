/**
 * Created by 20161024 on 2017/3/20.
 */

// ------------------------------------------------------------ 导航栏 Begin
$(function(){
    var $navs = $('.nav li a');   // 导航DOM元素
    var $navsContent = $('.nav-content li');   // 切换导航内容标签
    //for (var i = 0; i < navs.length; i++) {
    //    var nav = navs[i];
    //    nav.index = i ;
    //    $(nav).mouseenter(function () {
    //        $(navsContent).siblings().hide();
    //        $(navsContent[this.index]).show();
    //    })
    //};  // --------这里封装成函数--> getOnly()
    $navs.getOnly($navsContent);  // 调用方法
    $('.dm-nav').mouseleave(function () {
        $($navsContent).hide();  //鼠标移开, 隐藏导航内容
    });
});
// 导航栏 End
