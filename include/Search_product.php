<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include('../include/database.php');

    $searchTerm = isset($_POST['txt_search']) ? $_POST['txt_search'] : '';

    if ($searchTerm != '') {
        $query = "SELECT * FROM tb_sanpham WHERE TenSP LIKE :searchTerm";
        $stmt = $conn->prepare($query);
        $stmt->execute(['searchTerm' => '%' . $searchTerm . '%']);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($products) > 0) {
            // Lưu kết quả vào session hoặc truyền qua GET
            session_start();
            $_SESSION['search_results'] = $products;
            header("Location: ../index.php?act=timkim&query=" . urlencode($searchTerm));

            exit;
        } else {
            header("Location: ../index.php?act=khong_tim_thay");
            exit;
        }
    }
}
