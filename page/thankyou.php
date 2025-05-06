<?php
    $madh = $_GET['madon'] ?? null;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link rel="stylesheet" href="../asset/css/bass.css">
    <link rel="stylesheet" href="../asset/css/thankyou.css">
    <link rel="icon" type="image/png" href="../asset/img/logo-tab.png" />
</head>
<body>

<div class="container">
    <h1>🌿 Cảm ơn bạn đã đặt hàng!</h1>
    <p>Đơn hàng của bạn đã được xác nhận thành công.<br>
    Mã đơn hàng của bạn là:<br>
    <span class="order-id">#<?=$madh?></span></p>

    <div class="btn-group">
        <a href="../index.php?act=chitietdonhang&id=<?=$madh?>" class="btn btn-detail">📄 Xem chi tiết đơn hàng</a>
        <a href="../index.php" class="btn btn-shop">Tiếp tục mua sắm</a>
    </div>
</div>

</body>
</html>
