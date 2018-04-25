(function ($) {
    $.fn.stickySidebar = function (options) {

        var config = $.extend({
            navSelector: '#nav',
            contentSelector: '#content',
            articleSelector: '#div1',
            footerSelector: '#footer',
            beforeSelector: '#sidebarBefore',
            sidebarTopMargin: 20,
            footerThreshold: 40
        }, options);

        var fixSidebr = function () {

            var sidebarSelector = $(this);
            var viewportHeight = $(window).height();//可视区高度
            var viewportWidth = $(window).width();
            var documentHeight = $(document).height();
            var navHeight = $(config.navSelector).outerHeight();//导航高度
            var sidebarHeight = sidebarSelector.outerHeight();//需要固定的div的高度
            var contentHeight = $(config.contentSelector).outerHeight();//轮播图高度
            var articlesHeight = $(config.articleSelector).outerHeight();//文章列表高度
            var contentHeight = contentHeight + articlesHeight;//内容高度
            var footerHeight = $(config.footerSelector).outerHeight();//底部高度
            var scroll_top = $(window).scrollTop();//滚动条距离顶部高度
            var fixPosition = contentHeight - sidebarHeight;
            var breakingPoint1 = navHeight;
            var breakingPoint2 = documentHeight - (sidebarHeight + footerHeight + config.footerThreshold);
            //alert(sidebarHeight + footerHeight + config.footerThreshold);

            var beforeHeight = $(config.beforeSelector).offset().top;
            var beforeSelfHeight = $(config.beforeSelector).height();
            var beforeAllHeight = beforeHeight + beforeSelfHeight + 22;

            // calculate
            if ((contentHeight > sidebarHeight) && (viewportHeight > sidebarHeight)) {

                if ((scroll_top < breakingPoint1) || (scroll_top < beforeAllHeight)) {
                    //alert('①滚动条:'+scroll_top + " 前一个到顶部：" + beforeAllHeight);
                    sidebarSelector.removeClass('sticky');

                } else if ((scroll_top >= breakingPoint1) && (scroll_top < breakingPoint2)) {
                    //alert('②滚动条:'+scroll_top + " 底部： " + breakingPoint2);
                    sidebarSelector.addClass('sticky').css('top', navHeight + 30);

                } else {
                    //alert('③:');

                    var negative = breakingPoint2 - scroll_top;
                    sidebarSelector.addClass('sticky').css('top', navHeight + 30);

                }

            }else{
                var a = "内容高度： " + contentHeight + " ； div高度： " + sidebarHeight + " ； 可视区高度： " + viewportHeight + " ； div高度： " + sidebarHeight;
                // alert(a);
            }
        };

        return this.each(function () {
            $(window).on('scroll', $.proxy(fixSidebr, this));
            $(window).on('resize', $.proxy(fixSidebr, this))
            $.proxy(fixSidebr, this)();
        });

    };

}(jQuery));