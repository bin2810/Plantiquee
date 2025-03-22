<?php
  session_start();
  include('include/database.php');

  $query = "SELECT * FROM tb_danhmuc_chinh";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $danhmuc = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="icon" type="image/png" href="/plantiquee/asset/img/logo-tab.png" /> -->
    <!-- <link rel="shortcut icon" href="http://localhost/plantiquee/asset/img/favicon.ico" type="image/x-icon" /> -->
    <!-- <link rel="icon" href="http://localhost/plantiquee/asset/img/favicon.ico" type="image/x-icon"> -->
    <link rel="shortcut icon" href="/asset/img/favicon.ico"/>
    <link rel="stylesheet" href="http://www.example.com/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="asset/css/resset.css"/>
    <link rel="stylesheet" href="asset/css/bass.css"/>
    <link rel="stylesheet" href="asset/css/main.css"/>
    <link rel="stylesheet" href="asset/css/login.css"/>
    <link rel="stylesheet" href="asset/css/dashboard.css"/>
    <link rel="stylesheet" href="asset/css/Product.css" />
    <link rel="stylesheet" href="asset/css/dashboard.css"/>
    <link rel="stylesheet" href="asset/css/responsive.css" />
    
    <title></title>
  </head>
  <body>
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
                 <a href="index.php?act=<?=$dm_cha['MADM_cha']?>"><span class="menu-item">
                <?=$dm_cha['TENDM_cha']?>
                  <!-- <i class="fa-solid fa-angle-down"></i> -->
                </span></a>
              </div>

              <?php
              }
              ?>
              <?php
                  if (isset($_SESSION['user']) && isset($_SESSION['user']['Hinhanh'])) {
                      $avatar = "asset/img/" . $_SESSION['user']['Hinhanh'];
                  } else {
                      $avatar = "asset/img/user.png"; 
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
                <img class="nav-login-search hide-mobi hide-tablet" src="asset/img/search.png" alt=""/>
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
                <button class="cart-button" onclick="toggleCart()"><span>1</span></button>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </header>