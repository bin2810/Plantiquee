<?php
session_start();
ob_start();
include_once 'mail/index.php';
$mail = new Mailer();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="asset/img/logo-tab.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="asset/css/resset.css"/>
    <link rel="stylesheet" href="asset/css/bass.css"/>
    <link rel="stylesheet" href="asset/css/main.css"/>
    <link rel="stylesheet" href="asset/css/login.css"/>
    <link rel="stylesheet" href="asset/css/dashboard.css"/>
    <link rel="stylesheet" href="asset/css/Product.css" />
    <link rel="stylesheet" href="asset/css/Product_ct.css" />
    <link rel="stylesheet" href="asset/css/dashboard.css"/>
    <link rel="stylesheet" href="asset/css/giftcard.css"/>
    <link rel="stylesheet" href="asset/css/error_page.css"/>
    <link rel="stylesheet" href="asset/css/responsive.css" />
    
<?php 
  $page = isset($_GET['act']) ? $_GET['act'] : 'home'; 

  switch ($page) {
    case 'home':
      $title = 'Trang Chủ';
      break;
    case 'login':
    case 'login_inc':
      $title = 'Đăng Nhập';
      break;
    case 'signup':
      $title = 'Đăng Ký';
      break;
    case 'forgotpass':
      $title = 'Quên Mật Khẩu';
      break;
    case 'dashboard':
    case 'bangdieukien':
      $title = 'Bảng Điều Khiển';
      break;
    case 'donhang':
      $title = 'Đơn Hàng';
      break;
    case 'phieugiamgia':
      $title = 'Phiếu Giảm Giá';
      break;
    case 'diachi':
      $title = 'Địa Chỉ';
      break;
    case 'chitiettaikhoan':
      $title = 'Tài Khoản';
      break;
    case 'CT':
      $title = 'Cây Trồng';
      break;
    case 'DC':
        $title = 'Dụng Cụ';
      break;
    case 'HH':
        $title = 'Học Hỏi';
      break;
    case 'QT':
        $title = 'Quà Tặng';
      break;
    case 'TQT':
      $title = 'Thẻ Quà Tặng';
      break;
    case 'about':
      $title = 'Về Chúng Tôi';
      break;
    case 'chitietdonhang':
      $title = 'Chi Tiết Đơn Hàng';
      break;
    case 'timkim':
      $title = 'Tìm Kiếm Sản Phẩm';
      break;
    default:
      $title = 'Lỗi 404';
      break;
  }
?>
<title><?php echo $title; ?></title>

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
            case 'forgotpass':
                include 'page/forgot_pass.php';
                break;
            case 'verification':
                include 'page/Verification.php';
                break;
            case 'Resetpass':
                include 'page/ResetPass.php';
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
                case 'chitietdonhang':
                    include 'page/chitietdonhang.php';
                    break;
            case 'CT':
                include 'page/Sanpham.php';
                break;
            case 'DC':
                include 'page/Sanpham.php';
                break;
            case 'HH':
                header('location:page/HocHoi.php');
                break;
            case 'QT':
                include 'page/Sanpham.php';
                break;
            case 'TQT':
                include 'page/giftcard.php';
                break;
            case 'about':
                include 'page/about.php';
                break;
            case 'timkim':
                include 'page/Timkiem.php';
                break;
            default:
                include 'page/error_page.php';
                break;
      }
?> 

  <?php include 'include/footer.php'; ?>
  

