<?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    include_once('../include/database.php');

    // Kiểm tra sản phẩm có đang được sử dụng ở nơi khác không
    $stmt_check = $conn->prepare("SELECT COUNT(*) FROM tb_ctdonhang WHERE MASP = :id");
    $stmt_check->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt_check->execute();
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        echo "Không thể xoá sản phẩm vì đang được sử dụng.";
        exit();
    }

    // Tiếp tục xoá nếu không bị ràng buộc
    $stmt_cu = $conn->prepare("SELECT Ten_Khoa_Hoc, MA_DM_con, HinhAnh FROM tb_sanpham WHERE SanPham_id = :id");
    $stmt_cu->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt_cu->execute();
    $row_cu = $stmt_cu->fetch(PDO::FETCH_ASSOC);

    if ($row_cu) {
        $ten_kh = $row_cu['Ten_Khoa_Hoc'];
        $danhmuc_con = $row_cu['MA_DM_Con'];
        $hinh_anh = $row_cu['HinhAnh'];
        $thu_muc_anh = "../asset/img/sanpham/$danhmuc_con/$ten_kh/";

        $duong_dan_anh = $thu_muc_anh . $hinh_anh;
        if (file_exists($duong_dan_anh)) {
            unlink($duong_dan_anh);
        }

        if (is_dir($thu_muc_anh) && count(scandir($thu_muc_anh)) == 2) {
            rmdir($thu_muc_anh);
        }
    }

    $query = 'DELETE FROM tb_sanpham WHERE SanPham_id = :id';
    $delete_user = $conn->prepare($query);
    $delete_user->bindParam(':id', $userId, PDO::PARAM_INT);
    $delete_user->execute();

    if ($delete_user) {
        header('Location: danhsach_sanpham.php');
        exit();
    } else {
        echo 'XOÁ KHÔNG THÀNH CÔNG';
    }
}
?>
