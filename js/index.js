/**
 * Created by 20161024 on 2016/12/8.
 */

// ------------------------------------------------------------ 导航栏 Begin
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
    //};  // --------这里封装成函数--> getOnly()
    navs.getOnly(navsContent);  // 调用方法
    $('.dm-nav').mouseleave(function () {
        $(navsContent).hide();  //鼠标移开, 隐藏导航内容
    });
});
// 导航栏 End
// ----------------------------------------------------------- 轮播图 Begin
$(function () {
    var $lbts = $('.dm-lbt li');   // 轮播图片
    var $arrows = $('.dm-lbt .lbt-arrow');   // 左右箭头 div
    var $arrowLeft = $('.dm-lbt .lbt-arrow .arrow-left');  //左边箭头 span
    var $arrowRight = $('.dm-lbt .lbt-arrow .arrow-right');  //右边箭头 span
    var picNum = 0;    // 图片轮播标记变量
    var timeId = 0;
    $($lbts).css('opacity',1);
    clearInterval(timeId);
    //timeId = setInterval(function () {
    //    //picNum < 4? picNum ++ : picNum = 0;
    //    //for (var i = 0; i < $lbts.length; i++) {
    //    //    var lbt = $lbts[i];
    //    //    $(lbt).hide();
    //    //}
    //    //$($lbts[picNum]).css('opacity',1).fadeIn(800);
    //    play();  // 调用自动播放函数
    //},2000);
    timeId = setInterval(play,2000);
    // ------------------------------------------ 鼠标移入移出事件
    $('.dm-lbt').mouseenter(function () {
        clearInterval(timeId);
        $arrows.css('opacity',1);

    }).mouseleave(function () {
        $arrows.css('opacity',0);
        timeId = setInterval(play,2000)
    });
    // ------------------------------------------ 左右箭头的点击事件
    $arrowLeft.click(function () {
        picNum > 0 ? picNum -- : picNum = $lbts.length-1;
        showOne(picNum,800);

    });
    $arrowRight.click(function () {
        picNum < $lbts.length-1? picNum ++ : picNum = 0;
        showOne(picNum,800);
    });
// ----------------------------------------------- 封装的函数
    /**
     * 轮播图当前图片显示，其他图片隐藏
     * @param index   索引
     * @param ms  速度 毫秒
     */
    function showOne(index,ms){
        $lbts.hide();
        $lbts.eq(index).fadeIn(ms);
    }
    /**自动播放 函数*/
    function play(){
        picNum < $lbts.length-1? picNum ++ : picNum = 0;
        showOne(picNum,800);
    }
})
// 轮播图 End

