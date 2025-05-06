<?php
// session_start();
if(isset($_POST['them_tt'])){
    include_once('../include/database.php');
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    // var_dump($tieude,$noidung);
    $upload_img = "../asset/img/tintuc/";

    // Kiểm tra nếu thư mục chưa tồn tại thì tạo mới
    if (!file_exists($upload_img)) {
        mkdir($upload_img, 0777, true);
    }

    // Kiểm tra và xử lý hình ảnh theo kiểu cô bạn muốn
    $hinh_sp = ($_FILES['hinh_sp']['error'] == 0) ? $_FILES['hinh_sp']['name'] : "";
    
    if($hinh_sp != "") {
        move_uploaded_file($_FILES['hinh_sp']['tmp_name'], $upload_img . $hinh_sp);
    } else {
        $hinh_sp = "no_image.png"; 
    }

    $query = 'INSERT INTO tb_tintuc(Tieu_De, Noi_Dung, Hinh_Anh, Ngay_add) 
              VALUES (:TIEUDE, :NOIDUNG, :HINH, NOW())';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':TIEUDE', $tieude);
    $stmt->bindParam(':NOIDUNG', $noidung);
    $stmt->bindParam(':HINH', $hinh_sp);

    if ($stmt->execute()) {
        header('location: form_tintuc_add.php');
        exit();
    } else {
        echo 'Thêm tin tức không thành công';
    }
}
?>
