<main>
        <div class="container-full banner">
          <div class="banner-img">
            <img src="asset/img/banerr.png" alt="" />
            <div class="baner-img-content">
              <p>THÊM CÂY XANH THÊM BÌNH YÊN</p>
              <p>MỘT CHẬU CÂY NHỎ CÓ THỂ THAY ĐỔI MOOD CỦA BẠN</p>
              <p><a href="index.php?act=CT">CÂY TRỒNG</a></p>
            </div>
          </div>
        </div>

        <div class="container-center product hien-ra-dl">
          <div class="product-title">
            <p>Hàng Mới Về</p>
            <p><a href="">Xem Tất cả</a></p>
          </div>
          <div class="product-list">
          <?php
            include_once('include/database.php');
            $query_hangmoive = "SELECT * FROM tb_sanpham WHERE MA_DM_con = 'HMV'";
            $stmt_hangmoive = $conn ->prepare($query_hangmoive);
            $stmt_hangmoive->execute();

            $Hangmoive = $stmt_hangmoive ->fetchAll(PDO::FETCH_ASSOC)
          ?>
            <ul class="product-item">
              <?php
                foreach ($Hangmoive as $HMV) {
              ?>
              <li class="product-item-col">
                <div class="product-item-col-img <?=$HMV['TinhTrang']?>">
                  <a href="page/Sanpham_CT.php?id=<?=$HMV['SanPham_id']?>"><img src="asset/img/sanpham/<?=$HMV['MA_DM_con']?>/<?=$HMV['Ten_Khoa_Hoc']?>/<?=$HMV['HinhAnh']?>" alt="" /></a>
                  <form class="addtocardform" method="post" action="include/add_to_cart.php">
                    <input type="hidden" name="product_id" value="<?=$HMV['SanPham_id']?>">
                    <input type="hidden" name="product_img" value="<?=$HMV['MA_DM_con']?>/<?=$HMV['Ten_Khoa_Hoc']?>/<?=$HMV['HinhAnh']?>">
                    <input type="hidden" name="product_prive" value="<?=$HMV['DonGia']?>">
                    <input type="hidden" name="product_name" value="<?=$HMV['TenSP']?>">
                    <input type="hidden" name="quantity" value="1">
                  
                    <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                  </form>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p><?=$HMV['TenSP']?></p>
                  </div>
                  <div class="product-item-col-information-col-right">
                  <?php
                    $giasp = number_format($HMV['DonGia'],0,',','.');
                  ?>
                    <p><?=$giasp?> VND</p>
                  </div>
                </div>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>

        <!-- điểm nhấn về cây trồng  -->
        <div class="container-full plant-highlight hide-tablet">
          <!-- sản phẩm đặc trưng  -->
          <div class="container-center feature-product ">
            <div class="feature-video">
              <video autoplay loop muted playsinline>
                <source
                  src="asset/media/desktop-homepage-video.mp4"
                  type="video/mp4"
                />
              </video>
            </div>
            <div class="feature-product-content">
              <div class="feature-title">
                <p>ĐƯỢC CHỌN LỌC THỦ CÔNG</p>
                <p>CÂY CAO CẤP</p>
                <p>
                  Chúng tôi cẩn thận chỉ lựa chọn những sản phẩm lành mạnh nhất,
                  tốt nhất cây xanh tươi để vận chuyển từ nhà kính của chúng tôi
                  đến tận cửa nhà bạn
                </p>
                <p class="hide-mobi"><a href="">CÂY TRỒNG</a></p>
              </div>
            </div>
          </div>
          <div class="container-center feature-product hide-pc hide-tab">
            <div class="feature-video">
              <video autoplay loop muted playsinline>
                <source src="asset/media/live-longer.mp4" type="video/mp4" />
              </video>
            </div>
            <div class="feature-product-content">
              <div class="feature-title">
                <p>Cây sống lâu hơn gấp 6 lần</p>
                <p></p>
                <p>
                  Cây được chăm sóc kỹ lưỡng để luôn tươi tốt và bền đẹp theo
                  thời gian
                </p>
                <p class="hide-mobi"><a href="">CÂY TRỒNG</a></p>
              </div>
            </div>
          </div>
          <div class="container-center feature-product hide-pc hiden-tab-mobi">
            <div class="feature-video">
              <video autoplay loop muted playsinline>
                <source
                  src="asset/media/safely-shipped-2.mp4"
                  type="video/mp4"
                />
              </video>
            </div>
            <div class="feature-product-content ">
              <div class="feature-title">
                <p>Giao hàng an toàn đến tận nhà bạn</p>
                <p></p>
                <p>
                  Chúng tôi cẩn thận chỉ lựa chọn những sản phẩm lành mạnh nhất,
                  tốt nhất cây xanh tươi để vận chuyển từ nhà kính của chúng tôi
                  đến tận cửa nhà bạn
                </p>
                <p class="hide-mobi"><a href="">CÂY TRỒNG</a></p>
              </div>
            </div>
          </div>
          <div class="container-center feature-product hide-pc hide-tablet">
            <div class="feature-video">
              <video autoplay loop muted playsinline>
                <source src="asset/media/worry-free.mp4" type="video/mp4" />
              </video>
            </div>
            <div class="feature-product-content">
              <div class="feature-title">
                <p>Bảo hành cây trồng</p>
                <p></p>
                <p>
                  Bảo hành cây trong 90 ngày cho mỗi lần mua, có thể gia hạn lên
                  đến một năm.
                </p>
                <p class="hide-mobi"><a href="">CÂY TRỒNG</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="container-center product hien-ra-dl">
          <div class="product-title">
            <p>BÁN CHẠY NHẤT</p>
            <p><a href="">Xem Tất cả</a></p>
          </div>
          <div class="product-list">
          <?php
            include_once('include/database.php');
            $query_banchay = "SELECT * FROM tb_sanpham WHERE MA_DM_con = 'BCN'";
            $stmt_banchay = $conn ->prepare($query_banchay);
            $stmt_banchay->execute();

            $Banchaynhat = $stmt_banchay ->fetchAll(PDO::FETCH_ASSOC)
          ?>
            <ul class="product-item">
              <?php
                foreach ($Banchaynhat as $BCN) {
              ?>
              <li class="product-item-col">
                <div class="product-item-col-img <?=$BCN['TinhTrang']?>">
                  <?php
                    $img_sp = explode('|', $BCN['HinhAnh']);
                  ?>
                  <a href="page/Sanpham_CT.php?id=<?=$BCN['SanPham_id']?>"><img src="asset/img/sanpham/<?=$BCN['MA_DM_con']?>/<?=$BCN['Ten_Khoa_Hoc']?>/<?=$img_sp[0]?>" alt="" /></a>
                  <form class="addtocardform" action="include/add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?=$BCN['SanPham_id']?>">
                    <input type="hidden" name="product_img" value="<?=$BCN['MA_DM_con']?>/<?=$BCN['Ten_Khoa_Hoc']?>/<?=$BCN['HinhAnh']?>">
                    <input type="hidden" name="product_prive" value="<?=$BCN['DonGia']?>">
                    <input type="hidden" name="product_name" value="<?=$BCN['TenSP']?>">
                    <input type="hidden" name="quantity" value="1">
                  
                    <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                  </form>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p><?=$BCN['TenSP']?></p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <?php
                      $giasp = number_format($BCN['DonGia'],0,',','.');
                    ?>
                    <p><?=$giasp?> VND</p>
                  </div>
                </div>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>

        <!-- <div class="container-center interest">
          <div class="interest-title product-title">
            <p>Khám Phá Cây Theo Sở Thích Của Bạn</p>
          </div>
          <div class="interest-list">
            <div class="interest-item">
              <a><img src="asset/img/interest-1.jpg" alt="" /></a>
              <p>Cây An Toàn Cho Thú Cưng</p>
            </div>
            <div class="interest-item">
              <a><img src="asset/img/interest-2.jpg" alt="" /></a>
              <p>Cây Dễ Chăm Sóc</p>
            </div>
            <div class="interest-item">
              <a><img src="asset/img/interest-3.jpg" alt="" /></a>
              <p>Cây Nhỏ Sức Sống Lớn</p>
            </div>
            <div class="interest-item">
              <a><img src="asset/img/interest-4.jpg" alt="" /></a>
              <p>Quà Tặng</p>
            </div>
          </div>
        </div> -->

        <div class="container-full bg-chat">
          <div class="container-center">
            <div class="chat-user">
              <div class="chat-user-content">
                <p>Chúng tôi ở đây để giúp bạn dễ dàng hơn</p>
                <p>Liên hệ với các chuyên gia cây trồng của chúng tôi để nhận hướng dẫn chăm sóc cây cá nhân hóa.</p>
                <p><button id="chat-btn-1">Chat Với Chúng Tôi</button></p>
              </div>
              <div class="chat-user-img">
                <img src="asset/img/chat.jpg" alt="">
              </div>
            </div>
          </div>
        </div>

       

        <div class="container-full bg-gift">
          <div class="container-center">
            <div class="gift">
              <div class="gift-img">
                <img src="asset/img/gifts.jpg" alt="">
              </div>
              <div class="gift-content">
                <p>Một Món Quà Bền Lâu</p>
                <p>Plantiquee là món quà hoàn hảo giúp thắp sáng mọi ngôi nhà với vẻ đẹp của thiên nhiên.</p>
                <p class="hide-mobi"><a href="">Cây Trồng</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="container-full bg-gift hide-pc show-mobi hide-tablet">
          <div class="container-center">
              <div class="gift">
                <div class="gift-img">
                  <div class="gift-video">
                    <video autoplay loop muted playsinline>
                      <source src="asset/media/pots-collection-3.mp4" type="video/mp4" />
                    </video>
                  </div>
                </div>
                <div class="gift-content">
                  <p>Thiết Kế Vượt Thời Gian</p>
                  <p>Bộ sưu tập chậu cây mang tính biểu tượng của chúng tôi được chế tác tinh xảo, nổi bật trong mọi không gian.</p>
                  <p class="hide-mobi"><a href="">Cây Trồng</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container-center product hien-ra-dl">
          <div class="product-title">
            <p>Quà Tặng</p>
            <p><a href="">Xem Tất cả</a></p>
          </div>
          <div class="product-list">
          <?php
            include_once('include/database.php');
            $query_hangmoive = "SELECT * FROM tb_sanpham WHERE MA_DM_con = 'QTGD'";
            $stmt_hangmoive = $conn ->prepare($query_hangmoive);
            $stmt_hangmoive->execute();

            $Hangmoive = $stmt_hangmoive ->fetchAll(PDO::FETCH_ASSOC)
          ?>
            <ul class="product-item">
              <?php
                foreach ($Hangmoive as $HMV) {
              ?>
              <li class="product-item-col">
                <div class="product-item-col-img <?=$HMV['TinhTrang']?>">
                  <?php
                    $img_sp = explode('|', $HMV['HinhAnh']);
                  ?>
                  <a href="page/Sanpham_CT.php?id=<?=$HMV['SanPham_id']?>"><img src="asset/img/sanpham/<?=$HMV['MA_DM_con']?>/<?=$HMV['Ten_Khoa_Hoc']?>/<?=$img_sp[0]?>" alt="" /></a>
                  <form class="addtocardform" action="include/add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?=$HMV['SanPham_id']?>">
                    <input type="hidden" name="product_img" value="<?=$HMV['MA_DM_con']?>/<?=$HMV['Ten_Khoa_Hoc']?>/<?=$HMV['HinhAnh']?>">
                    <input type="hidden" name="product_prive" value="<?=$HMV['DonGia']?>">
                    <input type="hidden" name="product_name" value="<?=$HMV['TenSP']?>">
                    <input type="hidden" name="quantity" value="1">
                  
                    <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                  </form>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p><?=$HMV['TenSP']?></p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <?php
                      $giasp = number_format($HMV['DonGia'],0,',','.');
                    ?>
                    <p><?=$giasp?> VND</p>
                  </div>
                </div>
              </li>
              <?php
                }
              ?>
            </ul>
          </div>
        </div>

        <div class="container-full bg_trademark hiden-tab-mobi">
          <div class="container-center trademark">
            <div class="trademark-row">
              <img src="asset/img/trademark-1.png" alt="">
              <img src="asset/img/trademark-2.png" alt="">
              <img src="asset/img/trademark-3.png" alt="">
              <img src="asset/img/trademark-4.png" alt="">
            </div>
            <div class="trademark-row hide-mobi">
              <img src="asset/img/trademark-5.png" alt="">
              <img src="asset/img/trademark-6.png" alt="">
              <img src="asset/img/trademark-7.png" alt="">
              <img src="asset/img/trademark-8.png" alt="">
            </div>
          </div>
        </div>
        </main>