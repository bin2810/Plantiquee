<?php
  session_start();
  include('include/database.php');

  $query = "SELECT * FROM tb_danhmuc_chinh";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
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
                            <img src='asset/img/sanpham/<?=$img?>' width="100%" alt='$name'>
                          </div>
                          <div class="cart-item-content">
                            <span><?=$name?></span><br>
                            <span>Giá:<?=number_format($price, 0, ',', '.')?>đ</span><br>
                            <span>Số lượng:<?=$qty?></span><br>
                            <form action="include/clear_cart.php" method="post">
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
                <form action="page/checkout.php" method="post">
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
              <a href="index.php?act=home"><img src="asset/img/logo.png" alt="" /></a>
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
                 <a href="index.php?act=<?=$dm_cha['MADM_cha']?>">
                  <span class="menu-item">
                    <?=$dm_cha['TENDM_cha']?>
                  </span>
                </a>
              </div>

              <?php
              }
              ?>
              <?php
                  if (isset($_SESSION['user']) && isset($_SESSION['user']['Hinhanh'])) {
                      $avatar = "asset/img/user/" . $_SESSION['user']['Hinhanh'];
                  } else {
                      $avatar = "asset/img/user/user.png"; 
                  }

                  $dashboard_link = "index.php?act=login"; 

                  if (isset($_SESSION['user']) && isset($_SESSION['user']['VaiTro'])) {
                      $dashboard_link = ($_SESSION['user']['VaiTro'] == 'admin') ? 'admin' : 'index.php?act=dashboard';
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
                <img class="nav-login-search hide-mobi hide-tablet" id="btn_search" src="asset/img/search.png" alt=""/>
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
                  <img src="asset/img/cart.png" alt="" />
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