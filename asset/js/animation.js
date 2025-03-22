document.addEventListener("scroll", function() {
    let elements = document.querySelectorAll(".hien-ra-dl, .hien-ra-t");
    let screenPosition = window.innerHeight / 1.2;

    elements.forEach((element) => {
        let position = element.getBoundingClientRect().top; // Thêm .top vào đây

        if (position < screenPosition) {
            element.classList.add("hien-thi");
        }
    });
});
