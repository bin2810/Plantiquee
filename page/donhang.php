
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
                    <div class="donhang">
                        <?php
                            $id_user = $_SESSION['user']['id'];

                            // Lấy KhachHang_id từ Ma_user
                            $sql_kh = "SELECT KhachHang_id FROM tb_khachhang WHERE Ma_user = :id_user";
                            $sta_kh = $conn->prepare($sql_kh);
                            $sta_kh->bindParam(':id_user', $id_user);
                            $sta_kh->execute();
                            $khachhang = $sta_kh->fetch(PDO::FETCH_ASSOC);

                            if ($khachhang) {
                                $kh_id = $khachhang['KhachHang_id'];

                                // Lấy đơn hàng của khách
                                $sql_dh = "SELECT * FROM tb_donhang WHERE MaKhachHang = :kh_id";
                                $sta_dh = $conn->prepare($sql_dh);
                                $sta_dh->bindParam(':kh_id', $kh_id);
                                $sta_dh->execute();
                                $dh_list = $sta_dh->fetchAll(PDO::FETCH_OBJ);
                                // Hiển thị ngày tạo các đơn hàng
                                echo '<div class="order-grid">';
                                    foreach ($dh_list as $dh) {
                                        echo '
                                            <div class="order-card">
                                                <div class="order-card-header">
                                                    <span class="order-id">Đơn hàng #' . $dh->DonHang_id . '</span>
                                                    <span class="order-date">' .date("d/m/Y H:i:s", strtotime($dh->NgayTao)) . '</span>
                                                </div>
                                                <div class="order-card-body">
                                                    <p><strong>Trạng thái:</strong> Đang xử lý</p>
                                                    <a href="index.php?act=chitietdonhang&id=' . $dh->DonHang_id . '" class="order-detail-btn">Xem chi tiết</a>
                                                </div>
                                            </div>
                                        ';
                                    }
                                    echo '</div>';

                            } else {
                                echo '<p><a href="">Đi đến đơn hàng</a> Bạn chưa có đơn nào thực hiện</p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</main>










