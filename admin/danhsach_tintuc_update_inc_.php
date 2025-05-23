<?php
if(isset($_POST['capnhat_tt'])){
    include_once('../include/database.php');

    $id = $_POST['id_tintuc'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $upload_img = "../asset/img/tintuc/";

    if (!file_exists($upload_img)) {
        mkdir($upload_img, 0777, true);
    }

    $arr_hinh = [];

    // Ảnh cũ từ form
    $hinh_cu = $_POST['hinhcu']; // "img1.jpg,img2.jpg"
    if (!empty($hinh_cu)) {
        $arr_hinh = explode(',', $hinh_cu); // giữ ảnh cũ
    }

    // Xử lý ảnh mới nếu có
    foreach ($_FILES['hinh_sp']['name'] as $key => $name) {
        if ($_FILES['hinh_sp']['error'][$key] == 0) {
            $tmp_name = $_FILES['hinh_sp']['tmp_name'][$key];
            $target_file = $upload_img . basename($name);
            if (move_uploaded_file($tmp_name, $target_file)) {
                $arr_hinh[] = $name; // thêm ảnh mới
            }
        }
    }

    // Gộp lại thành chuỗi để lưu
    $hinh_sp = implode(',', $arr_hinh);

    $query = 'UPDATE tb_tintuc 
              SET Tieu_De = :TIEUDE, 
                  Noi_Dung = :NOIDUNG, 
                  Hinh_Anh = :HINH, 
                  Ngay_add = NOW()
              WHERE Tintuc_id = :ID';

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':TIEUDE', $tieude);
    $stmt->bindParam(':NOIDUNG', $noidung);
    $stmt->bindParam(':HINH', $hinh_sp);
    $stmt->bindParam(':ID', $id);

    if ($stmt->execute()) {
        header('location: danhsach_tintuc.php');
        exit();
    } else {
        echo 'Cập nhật tin tức không thành công';
    }
}
?>
