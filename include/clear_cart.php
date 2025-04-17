<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Xóa sản phẩm nếu tồn tại trong session
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }

    // Cập nhật lại tổng số lượng
    $_SESSION['cart_quantity'] = array_sum(array_column($_SESSION['cart'], 'quantity'));
}

header('Location: ../index.php');
exit();
