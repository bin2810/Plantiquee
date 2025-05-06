$(document).ready(function () {
    $(".header-shop-product").click(function () {
        $(this).next(".shop-product-content").slideToggle();
    });
});




  document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector(".nav-category");
    const toggleBtn = document.querySelector(".nav-bars");

    // Toggle menu
    toggleBtn.addEventListener("click", function (e) {
      menu.classList.toggle("show-nav");
      e.stopPropagation(); // Ngăn sự kiện lan ra ngoài
    });

    // Bấm ngoài sẽ đóng
    document.addEventListener("click", function (e) {
      if (!menu.contains(e.target) && !toggleBtn.contains(e.target)) {
        menu.classList.remove("show-nav");
      }
    });

    // Ngăn không đóng khi click bên trong menu
    menu.addEventListener("click", function (e) {
      e.stopPropagation();
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




// show hide password cũ
function togglePassword(icon, inputId) {
    const input = document.getElementById(inputId);
    const isHidden = input.type === 'password';
    input.type = isHidden ? 'text' : 'password';
    icon.classList.toggle('fa-eye');
    icon.classList.toggle('fa-eye-slash');
}



function validateEmail() {
    const email = document.getElementById("email").value;
    const cccd = document.getElementById("cccd").value;
    const sdt = document.getElementById("sdt").value;
    const regex_email = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const regex_cccd = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const regex_sdt = /^0\d{9}$/;
    
    if (!regex_email.test(email)) {
        document.getElementById("email-error").textContent = "Email không hợp lệ!";
        return false; // chặn form submit
    }
    if (!/^\d{12}$/.test(cccd)) {
        document.getElementById("cccd-error").textContent = "CCCD phải đủ 12 chữ số";
        return false;
    }
    if (!regex_sdt.test(sdt)) {
        document.getElementById("sdt-error").textContent = "Số điện thoại không hợp lệ!";
        return false;
    }
    return true;
}





// gift
  const amountButtons = document.querySelectorAll('.amount-btn');
  amountButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      amountButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  const designImgs = document.querySelectorAll('.design-img');
  const previewImg = document.getElementById('preview-img'); // Hình to bên phải

  designImgs.forEach(img => {
    img.addEventListener('click', () => {
      designImgs.forEach(i => i.classList.remove('active'));
      img.classList.add('active');

      // Cập nhật hình lớn bên phải
      previewImg.src = img.src;
    });
  });

