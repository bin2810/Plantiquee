<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập thì chuyển về trang login
    header("Location: ../index.php?act=login");
    exit;
}


if (empty($_SESSION['cart'])) {
  echo "<h2>Giỏ hàng trống!</h2>";
  exit;
}

$total_price = 0;


$tinhThanhVN = [
  "An Giang", "Bà Rịa - Vũng Tàu", "Bạc Liêu", "Bắc Giang", "Bắc Kạn", "Bắc Ninh", "Bến Tre",
  "Bình Dương", "Bình Định", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Cần Thơ",
  "Đà Nẵng", "Đắk Lắk", "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang",
  "Hà Nam", "Hà Nội", "Hà Tĩnh", "Hải Dương", "Hải Phòng", "Hậu Giang", "Hòa Bình", "Hưng Yên",
  "Khánh Hòa", "Kiên Giang", "Kon Tum", "Lai Châu", "Lạng Sơn", "Lào Cai", "Lâm Đồng", "Long An",
  "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Phú Yên", "Quảng Bình", "Quảng Nam",
  "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình",
  "Thái Nguyên", "Thanh Hóa", "Thừa Thiên Huế", "Tiền Giang", "TP. Hồ Chí Minh", "Trà Vinh",
  "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái"
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Plantiquee Checkout</title>
  <link rel="stylesheet" href="../asset/css//checkout.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="checkout">
    <!-- Form -->
    <div class="left-panel">
      <h1 class="brand"><a href="../"><img src="../asset/img/logo.png" alt=""></a></h1>
      <div class="step-label">Thông tin &gt; Thanh toán</div>

      <div class="express">
        <button class="express-btn shop">Shop Pay</button>
        <button class="express-btn paypal">PayPal</button>
        <button class="express-btn gpay">G Pay</button>
      </div>

      <div class="separator">HOẶC</div>

      <form class="checkout-form">
        <h3>Liên hệ</h3>
        <input type="email" placeholder="Email của bạn" value="<?=$_SESSION['user']['Email']?>" required/>
        <!-- <label class="checkbox-row">
          <input type="checkbox" checked/>
          Nhận thông tin và ưu đãi qua email
        </label> -->

        <h3>Địa chỉ thanh toán</h3>
        <select>
          <option>Chọn quốc gia</option>
          <option value="Việt Nam">Việt Nam</option>
        </select>

        <div class="row">
          <input type="text" placeholder="Họ Và Tên" value="<?=$_SESSION['user']['name']?>" />
          <!-- <input type="text" placeholder="Tên" /> -->
        </div>
        <input type="text" placeholder="Địa chỉ cụ thể" value="<?=$_SESSION['user']['DiaChi']?>"/>
        <input type="text" placeholder="Căn hộ, tầng, toà nhà (nếu có)" />
        <div class="row">
          <select>
            <?php foreach ($tinhThanhVN as $thanhpho): ?>
              <option value="<?=$thanhpho?>"><?=$thanhpho?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <input type="tel" placeholder="Số điện thoại" value="<?=$_SESSION['user']['SDT']?>"/>
        <!-- <label class="checkbox-row">
          <input type="checkbox" />
          Nhận cập nhật đơn hàng qua tin nhắn
        </label> -->
        <button class="submit-btn">Tiếp tục thanh toán</button>
      </form>

      <div class="footer">
        <a href="#">Chính sách hoàn tiền</a>
        <a href="#">Vận chuyển</a>
        <a href="#">Bảo mật</a>
        <a href="#">Điều khoản</a>
      </div>
    </div>

    <!-- Order Summary -->
    <div class="right-panel">
    <?php foreach ($_SESSION['cart'] as $item): ?>
    <?php
      $subtotal = $item['product_price'] * $item['quantity'];
      $total_price += $subtotal;
    ?>
      <div class="order-item">
      
        <div class="img-box">
          <img src="../asset/img/sanpham/<?=$item['product_img']?>" />
        </div>
        
        <div class="details">
          <p class="name"><a href="../page/Sanpham_CT.php?id=<?=$item['product_id']?>"><?= $item['product_name'] ?></a></p>
          <p class="desc"><?= $item['quantity'] ?></p>
        </div>
        <div class="price"><?= number_format($item['product_price'], 0, ',', '.') ?></div>
      </div>

      <?php endforeach; ?>  
      <!-- <div class="discount-row">
        <input type="text" placeholder="Mã giảm giá / thẻ quà tặng" />
        <button class="apply-btn">Áp dụng</button>
      </div> -->

      <div class="total-row">
        <span>Tổng cộng</span>
        <strong><?= number_format($total_price, 0, ',', '.') ?></strong>
      </div>
    </div>
  </div>
</body>
</html>
