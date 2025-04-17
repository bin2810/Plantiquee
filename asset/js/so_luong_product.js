const nutGiam = document.getElementById("giam");
const nutTang = document.getElementById("tang");
const soLuongHienThi = document.getElementById("soluong");
const inputQuantity = document.getElementById("quantityInput");

let soLuong = 1;

nutTang.addEventListener("click", () => {
    soLuong++;
    soLuongHienThi.textContent = soLuong;
    inputQuantity.value = soLuong;
});

nutGiam.addEventListener("click", () => {
    if (soLuong > 1) {
        soLuong--;
        soLuongHienThi.textContent = soLuong;
        inputQuantity.value= soLuong;
    }
});

