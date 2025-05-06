<?php
  session_start();
  include('../include/database.php');

  $query = "SELECT * FROM tb_danhmuc_chinh";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query_ct_product = "SELECT * FROM tb_sanpham WHERE SanPham_id = ?";
    $stmt_ct_product = $conn->prepare($query_ct_product);
    $stmt_ct_product->execute([$id]);
    $chi_tiet_product = $stmt_ct_product->fetchAll(PDO::FETCH_ASSOC);
  }

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
    <link rel="stylesheet" href="../asset/css/Product.css" />
    <link rel="stylesheet" href="../asset/css/Product_ct.css" />
    <link rel="stylesheet" href="../asset/css/dashboard.css"/>
    <link rel="stylesheet" href="../asset/css/responsive.css" />
    
    <title><?=$chi_tiet_product[0]['TenSP']?></title>
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
        <div class="container-full ">
            <div class="container-center">
              <?php
                  foreach ($chi_tiet_product as $CT_Product) {
              ?>
                <div class="product_ct">
                    <div class="product_ct_left">
                        <div class="product_ct_left_img">
                            <img src="../asset/img/sanpham/<?=$CT_Product['MA_DM_con']?>/<?=$CT_Product['Ten_Khoa_Hoc']?>/<?=$CT_Product['HinhAnh']?>" alt="">
                        </div>
                    </div>
                    <div class="product_ct_right">
                        <div class="product_ct_right_content">
                            <div class="product_ct_right_header">
                                <p><?=$CT_Product['TenSP']?></p>
                                <?php
                                  $giasp = number_format($CT_Product['DonGia'],0,',','.');
                                ?>
                                <p><?=$giasp?> VND</p>
                            </div>
                            <div class="product_ct_right_mota">
                                <p><?=$CT_Product['Title_SP']?></p>
                            </div>
                            <div class="product_ct_right_addtocart">
                                <div class="product_ct_right_addtocart_number">
                                  <button id="giam"  class="btn_addcart">-</button>
                                  <span id="soluong">1</span>
                                  <button id="tang" class="btn_addcart">+</button>
                                </div>
                                <div class="product_ct_right_addtocart_button">
                                <form class="addtocardform" action="../include/add_to_cart_chitiet.php" method="post">
                                  <input type="hidden" name="product_id" value="<?=$CT_Product['SanPham_id']?>">
                                  <input type="hidden" name="product_img" value="<?=$CT_Product['MA_DM_con']?>/<?=$CT_Product['Ten_Khoa_Hoc']?>/<?=$CT_Product['HinhAnh']?>">
                                  <input type="hidden" name="product_prive" value="<?=$CT_Product['DonGia']?>">
                                  <input type="hidden" name="product_name" value="<?=$CT_Product['TenSP']?>">
                                  <input type="hidden" name="quantity" id="quantityInput" value="1">
                                
                                  <button class="addToCart" id="addToCart" type="submit">Thêm Vào Giõ Hàng</button>
                                </form>
                                  <!-- <button id="addToCart" type="submit">Thêm Vào Giõ Hàng</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
              
            </div>
        </div>
        <div class="container-full bg-mota">
          <div class="container-center">
            <div class="product_mota">
              <div class="product_mota_left">
                <div class="product_mota__header">
                  <p>Mô Tả Sản Phẩm</p>
                  <p><?=$CT_Product['MoTa']?></p>
                  <hr>
                  <?php
                    if($CT_Product['MA_DM_con'] == 'CC' || $CT_Product['MA_DM_con'] == 'DDVCS'){
                  ?>
                  <!-- không hiện gì cả -->
                  <?php }else{?>
                    <p>Tên Khoa Học</p>
                    <p><?=$CT_Product['Ten_Khoa_Hoc']?></p>
                    <p>Tên Thường Gọi</p>
                    <p><?=$CT_Product['Ten_Pho_Bien']?></p>
                  <?php }?>
                </div>
                  
              </div>
              <div class="product_mota_right">
                  <div class="product_mota_right_content">
                    <img src="../asset/img/sanpham/<?=$CT_Product['MA_DM_con']?>/<?=$CT_Product['Ten_Khoa_Hoc']?>/<?=$CT_Product['HinhAnh']?>" alt="">
                  </div>
              </div>
                      
            </div>
          </div>
        </div>
        <?php
          }
        ?>

        <div class="container-center product">
          <div class="product-title">
            <p>Có Thể Bạn Sẽ Thích</p>
            <p><a href="">Xem Tất cả</a></p>
          </div>
          <div class="product-list">
          <?php
            include_once('../include/database.php');
            $query_hangmoive = "SELECT * FROM tb_sanpham ORDER BY RAND()";
            $stmt_hangmoive = $conn ->prepare($query_hangmoive);
            $stmt_hangmoive->execute();

            $Hangmoive = $stmt_hangmoive ->fetchAll(PDO::FETCH_ASSOC)
          ?>
            <ul class="product-item">
              <?php
                foreach ($Hangmoive as $HMV) {
              ?>
              <li class="product-item-col">
                <div class="product-item-col-img <?=$HMV['TinhTrang']?>">
                  <a href="Sanpham_CT.php?id=<?=$HMV['SanPham_id']?>"><img src="../asset/img/sanpham/<?=$HMV['MA_DM_con']?>/<?=$HMV['Ten_Khoa_Hoc']?>/<?=$HMV['HinhAnh']?>" alt="" /></a>
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p><?=$HMV['TenSP']?></p>
                  </div>
                  <div class="product-item-col-information-col-right">
                  <?php
                    $giasp = number_format($HMV['DonGia'],0,',','.');
                  ?>
                    <p><?=$giasp?> VND</p>
                  </div>
                </div>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>
    </main>









    <div class="main_card">
          <div class="overlay" id="overlay" onclick="toggleCart()"></div>
          <div class="cart-sidebar" id="cartSidebar">
            <button class="close-cart" onclick="toggleCart()">✖</button>
            <h2>Giỏ hàng của bạn</h2>
          </div>
        </div>


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
                <a href="">Tin Tức</a>
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