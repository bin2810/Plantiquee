




<!-- 



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




 -->