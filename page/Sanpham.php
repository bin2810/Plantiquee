<?php
    include('include/get_product.php');
?>
    <div class="container-full">
        <div class="container-center">
        

            <div class="title_shop-product">
            <?php if (!empty($product)){ ?>
                <h2 class="title_shop-product_h2">TẤT CẢ LOẠI <?= $product[0]['TENDM_cha'] ?></h2>
            <?php } ?>
            </div>
            
            <div class="shop-product">
                <div class="shop-product-left">
                    
                   

                <div class="shop-product-left">
                    <div class="shop-product-section">
                        <div class="header-shop-product">Loại Cây</div>
                        <div class="shop-product-content">
                        <label>
                        <input type="checkbox" class="LocLoai" value="index.php?act=<?=$madanhmuc?>">
                        <span class="btn-shop-product"></span>Tất Cả
                        </label>
                            <?php
                                foreach ($loaisp as $dmcon) {  
                                    // Kiểm tra xem MADM_con có tồn tại trong URL tham số loc hay không
                                    $isChecked = isset($_GET['loc']) && $_GET['loc'] == $dmcon['MADM_con'] ? 'checked' : '';
                            ?>
                            <label>
                                <input type="checkbox" class="LocLoai" value="index.php?act=<?=$madanhmuc?>&loc=<?=$dmcon['MADM_con']?>" <?=$isChecked?>>
                                <span class="btn-shop-product"></span><?=$dmcon['TENDM_con']?>
                            </label>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <script>
                    // Cập nhật sự kiện cho checkbox
                    document.querySelectorAll('.LocLoai').forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            if (this.checked) {
                                window.location.href = this.value; // Chuyển trang đến URL đã chọn
                            }
                        });
                    });
                </script>
                </div>
                
                <div class="shop-product-right">
                    <div class="shop-product-list">
                        <?php
                            foreach ($product as $sp) {
                        ?>
                        <div class="shop-product-item">
                            <div class="shop-product-item-col-img <?=$sp['TinhTrang']?>">
                                <a href="page/Sanpham_CT.php?id=<?=$sp['SanPham_id']?>"><img src="asset/img/sanpham/<?=$sp['MA_DM_con']?>/<?=$sp['Ten_Khoa_Hoc']?>/<?=$sp['HinhAnh']?>" alt="" /></a>
                                <!-- <button class="shop-btnaddcart">Thêm Vào Giõ Hàng</button> -->

                                <form class="addtocardform" action="include/add_to_cart_chitiet.php" method="post">
                                    <input type="hidden" name="product_id" value="<?=$sp['SanPham_id']?>">
                                    <input type="hidden" name="product_img" value="<?=$sp['MA_DM_con']?>/<?=$sp['Ten_Khoa_Hoc']?>/<?=$sp['HinhAnh']?>">
                                    <input type="hidden" name="product_prive" value="<?=$sp['DonGia']?>">
                                    <input type="hidden" name="product_name" value="<?=$sp['TenSP']?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="product_MA_DM_con" value="<?=$sp['MA_DM_con']?>">

                                
                                    <button class="shop-btnaddcart">Thêm Vào Giõ Hàng</button>
                                </form>
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
                        if (isset($tong_page)) {
                            for ($so = 1; $so <= $tong_page; $so++) {
                                if ($so != $page_show) {
                                    echo '<a href="index.php?act=' . $madanhmuc . '&loc=' . (isset($_GET['loc']) ? $_GET['loc'] : '') .'&page=' . $so . '">' . $so . '</a>';
                                } else {
                                    echo '<span>' . $so . '</span>';
                                }
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>