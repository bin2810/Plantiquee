<?php
  include_once('header.php');
  include_once('../include/database.php');

  $query = "SELECT * FROM tb_danhmuc_con ORDER BY CASE WHEN MA_DM_cha = 'CT' THEN  1  WHEN MA_DM_cha = 'DC' THEN 2 ELSE 3 END";
  $danhmuc_con = $conn->query($query);
  $danhmuc_con->execute();
?>
      <!-- ========== header end ========== -->

      <!-- ========== tab components start ========== -->
      <section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Form Sản Phẩm</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Form Elements
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== form-elements-wrapper start ========== -->
          <form action="form_sanpham_add_inc_.php" method="post" enctype="multipart/form-data">
            <div class="form-elements-wrapper">
              <div class="row">
                <div class="col-lg-6">
                  <!-- input style start -->
                  <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Tên Sản Phẩm:</label>
                      <input type="text" name="ten_sp" placeholder="Tên Sản Phẩm" />
                    </div>
                    <div class="input-style-1">
                      <label>Tên Khoa Học:</label>
                      <input type="text" name="ten_kh" placeholder="Tên Khoa Học" />
                    </div>
                    <div class="input-style-1">
                      <label>Tên Phổ Biến:</label>
                      <input type="text" name="ten_pb" placeholder="Tên Phổ Biến" />
                    </div>
                    <div class="input-style-1">
                      <label>Giá Sản Phẩm:</label>
                      <input type="number" name="gia_sp" placeholder="Giá Sản Phẩm" />
                    </div>
                    <div class="input-style-1">
                      <label>Số Lượng:</label>
                      <input type="number" name="soluong_sp" placeholder="Giá Sản Phẩm" />
                    </div>
                    <div class="input-style-1">
                      <label>Hình Sản Phẩm</label>
                        <input type="file" name="hinh_sp"/>
                      </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  

                  <!-- ======= textarea style start ======= -->
                  <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Tiêu Đề Sản Phẩm</label>
                      <textarea placeholder="Message" name="tieu_de_sp" rows="5"></textarea>
                    </div>
                    <!-- end textarea -->
                    <div class="input-style-1">
                      <label>Mô Tả Sản Phẩm</label>
                      <textarea placeholder="Message" name="mota_sp" rows="5"></textarea>
                    </div>
                   
                    <!-- end textarea -->
                  </div>
                  <div class="card-style mb-30">
                    <h6 class="mb-25">Danh Mục Con</h6>
                    <div class="select-style-1">
                      <div class="select-position">
                       
                        <select name="danhmuc_con">
                          <?php
                            foreach($danhmuc_con as $dmc){
                          ?>
                          <option value="<?=$dmc['MADM_con']?>"><?=$dmc['TENDM_con']?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center" name="sub_themsp" type="submit">
                            Thêm Sản Phẩm
                          </button>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
<?php
  include_once('footer.php');
?>