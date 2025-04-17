<?php
session_start();

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập thì chuyển về trang login
    header("Location: ../index.php?act=login");
    exit;
}


if (empty($_SESSION['cart'])) {
  echo "<h2>Giỏ hàng trống!</h2>";
  exit;
}

$total_price = 0;
?>

<h2>Chi tiết đơn hàng</h2>
<table>
  <tr>
    <th>Sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
  </tr>

  <?php foreach ($_SESSION['cart'] as $item): ?>
    <?php
      $subtotal = $item['product_price'] * $item['quantity'];
      $total_price += $subtotal;
    ?>
    <tr>
      <td><?= $item['product_name'] ?></td>
      <td><?= number_format($item['product_price'], 0, ',', '.') ?>đ</td>
      <td><?= $item['quantity'] ?></td>
      <td><?= number_format($subtotal, 0, ',', '.') ?>đ</td>
    </tr>
  <?php endforeach; ?>
</table>

<p><strong>Tổng cộng: <?= number_format($total_price, 0, ',', '.') ?>đ</strong></p>




