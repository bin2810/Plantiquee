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
    <link rel="stylesheet" href="../asset/css/about.css"/>
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
                  echo '<div class="thong-bao-gio-hang-trong">🛒 Giỏ hàng trống.</div>';
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
          <div class="container-full banner">
            <div class="banner-img">
              <img src="../asset/img/banner.jpg" width="100%"  alt="" />
              <div class="baner-img-content">
                <p style="font-size:2rem;color:var(--bgnav-color)">CHÚNG TÔI ĐẾN TỪ</p>
                <p style="font-size:2.5rem;color:var(--bgnav-color)">NĂM THẾ HỆ NGƯỜI TRỒNG CÂY TRONG NHÀ KÍNH</p>
              </div>
            </div>
          </div>
          
          <div class="container-full">
              <div class="container-center">
                  <section class="gioi-thieu hien-ra-dl">
                      <div class="container_one">
                          <div class="cot-trai">
                          <!-- trống  -->
                          </div>
                          <div class="cot-phai">
                              <h2 style="text-align: center;">Chúng tôi tin tưởng</h2>
                              <p style="text-align: center;">Mọi người nên sống xanh hơn một chút .</p>
                              <p style="text-align:center;">Hoa cảnh quan ở đây​ để giúp củng cố mối quan hệ của chúng ta với thực vật . Chúng tôi làm cho việc mua cây kiến ​​trở nên dễ dàng bằng cách cung cấp cây khỏe mạnh, sẵn sàng để phát triển đến tận cửa nhà bạn và sắp xếp cho bạn​ với những mẹo và thủ thuật bạn cần​​​​ ​​​ để giúp cây trồng của chúng ta phát triển mạnh. Cây trồng làm cho cuộc sống tốt đẹp hơn . Chúng tôi làm cho cây kiến ​​dễ dàng hơn .</p>
                          </div>
                      </div>
                  </section>
              </div>
          </div>


          <div class="container-full">
              <div class="container-center">
                  <section class="gioi-thieu hien-ra-dl">
                      <div class="container_two">
                          <div class="cot-trai">
                              <img src="../asset/img/about1.jpg" alt="Ảnh 1" class="anh">
                          </div>
                          <div class="cot-phai">
                              <h2>Chúng ta đã quay trở lại</h2>
                              <p>Chúng tôi xuất thân từ năm thế hệ trồng cây trong nhà kính và là những người tiên phong trong ngành công nghiệp hoa, và nguồn gốc của chúng tôi bắt nguồn từ tổ tiên là những người tiên phong trong ngành làm vườn của Hà Lan.</p>
                              <p>Người sáng lập của chúng tôi, Justin Mast, lớn lên trong quá trình học tập tại nhà kính của cha mẹ mình trong khi họ xây dựng doanh nghiệp cung cấp cây non cho các nhà kính trên khắp Hoa Kỳ. Trong thời gian này, họ đã hoàn thiện cách giữ cho cây khỏe mạnh trong quá trình vận chuyển bằng cách phát triển hiểu biết sâu sắc về chuỗi cung ứng làm vườn.</p>
                              <p>Justin đã sử dụng kiến ​​thức và kinh nghiệm có được từ công việc kinh doanh của gia đình và kết hợp với niềm đam mê cây trồng để giao cây trồng sẵn đến tận nhà bạn từ nhà kính.</p>
                          </div>
                      </div>
                  </section>
              </div>
          </div>

          <div class="container-full">
              <div class="container-center">
                  <section class="gioi-thieu hien-ra-dl">
                      <div class="container_two">
                          <div class="cot-trai_three">
                              <img src="../asset/img/about2.png" alt="Ảnh 2" class="anh">
                          </div>
                          <div class="cot-phai_three">
                              <h2>Trực tiếp từ nhà kính</h2>
                              <p>Khi bạn mua một cây cảnh trong nhà từ một cửa hàng bán hộp hoặc vườn ươm, cây có thể mất trung bình bốn tuần để vận chuyển từ nhà kính đến một nhà kho có gió lùa trên một chiếc xe tải nóng hoặc lạnh. Sau đó, cây được vận chuyển đến một cửa hàng, nơi cây có thể không nhận được đủ nước, ánh sáng hoặc sự chăm sóc cần thiết để phát triển. Với Bloomscape, cây của chúng tôi được các chuyên gia về cây chăm sóc và được giữ trong điều kiện tối ưu tại nhà kính của chúng tôi, nơi chúng được vận chuyển trực tiếp đến bạn. Vì vậy, thay vì cây của bạn phải trải qua 4 tuần trong một môi trường không được kiểm soát, cây sẽ mất 3-4 ngày để đi từ nhà kính của chúng tôi đến tận cửa nhà bạn. Điều này có nghĩa là cây của bạn đến nơi khỏe mạnh và đã phát triển mạnh.</p>
                          </div>
                      </div>
                  </section>
              </div>
          </div>

          <div class="container-full">
              <div class="container-center">
                  <section class="gioi-thieu hien-ra-dl">
                      <div class="container_two">
                          <div class="cot-trai">
                              <img src="../asset/img/about3.jpg" alt="Ảnh 2" class="anh">
                          </div>
                          <div class="cot-phai">
                              <h2>Giao hàng đến tận cửa nhà bạn</h2>
                              <p>Cây của chúng tôi được vận chuyển cẩn thận và có kinh nghiệm. Chúng tôi đã học được cách giữ cây ở nhiệt độ phù hợp, bảo vệ rễ cây và giữ cho cây khỏe mạnh trong khi vận chuyển từ nhà kính đến nhà bạn. Bao bì sáng tạo của chúng tôi giữ cây cố định tại chỗ, ngăn ngừa hư hỏng và giảm thiểu đất bị đổ. Hầu hết các lô hàng sẽ đến trong vòng chưa đầy một tuần và tất cả các cây đều khỏe mạnh, không bị hư hỏng và sẵn sàng để bạn thưởng thức.</p>
                          </div>
                      </div>
                  </section>
              </div>
          </div>


          <div class="container-full">
              <div class="container-center">
                  <section class="gioi-thieu hien-ra-dl">
                      <div class="container_two">
                          <div class="cot-trai_three">
                              <img src="../asset/img/about4.png" alt="Ảnh 2" class="anh">
                          </div>
                          <div class="cot-phai_three">
                              <h2>Tất cả các hướng dẫn</h2>
                              <p>Chuyên môn của chúng tôi không dừng lại khi cây của bạn rời khỏi nhà kính của chúng tôi. Chúng tôi ở đây để giúp bạn giải đáp mọi thắc mắc về cách chăm sóc cây. Từ hướng dẫn chăm sóc đơn giản, tùy chỉnh kèm theo cây của bạn đến hỗ trợ chuyên gia theo thời gian thực, chúng tôi muốn việc chăm sóc cây trở nên dễ dàng. Hãy thoải mái gửi email, trò chuyện hoặc tweet cho chúng tôi bất kỳ câu hỏi nào bạn có — Nhóm Grow-How ® luôn sẵn sàng hỗ trợ!</p>
                          </div>
                      </div>
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