<?php
include_once '../include/database.php'; 
$dh_id = $_POST['dh_id'] ?? 0;

$sql_dh = "SELECT * FROM tb_donhang WHERE DonHang_id = :dh_id";
$sta_dh = $conn->prepare($sql_dh);
$sta_dh->bindParam(':dh_id', $dh_id);
$sta_dh->execute();
$donhang = $sta_dh->fetch(PDO::FETCH_ASSOC);

// lấy thông tin khách hàng 
$sql_kh = "SELECT * FROM tb_khachhang WHERE KhachHang_id = :kh_id";
$sta_kh = $conn->prepare($sql_kh);
$sta_kh->bindParam(':kh_id', $donhang['MaKhachHang']);
$sta_kh->execute();
$khachhang = $sta_kh->fetch(PDO::FETCH_ASSOC);



$sql_ct = "SELECT ctdh.SoLuong, ctdh.DonGia, sp.TenSP 
    FROM tb_ctdonhang ctdh 
    JOIN tb_sanpham sp ON ctdh.MASP = sp.SanPham_id
    WHERE ctdh.MaDH = :dh_id";
$sta_ct = $conn->prepare($sql_ct);
$sta_ct->bindParam(':dh_id', $dh_id);
$sta_ct->execute();
$ct_list = $sta_ct->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../asset/img/logo-tab.png" />
    <title>Hóa đơn đơn hàng #<?= $dh_id ?></title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        td, th { border: 1px solid #333; padding: 8px; text-align: left; }
        .tieude_xhd{ display: flex; justify-content: space-between;  }
        .tieude_xhd button{ padding: 5px 20px; background-color: green; color: white;}
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<script>
    function printInvoice() {
        window.print();
    }
</script>
    <div class="tieude_xhd">
        <h2>HÓA ĐƠN BÁN HÀNG</h2>
        <form onsubmit="printInvoice(); return false;">
            <button class="no-print" type="submit">Xuất</button>
        </form>
    </div>
    
    <p><strong>Mã đơn hàng:</strong> <?= $donhang['DonHang_id'] ?></p>
    <p><strong>Ngày tạo:</strong> <?= date("d/m/Y H:i:s", strtotime($donhang['NgayTao'])) ?></p>
    <p><strong>Tên khách hàng:</strong> <?= $khachhang['HoTen'] ?></p>
    <p><strong>Số điện thoại:</strong> <?= $khachhang['SĐT'] ?></p>
    <p><strong>Địa chỉ giao hàng:</strong> <?= $khachhang['DiaChi'] ?></p>

    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php $tong = 0; 
            foreach ($ct_list as $item): 
                $thanhtien = $item->SoLuong * $item->DonGia;
                $tong += $thanhtien;
            ?>
            <tr>
                <td><?= $item->TenSP ?></td>
                <td><?= $item->SoLuong ?></td>
                <td><?= number_format($item->DonGia) ?>đ</td>
                <td><?= number_format($thanhtien) ?>đ</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3 style="text-align:right;">Tổng cộng: <?= number_format($tong) ?>đ</h3>

    <script>
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>
