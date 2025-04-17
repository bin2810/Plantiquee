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
                
                $product = $products[0]; 
                header("Location: ../page/Sanpham_CT.php?id=" . $product['SanPham_id']);
                exit;
            } else {
                echo "Không tìm thấy sản phẩm.";
            }
        }
    }
?>
