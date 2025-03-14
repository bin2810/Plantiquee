$(document).ready(function () {
    $(".menu-list").hover(
        function () {
            $(this).find(".dropdown").stop().slideDown(200);
        },
        function () {
            $(this).find(".dropdown").stop().slideUp(200);
        }
    );
});



$(document).ready(function () {
    $(".header-shop-product").click(function () {
        $(this).next(".shop-product-content").slideToggle();
    });
});

