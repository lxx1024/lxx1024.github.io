/**
 * 扩展js功能
 * Created by 20161024 on 2016/12/8.
 */
$.fn.extend({
    /**
     * table栏切换
     * @param targets  切换的目标元素
     * @returns {*}
     */
    getOnly: function (targets) {
        return this.each(function (index, element) {
            //this——>DOM元素
            this.index = index;
            $(this).mouseenter(function () {
                $(targets).siblings().hide();
                $(targets[this.index]).show().css('opacity', 1);
            })
        });
    }
    //,
    //getNum: function (targets,className,picNum) {
    //    return this.each(function (index, element) {
    //        //this——>DOM元素
    //        this.index = index;
    //        $(this).mouseenter(function () {
    //            $(this).siblings().removeClass(className);
    //            $(this).addClass(className);
    //            $(targets).siblings().hide();
    //            $(targets[this.index]).show().css('opacity', 1);
    //            return picNum = this.index;
    //        })
    //    });
    //}

});
$.extend({

})