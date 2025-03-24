$(document).ready(function () {
    $(".header-shop-product").click(function () {
        $(this).next(".shop-product-content").slideToggle();
    });
});


// cart
function toggleCart() {
    var cart = $("#cartSidebar");
    var overlay = $("#overlay");

    cart.toggleClass("active");
    overlay.toggleClass("active");
}


// chat
$('#chat-btn,#chat-btn-1').on('click', function () {
    $('#chat-widget').css('display', 'block'); 
    setTimeout(function () {
        $('#chat-widget').css('transform', 'scale(1)'); 
    }, 10);
});

$('#close-chat').on('click', function () {
    $('#chat-widget').css('transform', 'scale(0)'); 
    setTimeout(function () {
        $('#chat-widget').css('display', 'none'); 
    }, 400); 
});




document.addEventListener("DOMContentLoaded", function () {
    const nutP = document.getElementById("nutP");
    const footer = document.querySelector("footer");

    window.addEventListener("scroll", function () {
        const footerTop = footer.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (footerTop < windowHeight) {
            nutP.classList.add("dich-vao"); // Khi chạm footer, dịch vào
        } else {
            nutP.classList.remove("dich-vao"); // Khi kéo lên, trở lại vị trí cũ
        }
    });
});
