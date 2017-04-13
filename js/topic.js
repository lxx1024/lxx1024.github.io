/*
* @Author: 20161024
* @Date:   2017-04-13 08:51:49
* @Last Modified by:   20161024
* @Last Modified time: 2017-04-13 09:20:41
* 手机社区切换话题tab栏效果
*/
// ------------------------------------------------------------ 话题切换 topic  Begin
$(function(){
    var $tabs = $('.topic-left .topic-tabs li');   // 话题tab栏DOM元素
    var $contents = $('.topic-left  .topics li');   // 切话tab栏内容标签
    $tabs.getOnlyclick($contents);  // 切换内容   调用getOnlyclick方法
    $tabs.click(function () {
        $tabs.children().css('color','#333');
        $(this).children().css('color','#3fcab8');
    })
});
// 话题切换 End