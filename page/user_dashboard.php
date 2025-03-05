<?php
  include_once('../include/header_user.php')
?>
<main>
        <div class="container-full bg-dashboard">
            <div class="container-center dashboard">
                <div class="menu-navigation-bar">
                    <ul class="menu-navigation-list">
                        <li class="menu-navigation-item"><a href="user_dashboard.php?act=bangdieukien">Bảng Điều Khiển</a><i class="fa-solid fa-gauge"></i></li>
                        <li class="menu-navigation-item"><a href="user_dashboard.php?act=donhang">Đơn Hàng</a><i class="fa-solid fa-basket-shopping"></i></li>
                        <li class="menu-navigation-item"><a href="user_dashboard.php?act=phieugiamgia">Phiếu Giảm Giá</a><i class="fa-solid fa-ticket"></i></li>
                        <li class="menu-navigation-item"><a href="user_dashboard.php?act=diachi">Địa chỉ</a><i class="fa-solid fa-house"></i></li>
                        <li class="menu-navigation-item"><a href="user_dashboard.php?act=chitiettaikhoan">Chi Tiết Tài Khoản</a><i class="fa-solid fa-user"></i></li>
                        <li class="menu-navigation-item"><a href="logout.php">Đăng Xuất</a><i class="fa-solid fa-right-from-bracket"></i></li>
                    </ul>
                </div>
                <div class="dashboard-content">
                <?php
                    //  admin-dashboard.php
                    
                        $page = isset($_GET['act']) ? $_GET['act'] : 'bangdieukien'; 
                    
                        switch ($page) {
                            case 'bangdieukien':
                                include 'bangdieukien.php';
                                break;
                            case 'donhang':
                                include 'donhang.php';
                                break;
                            case 'phieugiamgia':
                                include 'phieugiamgia.php';
                                break;
                            case 'diachi':
                                include 'diachi.php';
                                break;
                            case 'chitiettaikhoan':
                                include 'chitiettaikhoan.php';
                                break;
                            default:
                                include 'bangdieukien.php';
                                break;
                        }
                ?> 
                </div>
                
            </div>
        </div>
</main>

<?php
  include_once('../include/footer_user.php')
?>