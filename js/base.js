/**
 * 扩展js功能
 * Created by 20161024 on 2016/12/8.
 */
$.fn.extend({
    /**
     * @param targets  切换的dom元素
     * @returns {*}
     */
    getTab: function (targets) {
        return this.each(function (index,element) {
            //this——>DOM元素
            this.index = index;
            $(this).mouseenter(function () {
                $(targets).siblings().hide();
                $(targets[this.index]).show();
            })
        });
    }
})