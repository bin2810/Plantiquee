<?php
  session_start();
  include('../include/database.php');

  $query = "SELECT * FROM tb_danhmuc_chinh";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../asset/img/favicon.ico"/>
    <!-- <link rel="stylesheet" href="http://www.example.com/favicon.ico"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="../asset/css/resset.css"/>
    <link rel="stylesheet" href="../asset/css/bass.css"/>
    <link rel="stylesheet" href="../asset/css/main.css"/>
    <link rel="stylesheet" href="../asset/css/login.css"/>
    <link rel="stylesheet" href="../asset/css/dashboard.css"/>
    <link rel="stylesheet" href="../asset/css/HocHoi.css"/>
    <link rel="stylesheet" href="../asset/css/responsive.css" />
    
    <title>Về Chúng Tôi</title>
  </head>
  <body>
  <div class="main_cart">
          <div class="overlay" id="overlay" onclick="toggleCart()"></div>
          <div class="cart-sidebar" id="cartSidebar">
            <div class="cart-sidebar-header">
              <h2>Giỏ hàng của bạn</h2>
              <button class="close-cart" onclick="toggleCart()">✖</button>
              
            </div>
            <div class='cart-item'>
              <?php
                $total_quantity = 0;
                $total_price = 0;
                if (empty($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
                  echo "🛒 Giỏ hàng trống.";
                } else {
                  
                    foreach ($_SESSION['cart'] as $item) {
                        $id = $item['product_id'];
                        $name = $item['product_name'];
                        $img = $item['product_img'];
                        $price = $item['product_price'];
                        $qty = $item['quantity'];
                        $total = $price * $qty;
                    
              ?>
                        <div class='cart-item-content-big'>
                          <div class="cart-item-img">
                            <img src='../asset/img/sanpham/<?=$img?>' width="100%" alt='$name'>
                          </div>
                          <div class="cart-item-content">
                            <span><?=$name?></span><br>
                            <span>Giá:<?=number_format($price, 0, ',', '.')?>đ</span><br>
                            <span>Số lượng:<?=$qty?></span><br>
                            <form action="../include/clear_cart.php" method="post">
                              <input type="hidden" name="product_id" value="<?=$id?>">
                              <button type="submit">Xóa</button>
                            </form>
                            <!-- <a href="include/clear_cart.php">xóa</a> -->
                          </div>
                        </div>
                        

              <?php
                        $total_quantity += $item['quantity'];
                        $total_price += $total;
                        
                      }
                    }
                    
                  
              ?>
            </div>
            <?php
            if (empty($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            ?>
              <a href="" class="btn-checkout">Tiếp Tục Mua Sắm</a>
            <?php
              
            } else {
            ?>
                <span>Thành tiền: <?=number_format($total_price, 0, ',', '.')?></span> 
                <form action="../page/checkout.php" method="post">
                  <button type="submit" class="btn-checkout">Thanh Toán</button>
                </form>
                <?php
            }
                ?>
          </div>     
  </div>
    <div class="big">
      <header>
        <div class="container-full poromo-banner">
          <p>Welcome to Plantiquee</p>
        </div>
        <div class="container-full navbar">
          <div class="container-center nav">
            <div class="nav-img">
              <a href="../index.php?act=home"><img src="../asset/img/logo.png" alt="" /></a>
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
              <?php
              foreach ($danhmuc as $dm_cha) {
              
            ?>
              <div class="menu-list">
                 <a href="../index.php?act=<?=$dm_cha['MADM_cha']?>"><span class="menu-item">
                <?=$dm_cha['TENDM_cha']?>
                  <!-- <i class="fa-solid fa-angle-down"></i> -->
                </span></a>
              </div>

              <?php
              }
              ?>
              <?php
                  if (isset($_SESSION['user']) && isset($_SESSION['user']['Hinhanh'])) {
                      $avatar = "../asset/img/user/" . $_SESSION['user']['Hinhanh'];
                  } else {
                      $avatar = "../asset/img/user/user.png"; 
                  }

                  $dashboard_link = "../index.php?act=login"; 

                  if (isset($_SESSION['user']) && isset($_SESSION['user']['VaiTro'])) {
                      $dashboard_link = ($_SESSION['user']['VaiTro'] == 'admin') ? '../admin' : '../index.php?act=dashboard';
                  }
              ?>
              <div class="menu-list nav-login-signup">
                <a class="menu-item" href="<?= $dashboard_link; ?>"> LOGIN / SIGN UP </a>
              </div>
            </div>
            <div class="nav-login">
              <?php
                if (isset($_SESSION['user']['VaiTro'])) {
                    $vai_tro = $_SESSION['user']['VaiTro'];
                } else {
                    $vai_tro = null;
                }
                if ($vai_tro !== 'admin') { 
              ?>
                <img class="nav-login-search hide-mobi hide-tablet" id="btn_search" src="../asset/img/search.png" alt=""/>
              <?php
                }
              ?>
                <a href="<?= $dashboard_link; ?>">
                  <img class="nav-login-user hide-mobi hide-tablet" src="<?= $avatar; ?>" alt="User Avatar" />
                </a>
              
              <?php 
                if (isset($_SESSION['user']['VaiTro'])) {
                    $vai_tro = $_SESSION['user']['VaiTro'];
                } else {
                    $vai_tro = null;
                }
                if ($vai_tro !== 'admin') { 
              ?>
              <div class="nav-cart">
                <button class="cart-button" onclick="toggleCart()">
                  <img src="../asset/img/cart.png" alt="" />
                </button>
                <div class="nav-cart-count">
                <button class="cart-button" onclick="toggleCart()"><span><?=$total_quantity ?? ""?></span></button>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </header>
      <main>
        <?php
          $query_tintuc = "SELECT * FROM tb_tintuc";
          $stmt_tintuc = $conn->prepare($query_tintuc);
          $stmt_tintuc->execute();
          $tintuc = $stmt_tintuc->fetchAll(PDO::FETCH_ASSOC);
        ?>
          <div class="container-full bg-hochoi">
            <div class="container-center">
            
            <section class="blog-grid">
            <?php
              foreach ($tintuc as $tt) {
              
            ?>
            <a href="">
              <div class="blog-item">
                <img src="../asset/img/tintuc/<?=$tt['Hinh_Anh']?>" alt="Thumbnail">
                <p class="category"><?=$tt['Tieu_De']?></p>
              </div>
            </a>
              <?php
              }
            ?>
            </section>
            
            </div>
            
          </div>
          
          

      </main>









   


        <div class="main_chat hiden-tab-mobi" id="nutP">
          <button id="chat-btn"><div class="chat_bubble"><img src="../asset/img/logo-tab.png" alt=""></div></button>
        </div>
        <div id="chat-widget" class="chat-widget">
          <div class="chat-header">
              <span class="brand">Plantiquee</span>
              
              <button id="close-chat" class="close-chat">✖</button>
          </div>
          <div class="chat-body">
              <p>Xin Chào 👋🌱</p>
              <div class="chat-options">
                  <button>Send us a message</button>
                  <button>Order status</button>
                  <button>Plant Care, Guidance, & Troubleshooting</button>
              </div>
          </div>
          <div class="chat-footer">
              <p>adgfsg</p>
          </div>
        </div>

        <div class="container-full search_product_mains" id="box_search">
          <div class="search_product_main">
            <h1>Tìm Kiếm Sản Phẩm Yêu Thích Của Bạn</h1>
            <form action="include/Search_product.php" method="post">
              <input type="text" name="txt_search" id="" placeholder="NHẬP TÌM KIẾM CỦA BẠN">
            </form>
          </div>
        </div>
      <footer>
        <div class="container-full bg-footer">
          <div class="container-center footer">
            <div class="footer-img">
              <img src="../asset/img/logo-footer.png" alt="">
            </div>
            <div class="footer-content">
              <div class="footer-col">
                <p>Về Chúng Tôi</p>
                <a href="">Giới Thiệu</a>
                <a href="">Tuyển Dụng</a>
                <a href="">Đánh Giá</a>
                <a href="HocHoi.php">Học Hỏi</a>
                <a href="">Cam Kết Của Chúng Tôi</a>
                <a href="">Quà Tặng Doanh Nghiệp</a>
                <a href="">Chương Trình Thương Mại</a>
              </div>
              <div class="footer-col">
                <p>Hỗ Trợ</p>
                <a href="">Trợ Giúp + Câu Hỏi Thường Gặp</a>
                <a href="">Theo Dõi Đơn Hàng</a>
                <a href="">Vận Chuyển</a>
                <a href="">Trả Hàng</a>
                <a href="">Liên Hệ Hỗ Trợ</a>
              </div>
              <div class="footer-col">
                <p>Câu Hỏi Về Cây Cảnh ?</p>
                <a href="">Mẹo Chăm Sóc Cây</a>
                <a href="">Blog Về Cuộc Sống Xanh</a>
                <a href="">Ứng Dụng Plantiquee</a>
                <a href="">Liên Hệ Đội Ngũ Grow-How®</a>
              </div>
            </div>
          </div>
          <hr>
          <div class="container-center privacy-policy">
            <div class="security">
              <a href="">Điều Khoản</a>
              <a href="">Chính Sách Bảo Mật</a>
            </div>
            <div class="social-media">
              <a href="https://www.facebook.com/profile.php?id=61573249155245&locale=vi_VN"><img src="../asset/img/fb_1.png" alt=""></a>
              <a href="https://www.instagram.com/plantiquee/"><img src="../asset/img/inta_1.png" alt=""></a>
              <a href="https://www.tiktok.com/@plantiquee?is_from_webapp=1&sender_device=pc"><img src="../asset/img/tiktok_1.png" alt=""></a>
            </div>
          </div>
        </div>
      </footer>

        
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../asset/js/main.js"></script>
    <script src="../asset/js/animation.js"></script>
    <script src="../asset/js/navbar.js"></script>
    <script src="../asset/js/search.js"></script>
    <script src="../asset/js/so_luong_product.js"></script>
  </body>
</html>