<?php
if(isset($_GET['act'])){
    $madanhmuc = $_GET['act'];
    include_once('include/database.php');

    // Lấy danh mục cha
    $titledm = 'SELECT * FROM tb_danhmuc_chinh WHERE MADM_cha = ?';
    $stmt1 = $conn->prepare($titledm);
    $stmt1->execute([$madanhmuc]);
    $danhmuc = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    // Lấy tất cả danh mục con thuộc danh mục cha
    $query_dmcon = 'SELECT MADM_con FROM tb_danhmuc_con WHERE MA_DM_cha = ?';
    $stmt2 = $conn->prepare($query_dmcon);
    $stmt2->execute([$madanhmuc]);
    $dmcon_list = $stmt2->fetchAll(PDO::FETCH_COLUMN);

    if (!empty($dmcon_list)) {
        $mang = implode(',', array_fill(0, count($dmcon_list), '?'));
        $query_sanpham = "SELECT * FROM tb_sanpham WHERE MA_DM_con IN ($mang)";
        $stmt3 = $conn->prepare($query_sanpham);
        $stmt3->execute($dmcon_list);
        $product = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        

        // phân trang
        $sl_page = 6;
        $tong_product = count($product);

        $tong_page = ceil($tong_product/$sl_page);

        $page_show = min($tong_page , max(1 , isset($_GET['page']) ? $_GET['page'] : 1));
    
        $vtbd = ($page_show - 1) * $sl_page;
    
        $query_sanpham .= " limit ".$vtbd.",".$sl_page;
    
        $stmt3 = $conn->prepare($query_sanpham);
        $stmt3->execute($dmcon_list);
        $product = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $product = [];
    }
   

    // var_dump($tong_product);

}

?>
    <div class="container-full">
        <div class="container-center">
            
            <div class="title_shop-product">
                <?php
                foreach ($danhmuc as $dm) {
                ?>
                <h2 class="title_shop-product_h2">TẤT CẢ LOẠI <?=$dm['TENDM_cha']?> </h2>
                <?php
                }
                ?>
                <form action="" method="post" class="hide-mobi">
                    <select name="" id="">
                        <option value="">44s</option>
                    </select>
                </form>
            </div>
            
            <div class="shop-product">
                <div class="shop-product-left">
                    <div class="shop-product-section">
                        <div class="header-shop-product">Kích Thước Cây</div>
                        <div class="shop-product-content">
                            <label><input type="checkbox"><span class="btn-shop-product"></span>Lớn</label>
                            <label><input type="checkbox">Trung Bình</label>
                            <label><input type="checkbox">Nhỏ</label>
                        </div>
                    </div>
                    <div class="shop-product-section">
                        <div class="header-shop-product">Giá Tiền</div>
                        <div class="shop-product-content">
                            <label><input type="checkbox"> <span class="btn-shop-product"></span>5000 VND</label>
                            <label><input type="checkbox">2000 VND</label>
                            <label><input type="checkbox">1000 VND</label>
                            <label><input type="checkbox">500 VND</label>
                        </div>
                    </div>
                </div>
                
                <div class="shop-product-right">
                    <div class="shop-product-list">
                        <?php
                            foreach ($product as $sp) {
                        ?>
                        <div class="shop-product-item">
                            <div class="shop-product-item-col-img <?=$sp['TinhTrang']?>">
                                <img src="asset/img/sanpham/<?=$sp['MA_DM_con']?>/<?=$sp['TenSP']?>/<?=$sp['HinhAnh']?>" alt="" />
                                <button class="shop-btnaddcart">Thêm Vào Giõ Hàng</button>
                            </div>
                            <div class="product-item-col-information">
                                <div class="product-item-col-information-col-left">
                                    <p><?=$sp['TenSP']?></p>
                                </div>
                                <div class="product-item-col-information-col-right">
                                <?php
                                    $giasp = number_format($sp['DonGia'],0,',','.');
                                ?>
                                    <p><?=$giasp?> VND</p>
                                </div>
                            </div>
                        </div>
                       <?php
                            }
                        ?>
                    </div>
                    <div class="phantrang">
                        <?php
                        if(isset($tong_page)){
                            for($so = 1; $so <= $tong_page; $so++){
                                if($so != $page_show){
                        ?>
                                    <a href="index.php?act=<?=$madanhmuc?>&page=<?=$so?>"><?=$so?></a>
                        <?php
                                }else{
                        ?>
                                <span><?=$so?></span>
                        <?php
                                }
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>