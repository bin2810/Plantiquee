window.addEventListener("scroll", function() {
    var navbar = document.querySelector(".navbar");
    var boxSearch = document.querySelector(".search_product_mains");
    if (window.scrollY > 100) { 
        navbar.style.position = "fixed";
        navbar.style.top = "0rem";
        boxSearch.style.top = "50px"

    } else {
        navbar.style.top = "5rem";
        boxSearch.style.top = "15%"

    }
});

