/**
 * 扩展js功能
 * Created by 20161024 on 2016/12/8.
 */
$.extend({
    /**
     * tab栏 内容 切换
     * @param  this  触发的Dom元素
     * @param target   切换的目标元素
     */
    changeTab:function(target){
        $(target).siblings().removeClass('current');
        $(target).addClass('current');
    }
});