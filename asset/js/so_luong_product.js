const nutGiam = document.getElementById("giam");
const nutTang = document.getElementById("tang");
const soLuongHienThi = document.getElementById("soluong");
// const nutThemVaoGio = document.getElementById("addToCart");

let soLuong = 1;

nutTang.addEventListener("click", () => {
    soLuong++;
    soLuongHienThi.textContent = soLuong;
});

nutGiam.addEventListener("click", () => {
    if (soLuong > 1) {
        soLuong--;
        soLuongHienThi.textContent = soLuong;
    }
});

// nutThemVaoGio.addEventListener("click", () => {
//     alert(`Số lượng đã chọn: ${soLuong}`);
// });
