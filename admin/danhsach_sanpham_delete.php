<?php
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    include_once('../include/database.php');

    $stmt_cu = $conn->prepare("SELECT Ten_Khoa_Hoc, MA_DM_con, HinhAnh FROM tb_sanpham WHERE SanPham_id = :id");
    $stmt_cu->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt_cu->execute();
    $row_cu = $stmt_cu->fetch(PDO::FETCH_ASSOC);

    if ($row_cu) {
        $ten_kh = $row_cu['Ten_Khoa_Hoc'];
        $danhmuc_con = $row_cu['MA_DM_Con'];
        $hinh_anh = $row_cu['HinhAnh']; // Tên file ảnh
        $thu_muc_anh = "../asset/img/sanpham/$danhmuc_con/$ten_kh/";

        // Kiểm tra và xoá ảnh nếu tồn tại
        $duong_dan_anh = $thu_muc_anh . $hinh_anh;
        if (file_exists($duong_dan_anh)) {
            unlink($duong_dan_anh);
        }

        // Kiểm tra nếu thư mục trống thì xoá luôn
        // is_dir hàm này đùng để kiểm tra cái này có phải thư mục hay không 
        // scandir hàm này Lấy tất cả trong thư mục con bên trong $thu_muc_anh.
        // ==2 là vì trong lưu đường dẫn . chấm là thư mục hiện tại .. là thư mục cha và còn cái cuối là file ảnh nếu kiểm qua trong đó có "." ".." thì có thể xoá
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
