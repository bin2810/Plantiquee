<?php
  include_once('header.php');
  include_once('../include/database.php');
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
          <form action="form_tintuc_add_inc_.php" method="post" enctype="multipart/form-data">
            <div class="form-elements-wrapper">
              <div class="row">
                <div class="col-lg-6">
                  <!-- input style start -->
                  <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Tiêu Đề:</label>
                      <input type="text" name="tieude" placeholder="Tiêu Đề" />
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
                      <label>Nội Dung</label>
                      <textarea placeholder="Message" name="noidung" rows="5"></textarea>
                    </div>
                   
                    <!-- end textarea -->
                  </div>
                  <div class="card-style mb-30">
                    <!-- <h6 class="mb-25">Danh Mục Con</h6> -->
                    <!-- <div class="select-style-1">
                      <div class="select-position">
                       
                        <select name="danhmuc_con">
                          
                          <option value=""></option>
                         
                        </select>
                      </div>
                    </div> -->
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center" name="them_tt" type="submit">
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