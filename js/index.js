/**
 * Created by 20161024 on 2016/12/8.
 */

// ----------------------------------- 导航栏 Begin
$(function(){
    var navs = $('.nav li');   // 导航DOM元素
    var navsContent = $('.nav-content li');   // 切换导航内容标签
    for (var i = 0; i < navs.length; i++) {
        var nav = navs[i];
        nav.index = i ;
        $(nav).mouseenter(function () {
            $(this).children("ul").stop().slideDown(600);
            $(navsContent).siblings().hide();
            $(navsContent[this.index]).show();
        })
    };
    $(navsContent).mouseleave(function () {
        $(navsContent).hide();  //鼠标移开, 隐藏导航内容   ---------- 这里有缺陷
    });
});
// 导航栏 End

