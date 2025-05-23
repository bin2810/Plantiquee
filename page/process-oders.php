<?php
ob_start();
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

    // 1. Kiểm tra khách hàng đã có chưa (dựa vào HoTenkh)
    $checkQuery = $conn->prepare("SELECT KhachHang_id,HoTen FROM tb_khachhang WHERE HoTen = :HoTen");
    $checkQuery->bindParam(':HoTen', $name_kh);
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


        // 4. Gửi email xác nhận đơn hàng
        require_once('../mail/index.php'); 
        $mail = new Mailer();
        $title = "Xác nhận đơn hàng thành công - Plantiquee";
    
        $productList = '';
        foreach ($cart as $item) {
            $productList .= '
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">' . $item['product_name'] . '</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">' . $item['quantity'] . '</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">' . number_format($item['product_price'], 0, ',', '.') . 'đ</td>
                </tr>
            ';
        }
    
        $content = '
        <div style="max-width: 600px; margin: auto; font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
            <h2 style="color: #2b8a3e; text-align: center;">🛒 Đơn hàng #' . $donhang_id . ' đã được xác nhận!</h2>
            <p>Xin chào <strong>' . $name_kh . '</strong>,</p>
            <p>Chúng tôi đã nhận được đơn hàng của bạn và sẽ xử lý sớm nhất.</p>
    
            <h3>📦 Chi tiết đơn hàng:</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="padding: 8px; border: 1px solid #ddd;">Sản phẩm</th>
                        <th style="padding: 8px; border: 1px solid #ddd;">Số lượng</th>
                        <th style="padding: 8px; border: 1px solid #ddd;">Giá</th>
                    </tr>
                </thead>
                <tbody>
                    ' . $productList . '
                </tbody>
            </table>
    
            <p style="margin-top: 15px;"><strong>Tổng tiền:</strong> ' . number_format($total_price, 0, ',', '.') . 'đ</p>
    
            <h3>🏠 Thông tin giao hàng:</h3>
            <p>
                ' . nl2br($address_kh) . '<br>
                SĐT: ' . $sdt_kh . '
            </p>
    
            <hr style="margin: 20px 0;">
            <p style="font-size: 13px; color: #777;">Nếu bạn có bất kỳ câu hỏi nào, hãy phản hồi email này hoặc liên hệ với chúng tôi qua website.</p>
            <p style="font-size: 13px; color: #777;">Trân trọng,<br>Đội ngũ Plantiquee</p>
        </div>';
    
        $mail->sendMail($title, $content, $email_kh);
    


    unset($_SESSION['cart']);
    header("location: thankyou.php?madon=$donhang_id");
    exit();
}
?>
