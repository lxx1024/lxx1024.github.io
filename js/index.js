/**
 * Created by 20161024 on 2016/12/8.
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
// ------------------------------------------------------------ 轮播图 Begin
$(function () {
    var $lbts = $('.dm-lbt .lbt-img li');   // 轮播图片
    var $arrows = $('.dm-lbt .lbt-arrow');   // 左右箭头 div
    var $arrowLeft = $('.dm-lbt .lbt-arrow .arrow-left');  //左边箭头span
    var $arrowRight = $('.dm-lbt .lbt-arrow .arrow-right');  //右边箭头span
    var $lbtNums = $('.dm-lbt .lbt-num li');   // 小图标
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
    timeId = setInterval(function () {
        play();
        showNum($lbtNums,picNum);
    },2000)
    // --------------------------------------------------- 鼠标移入移出事件
    $('.dm-lbt').mouseenter(function () {
        clearInterval(timeId);
        $arrows.css('opacity',1);

    }).mouseleave(function () {
        $arrows.css('opacity',0);
        timeId = setInterval(function () {
            play();
            showNum($lbtNums,picNum);
        },2000)
    });
    // -------------------------------------------------- 左右箭头的点击事件
    $arrowLeft.click(function () {
        picNum > 0 ? picNum -- : picNum = $lbts.length-1;
        showImg($lbts,picNum,800);
        showNum($lbtNums,picNum);
    });
    $arrowRight.click(function () {
        picNum < $lbts.length-1? picNum ++ : picNum = 0;
        showImg($lbts,picNum,800);
        showNum($lbtNums,picNum);
    });
    // --------------------------------------------------  小图标自动切换
    for (var i = 0; i < $lbtNums.length; i++) {
        var lbtNum = $lbtNums[i];
        lbtNum.index = i;
        $(lbtNum).mouseenter(function () {
            // this指代当前的小图标
            $(this).siblings().removeClass('current');
            $(this).addClass('current');
            $($lbts).siblings().hide();
            $($lbts[this.index]).fadeIn(800).css('opacity', 1);
            picNum = this.index;
        })
    };
// ------------------------------------------------------   封装的函数
    /**
     * 轮播图当前图片显示，其他图片隐藏
     * @param doms  操作的元素
     * @param index   索引
     * @param ms  速度 毫秒
     */
    function showImg(doms,index,ms){
        $(doms).hide();
        $(doms).eq(index).fadeIn(ms);
    }
    /**
     * 轮播图当前小图标高亮显示
     * @param doms  操作的元素
     * @param index   索引
     */
    function showNum(doms,index){
        $(doms).removeClass('current');
        $(doms).eq(index).addClass('current');
    }
    /**自动播放 函数*/
    function play(){
        picNum < $lbts.length-1? picNum ++ : picNum = 0;
        showImg($lbts,picNum,800);
    }
})
// 轮播图 End
// ------------------------------------------------------------ 今日热门 Begin
$(function(){
    var $titles = $('.dm-today .today-title li');   // 今日热门DOM元素
    var $contents = $('.dm-today .today-content li');   // 切换今日热门内容标签
    $titles.getOnly($contents);  // 切换内容   调用getOnly方法
    $titles.mouseover(function () {
        $titles.css('color','white');
        $(this).css('color','yellow');
    })
});
// 今日热门 End
// ------------------------------------------------------------- 品牌汇 Begin
$(function(){
    var $titles = $('.dm-pinpaihui .classes li a');   // 品牌汇导航DOM元素
    var $contents = $('.dm-pinpaihui .pinpai-content li');   // 切换品牌汇内容标签
    $titles.getOnly($contents);  // 切换内容   调用getOnly方法
    var timerId = 0;   //记录定时器，方便清除定时器
    $titles.mouseenter(function () {
        clearTimeout(timerId);
        var _this =this;   //this指代当前触发的dom元素
        $titles.css('background-color','#75A8E4');   //所有的导航背景色恢复原来的
        timerId = setTimeout(function () {
            //定时器里面的this指代的是window
            $(_this).css('background-color','rgba(255, 36, 210, 1)');   // 当前选中的导航颜色设置
        },300)   // 延迟该事件，让其本身的效果结束再执行。
    })
});
//品牌汇 End