
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="icon" type="image/png" href="/plantiquee/asset/img/logo-tab.png" /> -->
    <!-- <link rel="shortcut icon" href="http://localhost/plantiquee/asset/img/favicon.ico" type="image/x-icon" /> -->
    <!-- <link rel="icon" href="http://localhost/plantiquee/asset/img/favicon.ico" type="image/x-icon"> -->
    <!-- <link rel="shortcut icon" href="/asset/img/favicon.ico"/> -->
    <!-- <link rel="stylesheet" href="http://www.example.com/favicon.ico"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="asset/css/resset.css"/>
    <link rel="stylesheet" href="asset/css/bass.css"/>
    <link rel="stylesheet" href="asset/css/main.css"/>
    <link rel="stylesheet" href="asset/css/login.css"/>
    <link rel="stylesheet" href="asset/css/dashboard.css"/>
    <link rel="stylesheet" href="asset/css/Product.css" />
    <link rel="stylesheet" href="asset/css/Product_ct.css" />
    <link rel="stylesheet" href="asset/css/dashboard.css"/>
    <link rel="stylesheet" href="asset/css/responsive.css" />
    
    <title></title>
  </head>
  <body>

<?php 
include_once('include/header.php');
?>


<?php  
      $page = isset($_GET['act']) ? $_GET['act'] : 'home'; 
  
      switch ($page) {
            case 'home':
                include 'page/home.php';
                break;
            case 'login':
                include 'page/login.php';
                break;
                case 'login_inc': 
                    include 'page/login_inc_.php';
                    break;
            case 'signup':
                include 'page/signup.php';
                break;
            case 'dashboard':
                include 'page/user_dashboard.php';
                break;
                case 'bangdieukien':
                    include 'page/bangdieukien.php';
                    break;
                case 'donhang':
                    include 'page/donhang.php';
                    break;
                case 'phieugiamgia':
                    include 'page/phieugiamgia.php';
                    break;
                case 'diachi':
                    include 'page/diachi.php';
                    break;
                case 'chitiettaikhoan':
                    include 'page/chitiettaikhoan.php';
                    break;
            case 'CT':
                include 'page/Sanpham.php';
                break;
            case 'DC':
                include 'page/Sanpham.php';
                break;
            case 'HH':
                include 'page/Sanpham.php';
                break;
            case 'QT':
                include 'page/Sanpham.php';
                break;
            case 'TQT':
                include 'page/Sanpham.php';
                break;
            case 'about':
                include 'page/about.php';
                break;
            default:
                echo "<h2>404 - Trang không tồn tại</h2>";
                break;
      }
?> 

  <?php include 'include/footer.php'; ?>
  

