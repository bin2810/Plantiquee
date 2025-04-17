<?php
  include_once('header.php');
require_once('../include/database.php');
// Lấy danh sách các danh mục từ cơ sở dữ liệu
$query = "SELECT * FROM tb_danhmuc_chinh";
$statement = $conn->prepare($query);
$statement->execute();
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
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
                  <h2>Danh Mục Con</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
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
          <div class="form-elements">
            <div class="row">
              <div class="col-lg-12">
                <!-- input style start -->
                <div class="card-style mb-30">
                  <h6 class="mb-25">Danh mục con</h6>
                  <form action="form_danhmuc_con_inc_.php" method="post">
                    <div class="input-style-1">
                      <label>Mã Danh Mục Con</label>
                      <input type="text" name="madm" placeholder="Mã Danh Mục" />
                    </div>
                    <div class="input-style-1">
                      <label>Tên Danh Mục Con</label>
                      <input type="text" name="namedm" placeholder="Tên Danh Mục" />
                    </div>
                    <div class="select-style-1">
                      <label>Danh Mục Chính</label>
                      <div class="select-position">
                        <select name="dmchinh">
                        <?php foreach ($categories as $category){ ?>
                          <option value="<?php echo $category['MADM_cha']; ?>">
                              <?php echo $category['TENDM_cha']; ?>
                          </option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="input-style-3">
                        <button name="btnadddanhmuc" style="background-color: #224229; color:white;" class="main-btn  btn-hover w-100 text-center">Thêm Danh Mục</button>
                    </div>
                </div>
                    
                    
                </form>
                  <!-- end input -->
                </div>
                <!-- end card -->
                <!-- ======= input style end ======= -->

                <!-- ======= select style start ======= -->
                
                
              </div>
              <!-- end col -->
              
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== tab components end ========== -->
<?php
  include_once('footer.php');
?>
     