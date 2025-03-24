<?php
session_start();
if (isset($_POST['update_sp'])) {
    include_once('../include/database.php'); 

    $id_update_sp = $_POST['id_update_sp'];
    $ten_sp_moi = $_POST['ten_sp'];
    $ten_kh = $_POST['ten_kh'];
    $ten_pb = $_POST['ten_pb'];
    $gia = $_POST['gia_sp'];
    $soluong_sp = $_POST['soluong_sp'];
    $tieu_de_sp = $_POST['tieu_de_sp'];
    $mota_sp = $_POST['mota_sp'];
    $trang_thai = $_POST['trangthai'];
    $nguoi_add = $_SESSION['user']['name'];
    $danhmuc_con = $_POST['danhmuc_con'];

    // Lấy tên sản phẩm cũ từ database
    $stmt_cu = $conn->prepare("SELECT TenSP FROM tb_sanpham WHERE SanPham_id = ?");
    $stmt_cu->execute([$id_update_sp]);
    $row_cu = $stmt_cu->fetch(PDO::FETCH_ASSOC);
    $ten_sp_cu = $row_cu['Ten_Khoa_hoc'];

    // Thư mục cũ & mới
    $thu_muc_cu = "../asset/img/sanpham/$danhmuc_con/$ten_sp_cu/";
    $thu_muc_moi = "../asset/img/sanpham/$danhmuc_con/$ten_kh/";

    // Nếu tên sản phẩm thay đổi thì di chuyển thư mục ảnh
    if ($ten_sp_cu !== $ten_sp_moi && file_exists($thu_muc_cu)) {
        rename($thu_muc_cu, $thu_muc_moi);
    }

    // Kiểm tra nếu có ảnh mới được tải lên
    $hinh_cu = $_POST['hinh_sp_cu'];
    $hinh_sp = $_FILES['hinh_sp_moi']['error'] == 0 ? $_FILES['hinh_sp_moi']['name'] : $hinh_cu;

    if ($hinh_sp != $hinh_cu) { 
        // Nếu có ảnh mới, tạo thư mục nếu chưa tồn tại
        if (!file_exists($thu_muc_moi)) {
            mkdir($thu_muc_moi, 0777, true);
        }

        // Xóa ảnh cũ nếu có ảnh mới
        if (file_exists($thu_muc_moi . $hinh_cu)) {
            unlink($thu_muc_moi . $hinh_cu);
        }

        // Upload ảnh mới
        move_uploaded_file($_FILES['hinh_sp_moi']['tmp_name'], $thu_muc_moi . $hinh_sp);
    }

    // Cập nhật dữ liệu vào database
    $query = "UPDATE tb_sanpham 
        SET TenSP = :TENSP, 
            Ten_Khoa_Hoc = :TENKH, 
            Ten_Pho_Bien = :TENPB, 
            Title_SP = :TIEUDE, 
            MoTa = :MOTA, 
            DonGia = :GIA, 
            SoLuong = :soluong, 
            TinhTrang = :TrangThai, 
            HinhAnh = :HINH, 
            Nguoi_add = :nguoiadd 
        WHERE SanPham_id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':TENSP', $ten_sp_moi);
    $stmt->bindParam(':TENKH', $ten_kh);
    $stmt->bindParam(':TENPB', $ten_pb);
    $stmt->bindParam(':TIEUDE', $tieu_de_sp);
    $stmt->bindParam(':MOTA', $mota_sp);
    $stmt->bindParam(':GIA', $gia);
    $stmt->bindParam(':soluong', $soluong_sp);
    $stmt->bindParam(':TrangThai', $trang_thai);
    $stmt->bindParam(':HINH', $hinh_sp);
    $stmt->bindParam(':nguoiadd', $nguoi_add);
    $stmt->bindParam(':id', $id_update_sp); 

    if ($stmt->execute()) {
        header('location: danhsach_sanpham.php');
        exit();
    } else {
        echo 'Cập nhật sản phẩm không thành công';
    }
}
?>
