<?php 


include_once('include/header.php');
?>
<main>

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
            case 'QTDN':
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
</main>  
  <?php include 'include/footer.php'; ?>
  

