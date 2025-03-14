<?php
session_start();
if(isset($_POST['sub_themsp'])){
    include_once('../include/database.php');

    $ten_mau = [];
    $ma_mau = [];
    if(isset($_POST['check_mau'])){
      foreach($_POST['check_mau'] as $mau){
          list($ten, $ma) = explode('|', $mau);
          $ten_mau[] = $ten;
          $ma_mau[] = $ma;
      }
    }

    $ten_sp = $_POST['ten_sp'];
    $ten_kh = $_POST['ten_kh'];
    $ten_pb = $_POST['ten_pb'];
    $gia_sp = $_POST['gia_sp'];
    $soluong_sp = $_POST['soluong_sp'];
    $tieu_de_sp = $_POST['tieu_de_sp'];
    $mota_sp = $_POST['mota_sp'];
    $nguoi_add = $_SESSION['user']['name'];
    $danhmuc_con = $_POST['danhmuc_con'];

    $arr_ten_mau = implode(',', $ten_mau);
    $arr_ma_mau = implode(',', $ma_mau);

    $upload_img = "../asset/img/sanpham/$danhmuc_con/$ten_sp/";
    
    // Kiểm tra nếu thư mục chưa tồn tại thì tạo mới
    if (!file_exists($upload_img)) {
        mkdir($upload_img, 0777, true);
    }

    $hinh_sp_arr = [];
    
    foreach ($_FILES['hinh_sp']['name'] as $key => $file_name) {
        $tmp_name = $_FILES['hinh_sp']['tmp_name'][$key];
        $file_path = $upload_img . $file_name;

        if (move_uploaded_file($tmp_name, $file_path)) {
            $hinh_sp_arr[] = $file_name; 
        }
    }

    $hinh_sp = implode('|', $hinh_sp_arr); 
   
    $query = 'INSERT INTO tb_sanpham (TenSP, Ten_Khoa_Hoc, Ten_Pho_Bien, Title_SP, MoTa, Ten_Mau_Sac, Ma_Mau_Sac, DonGia, SoLuong, HinhAnh, NgayTao, Nguoi_add, MA_DM_con) 
              VALUES (:TENSP, :TENKH, :TENPB, :TIEUDE, :MOTA, :TENMAU, :MAMAU, :GIA, :soluong, :HINH, NOW(), :nguoiadd, :MADM_con)';
    
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':TENSP', $ten_sp);
    $stmt->bindParam(':TENKH', $ten_kh);
    $stmt->bindParam(':TENPB', $ten_pb);
    $stmt->bindParam(':TIEUDE', $tieu_de_sp);
    $stmt->bindParam(':MOTA', $mota_sp);
    $stmt->bindParam(':TENMAU', $arr_ten_mau);
    $stmt->bindParam(':MAMAU', $arr_ma_mau);
    $stmt->bindParam(':GIA', $gia_sp);
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
