<?php
function randomTenSanPham() {
  $tenCay = [
      'HN',
      'BN',
      'HV'
  ];
  
  return $tenCay[array_rand($tenCay)];
}

echo "Tên sản phẩm ngẫu nhiên: " . randomTenSanPham();

?>