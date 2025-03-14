window.addEventListener("scroll", function() {
    var navbar = document.querySelector(".navbar");
    if (window.scrollY > 100) { 
        navbar.style.position = "fixed";
        navbar.style.top = "0rem";
    } else {
        navbar.style.top = "5rem";
    }
});

