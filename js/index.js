/**
 * Created by 20161024 on 2016/12/8.
 */

// ----------------------------------- 导航栏 Begin
$(function(){
    var navs = $('.nav li a');   // 导航DOM元素
    var navsContent = $('.nav-content li');   // 切换导航内容标签
    //for (var i = 0; i < navs.length; i++) {
    //    var nav = navs[i];
    //    nav.index = i ;
    //    $(nav).mouseenter(function () {
    //        $(navsContent).siblings().hide();
    //        $(navsContent[this.index]).show();
    //    })
    //};  // -----------------这里封装成函数--> getOnly()
    navs.getOnly(navsContent);  // 调用方法
    $('.dm-nav').mouseleave(function () {
        $(navsContent).hide();  //鼠标移开, 隐藏导航内容
    });
});
// 导航栏 End
// ------------------------------------- 轮播图 Begin
$(function () {
    var lbts = $('.dm-lbt li');
    var picNum = 0;
    var timeId = 0;
    clearInterval(timeId);
    $(lbts).css('opacity',1)
    timeId = setInterval(function () {
        //if(picNum < 4){
        //    picNum ++ ;
        //}else{
        //    picNum = 0;
        //} ----------- 换成下面的三元表达式
        picNum < 4? picNum ++ : picNum = 0;
        for (var i = 0; i < lbts.length; i++) {
            var lbt = lbts[i];
            $(lbt).hide();
        }
        $(lbts[picNum]).css('opacity',1).fadeIn(800);
    },5000);

    $('.dm-lbt').mouseenter(function () {
        clearInterval(timeId);
    }).mouseleave(function () {
        timeId = setInterval(function () {
            picNum < 4? picNum ++ : picNum = 0;
            for (var i = 0; i < lbts.length; i++) {
                var lbt = lbts[i];
                $(lbt).hide();
            }
            $(lbts[picNum]).fadeIn(1000);
        },5000)
    })
})
// 轮播图 End

