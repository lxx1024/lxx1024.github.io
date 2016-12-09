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
});
$.extend({
    playlbt: (function () {
        return function (imgs, index, num, ms) {
            index < num ? index++ : index = 0;
            for (var i = 0; i < imgs.length; i++) {
                var img = imgs[i];
                $(img).hide();
            }
            $(imgs[index]).fadeIn(ms);
        }
    })()
})