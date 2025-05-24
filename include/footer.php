        

        <!-- chat  -->
        <div class="main_chat hiden-tab-mobi" id="nutP">
          <button id="chat-btn"><div class="chat_bubble"><img src="asset/img/logo-tab.png" alt=""></div></button>
        </div>

        
        <div id="chat-widget" class="chat-widget">
          <div class="chat-header">
              <span class="brand">Plantiquee</span>
              <button id="close-chat" class="close-chat">✖</button>
          </div>
          <div class="chat-body">
              <!-- <p>Xin Chào 👋🌱</p> -->
              <div class="messages">
                
              </div>
              <div class="chat-options">
                
              </div>
          </div>
          <div class="chat-footer">
              <form id="chat-form">
                <input type="text" id="question" placeholder="Nhập câu hỏi..." required>
                <button type="submit">Gửi</button>
            </form>
          </div>
        </div>
        <!-- tìm kiếm  -->
        <div class="container-full search_product_mains" id="box_search">
          <div class="search_product_main">
            <h1>Tìm Kiếm Sản Phẩm Yêu Thích Của Bạn</h1>
            <form action="include/Search_product.php" method="post">
              <input type="text" name="txt_search" id="" placeholder="NHẬP TÌM KIẾM CỦA BẠN">
            </form>
          </div>
        </div>
      <footer>
        <div class="container-full bg-footer">
          <div class="container-center footer">
            <div class="footer-img">
              <!-- <img style="width:200px; display:flex; justify-content:center" src="asset/img/LOGO-HOTEC-green.png" width="15px" alt=""> -->
              <img src="asset/img/logo-footer.png" alt="">
            </div>
            <div class="footer-content">
              <div class="footer-col">
                <p>Về Chúng Tôi</p>
                <a href="page/about.php">Giới Thiệu</a>
                <a href="">Tuyển Dụng</a>
                <a href="">Đánh Giá</a>
                <a href="page/HocHoi.php">Học Hỏi</a>
                <a href="">Cam Kết Của Chúng Tôi</a>
                <a href="">Quà Tặng Doanh Nghiệp</a>
              </div>
              <div class="footer-col">
                <p>Hỗ Trợ</p>
                <a href="">Theo Dõi Đơn Hàng</a>
                <a href="">Vận Chuyển</a>
                <a href="">Trả Hàng</a>
                <a href="">Liên Hệ Hỗ Trợ</a>
              </div>
              <div class="footer-col">
                <p>Về Cây Cảnh</p>
                <a href="">Mẹo Chăm Sóc Cây</a>
                <a href="">Blog Về Cuộc Sống Xanh</a>
                <a href="">Ứng Dụng Plantiquee</a>
              </div>
            </div>
          </div>
          <hr>
          <div class="container-center privacy-policy">
            <div class="security">
              <a href="">Điều Khoản</a>
              <a href="">Chính Sách Bảo Mật</a>
            </div>
            <div class="social-media">
              <a href="https://www.facebook.com/profile.php?id=61573249155245&locale=vi_VN"><img src="asset/img/fb_1.png" alt=""></a>
              <a href="https://www.instagram.com/plantiquee/"><img src="asset/img/inta_1.png" alt=""></a>
              <a href="https://www.tiktok.com/@plantiquee?is_from_webapp=1&sender_device=pc"><img src="asset/img/tiktok_1.png" alt=""></a>
            </div>
          </div>
        </div>
        
      </footer>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="asset/js/main.js"></script>
    <script src="asset/js/navbar.js"></script>
    <script src="asset/js/animation.js"></script>
    <script src="asset/js/search.js"></script>
    <script src="asset/js/so_luong_product.js"></script>
    <script src="asset/js/chat.js"></script>
   </div>
  </body>
</html>