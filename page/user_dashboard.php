
<main>
<?php
if (!isset($_SESSION['user']['Username'])) {
    // Nếu chưa đăng nhập, chuyển về trang login
    header("Location: index.php?act=login");
    exit();
}
?>
        <div class="container-full bg-dashboard">
            <div class="container-center dashboard">
                <div class="menu-navigation-bar">
                    <ul class="menu-navigation-list">
                        <li class="menu-navigation-item"><a href="index.php?act=bangdieukien">Bảng Điều Khiển</a><i class="fa-solid fa-gauge"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=donhang">Đơn Hàng</a><i class="fa-solid fa-basket-shopping"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=phieugiamgia">Phiếu Giảm Giá</a><i class="fa-solid fa-ticket"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=diachi">Địa chỉ</a><i class="fa-solid fa-house"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=chitiettaikhoan">Chi Tiết Tài Khoản</a><i class="fa-solid fa-user"></i></li>
                        <li class="menu-navigation-item"><a href="page/logout.php">Đăng Xuất</a><i class="fa-solid fa-right-from-bracket"></i></li>
                    </ul>
                </div>
                <div class="dashboard-content">
                
                    <div class="bangdieukhien">
                            <?php
                                if(isset($_SESSION['user']['name'])){
                            ?>
                                <p>Xin chào <?=$_SESSION['user']['name']?></p>
                            <?php    
                                }
                            ?>
                        </div>
            </div>
        </div>
</main>

