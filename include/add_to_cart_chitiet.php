<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $product_img = $_POST['product_img'];
        $product_prive = $_POST['product_prive'];
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'] ?? 1;
        $ma_dm_con = $_POST['product_MA_DM_con'];


        if (isset($_SESSION['cart'][$product_id])) {
            // Nếu sản phẩm đã có trong giỏ, tăng số lượng
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_img' => $product_img,
                'product_price' => $product_prive,
                'quantity' => $quantity
            ];
        }
        if($ma_dm_con == "BCN"){
            header('location: ../index.php?act=CT');
            exit();
        }elseif($ma_dm_con == "HMV"){
            header('location: ../index.php?act=CT&loc=HMV');
            exit();
        }elseif($ma_dm_con == "QTGD"){
            header('location: ../index.php?act=QT');
            exit();
        }elseif($ma_dm_con == "CC"){
            header('location: ../index.php?act=DC');
            exit();
        }elseif($product_id == $product_id){
            header('Location: ../page/Sanpham_CT.php?id=' . $product_id);
            exit();
        }else{
            header('location: .../page/error_page.php');
            exit();
        }
    }else {
        echo "Thiếu dữ liệu";
    }
} else {
    echo "Không phải POST request.";
}
?>
