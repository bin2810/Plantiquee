<?php
    $dh_id = $_GET['id'];

    // Lấy thông tin đơn hàng
    $sql_dh = "SELECT * FROM tb_donhang WHERE DonHang_id = :dh_id";
    $sta_dh = $conn->prepare($sql_dh);
    $sta_dh->bindParam(':dh_id', $dh_id);
    $sta_dh->execute();
    $donhang = $sta_dh->fetch(PDO::FETCH_ASSOC);

    // Lấy chi tiết đơn hàng + sản phẩm
    $sql_ct = "SELECT ctdh.SoLuong, 
        ctdh.DonGia, 
        ctdh.MADH, 
        ctdh.MASP,
        sp.TenSP, sp.HinhAnh, sp.MA_DM_con, sp.Ten_Khoa_Hoc
    FROM tb_ctdonhang ctdh, tb_sanpham sp 
    WHERE ctdh.MASP = sp.SanPham_id 
      AND ctdh.MaDH = :dh_id
";

    $sta_ct = $conn->prepare($sql_ct);
    $sta_ct->bindParam(':dh_id', $dh_id);
    $sta_ct->execute();
    $ct_list = $sta_ct->fetchAll(PDO::FETCH_OBJ);
?>
<main>
    <div class="container-center">
        <div class="order-detail-container">
    
            <div style="margin-top: 20px; display:flex;justify-content: space-between;">
                <h2>Chi tiết đơn hàng   #<?= $donhang['DonHang_id'] ?></h2>
                <form action="page/xuat_hoadon.php" method="post" target="_blank">
                    <input type="hidden" name="dh_id" value="<?= $donhang['DonHang_id'] ?>">
                    <button type="submit" class="btn btn-primary" style="background-color: var(--green-color); color:white;padding:8px;cursor: pointer;">Xuất hóa đơn</button>
                </form>
            </div>
            <p><strong>Ngày tạo:</strong> <?= date("d/m/Y H:i:s", strtotime($donhang['NgayTao'])); ?></p>
            <p><strong>Trạng thái:</strong> <?= $donhang['TrangThai'] ?? "Đang xử lý" ?></p>

            <div class="product-list-dashboard">
            <?php 
            $tong = 0; 
            foreach ($ct_list as $sp): 
                $thanhtien = $sp->SoLuong * $sp->DonGia;
                $tong += $thanhtien;
            ?>
            <a style="text-decoration: none;" href="page/Sanpham_CT.php?id=<?=$sp ->MASP?>">
                <div class="product-card">
                    <img src="asset/img/sanpham/<?= $sp->MA_DM_con?>/<?=$sp->Ten_Khoa_Hoc?>/<?=$sp->HinhAnh?>" alt="<?= $sp->TenSP ?>">
                    <div class="product-info">
                        <h3><?= $sp->TenSP ?></h3>
                        <p>Số lượng: <?= $sp->SoLuong ?></p>
                        <p>Đơn giá: <?= number_format($sp->DonGia) ?>đ</p>
                        <p><strong>Thành tiền: <?= number_format($thanhtien) ?>đ</strong></p>
                    </div>
                </div>
            </a>    
            <?php endforeach; ?>
        </div>
        <div class="total-section">
        <strong>Tổng cộng: <?= number_format($tong) ?>đ</strong>
        </div>
    </div>

    
    
</div>
</main>