<?php
  include_once('header.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once('../include/database.php');

    $query2 = "SELECT * FROM tb_tintuc WHERE Tintuc_id = :id";
    $news = $conn->prepare($query2);
    $news->bindParam(':id', $id);
    $news->execute();
    $tintuc = $news->fetchAll(PDO::FETCH_ASSOC);
  }

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
          <form action="danhsach_tintuc_update_inc_.php" method="post" enctype="multipart/form-data">
            <div class="form-elements-wrapper">
              <div class="row">
                <div class="col-lg-6">
                 <?php
                  foreach ($tintuc as $tt) {
                 
                 ?>
                  <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Tiêu Đề:</label>
                      <input type="text" name="tieude" value="<?=$tt['Tieu_De']?>" placeholder="Tiêu Đề" />
                    </div>
                    <div class="input-style-1">
                      <label>Hình Sản Phẩm</label>
                        <input type="file" name="hinh_sp[]" multiple/>
                      </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                  

                  <!-- ======= textarea style start ======= -->
                  <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Nội Dung</label>
                      <textarea placeholder="Message" name="noidung" rows="5"><?=$tt['Noi_Dung']?></textarea>
                    </div>
                  </div>
                  <input type="hidden" name="hinhcu" value="<?=$tt['Hinh_Anh']?>">
                  <input type="hidden" name="id_tintuc" value="<?=$tt['Tintuc_id']?>">
                  <?php }?>
                  <div class="card-style mb-30">
                    
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center" name="capnhat_tt" type="submit">
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