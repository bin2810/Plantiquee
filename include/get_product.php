<?php
if (isset($_GET['act'])) {
    $madanhmuc = $_GET['act'];
    $loc = isset($_GET['loc']) ? $_GET['loc'] : '';
    include_once('include/database.php');

    // Truy vấn danh mục con 
    $query_loaisp = 'SELECT * FROM tb_danhmuc_con WHERE MA_DM_cha = ?';
    $stmt_loaisp = $conn->prepare($query_loaisp);
    $stmt_loaisp->execute([$madanhmuc]); 
    $loaisp = $stmt_loaisp->fetchAll(PDO::FETCH_ASSOC);


    
    // Truy vấn sản phẩm với lọc và phân trang
    $sl_page = 6;
    $page_show = isset($_GET['page']) ? $_GET['page'] : 1;
    $page_show = max(1, $page_show); // Đảm bảo page_show luôn >= 1
    $vtbd = ($page_show - 1) * $sl_page; // Vị trí bắt đầu phân trang

    // Truy vấn sản phẩm với phân trang và lọc
    $query_product = 'SELECT sp.*, dmccha.*, dmc.* 
                      FROM tb_sanpham sp
                      JOIN tb_danhmuc_con dmc ON sp.MA_DM_con = dmc.MADM_con
                      JOIN tb_danhmuc_chinh dmccha ON dmc.MA_DM_cha = dmccha.MADM_cha
                      WHERE dmccha.MADM_cha = ?';

    // Lọc theo $loc nếu có
    if ($loc) { 
        $query_product .= ' AND sp.MA_DM_con = ?';
    }

    // Thực thi truy vấn để lấy số lượng sản phẩm
    $stmt1 = $conn->prepare($query_product);
    if ($loc) {
        $stmt1->execute([$madanhmuc, $loc]);
    } else { 
        $stmt1->execute([$madanhmuc]);
    }
    $product = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    // Tính tổng số sản phẩm và số trang
    $tong_product = count($product);
    $tong_page = ceil($tong_product / $sl_page);

    // Cập nhật truy vấn với LIMIT cho phân trang
    $query_product .= " LIMIT $vtbd, $sl_page";
    $stmt1 = $conn->prepare($query_product);
    
    // Thực thi truy vấn với phân trang
    if ($loc) {
        $stmt1->execute([$madanhmuc, $loc]);
    } else {
        $stmt1->execute([$madanhmuc]);
    }

    // Lấy sản phẩm trong trang hiện tại
    $product = $stmt1->fetchAll(PDO::FETCH_ASSOC);
}
?>
