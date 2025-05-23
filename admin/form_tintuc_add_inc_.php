<?php
if(isset($_POST['them_tt'])){
    include_once('../include/database.php');
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $upload_img = "../asset/img/tintuc/";

    if (!file_exists($upload_img)) {
        mkdir($upload_img, 0777, true);
    }

    // Mảng lưu tên ảnh đã upload
    $arr_hinh = [];

    foreach ($_FILES['hinh_sp']['name'] as $key => $name) {
        if ($_FILES['hinh_sp']['error'][$key] == 0) {
            $tmp_name = $_FILES['hinh_sp']['tmp_name'][$key];
            $target_file = $upload_img . basename($name);

            if (move_uploaded_file($tmp_name, $target_file)) {
                $arr_hinh[] = $name; // Lưu tên file
            }
        }
    }

    // Gộp tên ảnh thành chuỗi (ngăn cách bằng dấu phẩy)
    $danh_sach_anh = implode(',', $arr_hinh);

    if (empty($danh_sach_anh)) {
        $danh_sach_anh = "no_image.png";
    }

    $query = 'INSERT INTO tb_tintuc(Tieu_De, Noi_Dung, Hinh_Anh, Ngay_add) 
              VALUES (:TIEUDE, :NOIDUNG, :HINH, NOW())';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':TIEUDE', $tieude);
    $stmt->bindParam(':NOIDUNG', $noidung);
    $stmt->bindParam(':HINH', $danh_sach_anh);

    if ($stmt->execute()) {
        header('location: form_tintuc_add.php');
        exit();
    } else {
        echo 'Thêm tin tức không thành công';
    }
}
?>
