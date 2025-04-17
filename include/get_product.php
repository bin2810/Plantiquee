<?php
if (isset($_GET['act'])) {
    $madanhmuc = $_GET['act'];
    $loc = isset($_GET['loc']) ? $_GET['loc'] : '';
    include_once('include/database.php');

    // Lấy danh mục cha
    $titledm = 'SELECT * FROM tb_danhmuc_chinh WHERE MADM_cha = ?';
    $stmt1 = $conn->prepare($titledm);
    $stmt1->execute([$madanhmuc]);
    $danhmuc = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    // Lấy tất cả danh mục con thuộc danh mục cha
    $query_dmcon = 'SELECT MADM_con, TENDM_con FROM tb_danhmuc_con WHERE MA_DM_cha = ?';
    $stmt2 = $conn->prepare($query_dmcon);
    $stmt2->execute([$madanhmuc]);
    $dmcon_list = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    // Kiểm tra và áp dụng lọc nếu có giá trị loc
    if (!empty($dmcon_list)) {
        // Lọc theo MADM_con nếu tham số loc có giá trị
        $dmcon_id = array_column($dmcon_list, 'MADM_con');
        $mang = implode(',', array_fill(0, count($dmcon_id), '?'));

        // Truy vấn sản phẩm có sắp xếp hoặc lọc theo MADM_con (loc)
        $query_sanpham = "SELECT * FROM tb_sanpham WHERE MA_DM_con IN ($mang)";
        
        if ($loc) { // Nếu có tham số $loc, thì  lọc thêm theo MADM_con
            $query_sanpham .= " AND MA_DM_con = ?";
        }

        $stmt3 = $conn->prepare($query_sanpham);

        // Nếu lọc theo $loc, gán giá trị $loc vào tham số
        if ($loc) {
            $stmt3->execute(array_merge($dmcon_id, [$loc]));
        } else { // và ngược lại
            $stmt3->execute($dmcon_id);
        }

        $product = $stmt3->fetchAll(PDO::FETCH_ASSOC);




        // Phân trang
        $sl_page = 6;
        $tong_product = count($product);
        $tong_page = ceil($tong_product / $sl_page);
        $page_show = min($tong_page, max(1, isset($_GET['page']) ? $_GET['page'] : 1));
        $vtbd = ($page_show - 1) * $sl_page;

        // Cập nhật truy vấn phân trang
        $query_sanpham .= " LIMIT $vtbd, $sl_page";
        $stmt3 = $conn->prepare($query_sanpham);
        if ($loc) {
            $stmt3->execute(array_merge($dmcon_id, [$loc]));
        } else {
            $stmt3->execute($dmcon_id);
        }
        $product = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $product = [];
    }
}
?>
