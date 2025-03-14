<?php
    session_start();
?>
<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="website icon" type="image/png" href="../asset/img/logo-tab.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="../asset/css/resset.css"/>
    <link rel="stylesheet" href="../asset/css/bass.css"/>
    <link rel="stylesheet" href="../asset/css/main.css"/>
    <link rel="stylesheet" href="../asset/css/login.css"/>
    <link rel="stylesheet" href="../asset/css/responsive.css" />
    <link rel="stylesheet" href="../asset/css/dashboard.css"/>
    <link rel="stylesheet" href="../asset/css/responsive.css" />
    
    <title></title>
  </head>
  <body>
    <div class="big">
      <header>
        <div class="container-full poromo-banner">
          <p>Welcome to Plantique</p>
        </div>
        <div class="container-full navbar">
          <div class="container-center nav">
            <div class="nav-img">
              <a href="../index.php"><img src="../asset/img/logo.png" alt="" /></a>
            </div>
            <i class="fa-solid fa-bars nav-bars show-tab-mobi" id="bars"></i>
            <div class="nav-category bars-category">
              <div class="menu-list menu-search">
                <span class="menu-item">
                  SEARCH
                  <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <div class="dropdown">
                  <div class="container-center dropdown-container">
                    <input type="text" name="" id="" />
                  </div>
                </div>
              </div>
              <div class="menu-list">
                <span class="menu-item">
                  CÂY TRỒNG
                  <i class="fa-solid fa-angle-down"></i>
                </span>
                <div class="dropdown">
                  <div class="container-center dropdown-container">
                    <ul>
                      <li><a href="#">Bán Chạy Nhất</a></li>
                      <li><a href="#">Cây Dễ Chăm Sóc</a></li>
                      <li><a href="#">Cây Sống Tốt Trong Bóng Răm</a></li>
                      <li><a href="#">Cây An Toàn Cho Thú Cưng</a></li>
                      <li><a href="#">Cửa Hàng Tết Nguyên Đán</a></li>
                      <li><a href="#">Hàng Mới Về</a></li>
                    </ul>
                    <div class="img-nav">
                      <div class="img-col">
                        <img src="../asset/img/img-TV(1).jpg" alt="" />
                        <span>Cây Tán Rộng</span>
                      </div>
                      <div class="img-col">
                        <img src="../asset/img/img-TV(2).jpg" alt="" />
                        <span>Cây Thân Thiện Với Thú Cưng</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="menu-list">
                <span class="menu-item">
                  DỤNG CỤ
                  <i class="fa-solid fa-angle-down"></i>
                </span>
                <div class="dropdown">
                  <div class="container-center dropdown-container">
                    <ul>
                      <li><a href="#">Chậu Cây</a></li>
                      <li><a href="#">Dụng Cụ</a></li>
                      <li><a href="#">Dinh Dưỡng Và Chăm Sóc</a></li>
                      <li><a href="#">Trang Trí Và Phụ Kiện</a></li>
                      <li><a href="#">Cửa Hàng Nhân Giống Cây</a></li>
                      <li><a href="#">Bộ Dụng Cụ Thay Chậu</a></li>
                      <li><a href="#">Back In Stock</a></li>
                    </ul>
                    <div class="img-nav">
                      <div class="img-col">
                        <img src="../asset/img/img-TV(3).jpg" alt="" />
                        <span>Cách Dạng Chăm Sóc Cây Cỏ</span>
                      </div>
                      <div class="img-col">
                        <img src="../asset/img/img-TV(4).jpg" alt="" />
                        <span>Chậu Thân Thiện Với Môi Trường</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="menu-list">
                <span class="menu-item">
                  QUÀ TẶNG
                  <i class="fa-solid fa-angle-down"></i>
                </span>

                <div class="dropdown">
                  <div class="container-center dropdown-container">
                    <ul>
                      <li><a href="#">Quà Tặng Sinh Nhật</a></li>
                      <li><a href="#">Quà Tặng Gia Đình</a></li>
                      <li><a href="#">Quà Tặng Tân Gia</a></li>
                    </ul>
                    <div class="img-nav">
                      <div class="img-col">
                        <img src="../asset/img/img-TV(5).jpg" alt="" />
                        <span>Quà Tặng Dưới 1000 VND</span>
                      </div>
                      <div class="img-col">
                        <img src="../asset/img/img-TV(6).jpg" alt="" />
                        <span>Quà Tặng Dưới 500 VND</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="menu-list">
                <span class="menu-item">
                  HỌC HỎI
                  <i class="fa-solid fa-angle-down"></i>
                </span>

                <div class="dropdown">
                  <div class="container-center dropdown-container">
                    <ul>
                      <li class="learn-title">HƯỚNG DẪN CHĂM SÓC</li>
                      <li>
                        <a href="#">Nhận Hướng Dẫn Chăm Sóc Cây Của Bạn</a>
                      </li>
                      <li class="learn-title">SERIES CHĂM SÓC CÂY MÙA HÈ</li>
                      <li>
                        <a href="#">Hướng dẫn Grow-How® chăm sóc cây mùa hè</a>
                      </li>
                    </ul>
                    <ul>
                      <li class="learn-title">BLOG CHĂM SÓC CÂY</li>
                      <li>
                        <a href="#"
                          >Mẹo chăm sóc cây trong nhà và những điều cơ bản</a
                        >
                      </li>
                      <li class="learn-title">BLOG SỐNG XANH</li>
                      <li>
                        <a href="#"
                          >Mẹo và cảm hứng để sống xanh, gần gũi thiên nhiên</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="menu-list">
                <span class="menu-item"> QUÀ TẶNG DOANH NGHIỆP </span>
              </div>
              <div class="menu-list nav-login-signup">
                <a class="menu-item"> LOGIN / SIGN UP </a>
              </div>
            </div>
            <div class="nav-login">
              <img class="nav-login-search hide-mobi hide-tablet" src="../asset/img/search.png" alt=""/>
              <?php
                  if (isset($_SESSION['user']) && isset($_SESSION['user']['Hinhanh'])) {
                      $avatar = "../asset/img/" . $_SESSION['user']['Hinhanh'];
                  } else {
                      $avatar = "../asset/img/user.png"; 
                  }

                  $dashboard_link = "../page/login.php"; 

                  if (isset($_SESSION['user']) && isset($_SESSION['user']['VaiTro'])) {
                      $dashboard_link = ($_SESSION['user']['VaiTro'] == 'admin') ? '../admin' : 'user_dashboard.php';
                  }
              ?>
                <a href="<?= $dashboard_link; ?>">
                    <img class="nav-login-user hide-mobi hide-tablet" src="<?= $avatar; ?>" alt="User Avatar" />
                </a>

              <div class="nav-cart">
                <img src="../asset/img/cart.png" alt="" />
                <div class="nav-cart-count">
                  <span>1</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>