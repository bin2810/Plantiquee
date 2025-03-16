
<?php
  include_once('include/database.php');
  $monqua = "SELECT * FROM tb_sanpham WHERE MA_DM_con = 'BCN'";
  $stmt = $conn ->prepare($monqua);
  $stmt->execute();

  $Banchaynhat = $stmt ->fetchAll(PDO::FETCH_ASSOC)
?>
        <div class="container-full banner">
          <div class="banner-img">
            <img src="asset/img/banner1.jpg" alt="" />
            <div class="baner-img-content">
              <p>THÊM CÂY XANH THÊM BÌNH YÊN</p>
              <p>MỘT CHẬU CÂY NHỎ CÓ THỂ THAY ĐỔI MOOD CỦA BẠN</p>
              <p><a href="index.php?act=Caytrong">CÂY TRỒNG</a></p>
            </div>
          </div>
        </div>

        <div class="container-center product">
          <div class="product-title">
            <p>MÓN QUÀ Ý NGHĨA</p>
            <p><a href="">Xem Tất cả</a></p>
          </div>
          <div class="product-list">
            <ul class="product-item">
              <li class="product-item-col">
                <div class="product-item-col-img discount">
                  <img src="asset/img/trucmay.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Trúc Mây</p>
                    <p>Màu vàng</p>
                    <div class="radio-container">
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
              </li>
              <li class="product-item-col">
                <div class="product-item-col-img new">
                  <img src="asset/img/traubanammy.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Trầu Bà Nam Mỹ</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <li class="product-item-col">
                <div class="product-item-col-img new">
                  <img src="asset/img/kimngan.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Cây Kim Ngân</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <li class="product-item-col">
                <div class="product-item-col-img">
                  <img src="asset/img/bobasongkhoe.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Bộ Ba Sống Khoẻ</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <li class="product-item-col hide-product">
                <div class="product-item-col-img">
                  <img src="asset/img/trucmay.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Trúc Mây</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <li class="product-item-col hide-product">
                <div class="product-item-col-img">
                  <img src="asset/img/trucmay.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Trúc Mây</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <li class="product-item-col hide-product">
                <div class="product-item-col-img">
                  <img src="asset/img/trucmay.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Trúc Mây</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <li class="product-item-col hide-product">
                <div class="product-item-col-img">
                  <img src="asset/img/trucmay.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Trúc Mây</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <li class="product-item-col hide-product">
                <div class="product-item-col-img">
                  <img src="asset/img/trucmay.jpg" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p>Trúc Mây</p>
                    <p>Màu vàng</p>
                    <p>yếu</p>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <!-- điểm nhấn về cây trồng  -->
        <div class="container-full plant-highlight hide-tablet">
          <!-- sản phẩm đặc trưng  -->
          <div class="container-center feature-product">
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
          <div class="container-center feature-product hide-pc show-tab-mobi">
            <div class="feature-video">
              <video autoplay loop muted playsinline>
                <source
                  src="asset/media/safely-shipped-2.mp4"
                  type="video/mp4"
                />
              </video>
            </div>
            <div class="feature-product-content">
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

        <div class="container-center product">
          <div class="product-title">
            <p>BÁN CHẠY NHẤT</p>
            <p><a href="">Xem Tất cả</a></p>
          </div>
          <div class="product-list">
            <ul class="product-item">
              <?php
                foreach ($Banchaynhat as $BCN) {
              ?>
              <li class="product-item-col">
                <div class="product-item-col-img discount">
                  <?php
                    $img_sp = explode('|', $BCN['HinhAnh']);
                  ?>
                  <img src="asset/img/sanpham/<?=$BCN['MA_DM_con']?>/<?=$BCN['TenSP']?>/<?=$img_sp[0]?>" alt="" />
                  <button class="btnaddcart">Thêm Vào Giõ Hàng</button>
                </div>
                <div class="product-item-col-information">
                  <div class="product-item-col-information-col-left">
                    <p><?=$BCN['TenSP']?></p>
                    <p>Màu vàng</p>
                    
                    <div class="radio-container">
                    <?php
                      $name_color = explode(',', $BCN['Ten_Mau_Sac']);
                      $code_color = explode(',', $BCN['Ma_Mau_Sac']);
                     
                      foreach ($name_color as $index => $tenmau) {
                      
                      $mamau = isset($code_color[$index]) ? $code_color[$index] : '#000';
                    ?>
                      <label class="radio">
                      <input type="radio" name="color" value="<?=$tenmau?>" <?= $index == 0 ? 'checked' : '' ?> />
                        <div style="background-color: <?=$mamau?> ;" class="circle"></div>
                      </label>
                      <?php
                      }
                      ?>
                    </div>
                  </div>
                  <div class="product-item-col-information-col-right">
                    <p>1200 VND</p>
                    <p>Lớn</p>
                  </div>
                </div>
              </li>
              <?php
                }
              ?>


            </ul>
          </div>
        </div>

        <div class="container-center interest">
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
        </div>

        <div class="container-full bg-chat">
          <div class="container-center">
            <div class="chat-user">
              <div class="chat-user-content">
                <p>Chúng tôi ở đây để giúp bạn dễ dàng hơn</p>
                <p>Liên hệ với các chuyên gia cây trồng của chúng tôi để nhận hướng dẫn chăm sóc cây cá nhân hóa.</p>
                <p><button>Chat Với Chúng Tôi</button></p>
              </div>
              <div class="chat-user-img">
                <img src="asset/img/chat.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
        <div class="container-full bg-gift hide-tablet">
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
        <div class="container-full bg_trademark hide-tablet hide-mobi">
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