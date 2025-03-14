<?php
    include 'include/header.php';
?>
<main>
<div class="container-full">
        <div class="container-center">
            <div class="title_shop-product">
                <h2 class="title_shop-product_h2">Tất Cả Loại Cây Trồng</h2>
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
                        
                        <div class="shop-product-item ">
                            <div class="product-item-col-img new">
                                <img src="asset/img/bobasongkhoe.jpg" alt="" />
                            <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                            </div>
                            <div class="product-item-col-information">
                                <div class="product-item-col-information-col-left">
                                    <p>Bộ Ba Sống Khoẻ</p>
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
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
    include 'include/footer.php';
?>