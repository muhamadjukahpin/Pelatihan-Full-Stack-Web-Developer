$(document).ready(function(){
    $("#btn-menu").click(function (e) {
        e.preventDefault();
        $(".header").toggleClass('slideheader');
        $(".sidebar").toggleClass('slidesidebar');
        $(".section").toggleClass('slidesection');
        const a = $(this).html();
        (a == '&lt;&lt;') ? $(this).html('&gt;&gt;') : $(this).html('&lt;&lt;');
    });
});