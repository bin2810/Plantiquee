<?php
session_start();
if (isset($_POST['submit-checkout'])) {
    require_once('../include/database.php');

    $cart = $_SESSION['cart'] ?? [];

    $email_kh = $_POST['email_kh'];
    $name_kh = $_POST['name_kh'];
    $address_kh = $_POST['address_kh'] . "," . $_POST['city_kh'] . "," . $_POST['country_kh'];
    $sdt_kh = $_POST['sdt_kh'];
    $id_user = $_POST['id_user'];
    $total_price = 0;

    foreach ($cart as $item) {
        $total_price += $item['product_price'] * $item['quantity'];
    }

    // 1. Kiểm tra khách hàng đã có chưa (dựa vào Ma_user)
    $checkQuery = $conn->prepare("SELECT KhachHang_id FROM tb_khachhang WHERE Ma_user = :mauser");
    $checkQuery->bindParam(':mauser', $id_user);
    $checkQuery->execute();
    $existingKh = $checkQuery->fetch(PDO::FETCH_ASSOC);

    if ($existingKh) {
        // Đã có => dùng lại ID
        $kh_id = $existingKh['KhachHang_id'];
    } else {
        // Chưa có => thêm mới
        $insertQuery = $conn->prepare('
            INSERT INTO tb_khachhang (HoTen, Email, SĐT, DiaChi, Ma_user)
            VALUES (:namekh, :emailkh, :sdtkh, :diachikh, :mauser)
        ');
        $insertQuery->bindParam(':namekh', $name_kh);
        $insertQuery->bindParam(':emailkh', $email_kh);
        $insertQuery->bindParam(':sdtkh', $sdt_kh);
        $insertQuery->bindParam(':diachikh', $address_kh);
        $insertQuery->bindParam(':mauser', $id_user);
        $insertQuery->execute();

        $kh_id = $conn->lastInsertId(); // lấy id khách vừa thêm
    }


    // 2. Lưu đơn hàng 1 lần duy nhất
    $query = $conn->prepare('
        INSERT INTO tb_donhang (NgayTao, MaKhachHang)
        VALUES (NOW(), :Makh)
    ');
    $query->bindParam(':Makh', $kh_id);
    $query->execute();

    $donhang_id = $conn->lastInsertId();

    // 3. Lưu từng sản phẩm vào chi tiết đơn hàng
    foreach ($cart as $item) {
        $query = $conn->prepare('
            INSERT INTO tb_ctdonhang (SoLuong, DonGia, MADH, Masp)
            VALUES (:soluong, :dongia, :madh, :masp)
        ');
        $query->bindParam(':soluong', $item['quantity']);
        $query->bindParam(':dongia', $item['product_price']);
        $query->bindParam(':madh', $donhang_id);
        $query->bindParam(':masp', $item['product_id']);
        $query->execute();
    }

    unset($_SESSION['cart']);
    header("location: thankyou.php?madon=$donhang_id");
    exit();
}
?>
