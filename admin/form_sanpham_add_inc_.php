<?php
session_start();
if(isset($_POST['sub_themsp'])){
    include_once('../include/database.php');
    $ten_sp = $_POST['ten_sp'];
    $ten_kh = $_POST['ten_kh'];
    $ten_pb = $_POST['ten_pb'];
    $gia = $_POST['gia_sp'];
    $soluong_sp = $_POST['soluong_sp'];
    $tieu_de_sp = $_POST['tieu_de_sp'];
    $mota_sp = $_POST['mota_sp'];
    $nguoi_add = $_SESSION['user']['name'];
    $danhmuc_con = $_POST['danhmuc_con'];
    $upload_img = "../asset/img/sanpham/$danhmuc_con/$ten_kh/";

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

    $query = 'INSERT INTO tb_sanpham (TenSP, Ten_Khoa_Hoc, Ten_Pho_Bien, Title_SP, MoTa , DonGia, SoLuong, HinhAnh, NgayTao, Nguoi_add, MA_DM_con) 
              VALUES (:TENSP, :TENKH, :TENPB, :TIEUDE, :MOTA, :GIA, :soluong, :HINH, NOW(), :nguoiadd, :MADM_con)';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':TENSP', $ten_sp);
    $stmt->bindParam(':TENKH', $ten_kh);
    $stmt->bindParam(':TENPB', $ten_pb);
    $stmt->bindParam(':TIEUDE', $tieu_de_sp);
    $stmt->bindParam(':MOTA', $mota_sp);
    $stmt->bindParam(':GIA', $gia);
    $stmt->bindParam(':soluong', $soluong_sp);
    $stmt->bindParam(':HINH', $hinh_sp);
    $stmt->bindParam(':nguoiadd', $nguoi_add);
    $stmt->bindParam(':MADM_con', $danhmuc_con);

    if ($stmt->execute()) {
        header('location: form_sanpham_add.php');
        exit();
    } else {
        echo 'Thêm sản phẩm không thành công';
    }
}
?>
