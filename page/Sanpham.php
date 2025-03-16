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
        $placeholders = implode(',', array_fill(0, count($dmcon_list), '?'));
        $query_sanpham = "SELECT * FROM tb_sanpham WHERE MA_DM_con IN ($placeholders)";
        $stmt3 = $conn->prepare($query_sanpham);
        $stmt3->execute($dmcon_list);
        $product = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $product = [];
    }
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
                <form action="" method="post">
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
                            <div class="shop-product-item-col-img discount">
                                <?php
                                    $hinh_sp = explode('|', $sp['HinhAnh']);
                                ?>
                                <img src="asset/img/sanpham/<?=$sp['MA_DM_con']?>/<?=$sp['TenSP']?>/<?=$hinh_sp[0]?>" alt="" />
                                <button class="shop-btnaddcart">Thêm Vào Giõ Hàng</button>
                            </div>
                            <div class="product-item-col-information">
                                <div class="product-item-col-information-col-left">
                                    <p><?=$sp['TenSP']?></p>
                                    <div class="radio-container product-color">
                                        <label class="radio">
                                            <input type="radio" name="color" value="gray" checked />
                                            <div class="circle"></div>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="color" value="brown" />
                                            <div class="circle"></div>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="color" value="blue" />
                                            <div class="circle"></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="product-item-col-information-col-right">
                                    <p>1200 VND</p>
                                    <p>Lớn</p>
                                </div>
                            </div>
                        </div>
                       <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>



