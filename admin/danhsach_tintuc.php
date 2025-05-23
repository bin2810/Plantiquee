<?php
  include_once('header.php');
  include_once '../include/database.php';
  $sql = "SELECT * FROM tb_tintuc";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
      <section class="card-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Học Hỏi</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center"  type="submit" onclick="window.location.href='form_tintuc_add.php'">
                            Thêm Tin Tức
                          </button>
                        </div>
                      </div>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== cards-styles start ========== -->
          <div class="cards-styles">
            

            <!-- ========= card-style-4 start ========= -->
            <div class="row">
              <?php
                foreach($users as $user){
              ?>
              <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="card-style-4 mb-30">
                  <div class="card-image" style="border-radius: 0;">
                    <?php
                      $hinhanh = explode(',', $user['Hinh_Anh']);
                    ?>
                  
                  <img src="../asset/img/tintuc/<?=$hinhanh[0]?>" width="100%" height="200px" alt="" />
                  
                  </div>
                  <div class="card-content">
                    <h4 style="text-align: center; font-size: 15px; height:50px;"><?=$user['Tieu_De']?></h4>
                    <div class="btn_cs"  style="margin-top: 15px;display: flex;justify-content: center;">
                      <a href="danhsach_tintuc_delete.php?id=<?=$user['Tintuc_id']?>'" class="main-btn" style="color:brown;font-weight:bold; font-size:15px" >Xoá</a>
                      
                      <a href="danhsach_tintuc_update.php?id=<?=$user['Tintuc_id']?>" class="main-btn " style="color:green;font-weight:bold; font-size:15px;">Sửa</a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
            
           
            
          </div>
          <!-- ========== cards-styles end ========== -->
        </div>
        <!-- end container -->
      </section>
<?php
  include('footer.php')
?>