function newWidthLi() {
    var widthMenu = $('.top_menu').width();
    var countLi = $('.top_menu ul:first>li').size();
    var sumWidthLi = 0;
    $('.top_menu ul li').each(function() {
        sumWidthLi += $(this).width();
    });
    if (countLi < 3) {
        var sub = widthMenu - sumWidthLi;
        var result = Math.ceil(sub / (countLi));
        $('.top_menu ul li').each(function() {
            $(this).width($(this).width() + result);
        });
    } else {
        var sub = widthMenu - sumWidthLi;
        var result = Math.ceil(sub / (countLi - 2));
        var result2 = result / 2;
        var firstLi = $('.top_menu ul li:first');
        var lastLi = $('.top_menu ul li:last');
        $('.top_menu ul li').each(function() {
            if ($(this).width() == (firstLi.width()) || $(this).width() == (lastLi.width()))
                $(this).width($(this).width() + result2);
            else
                $(this).width($(this).width() + result);
        });
    }
}
$(document).ready(function() {
    newWidthLi();
});
// li -> display: table-cell;