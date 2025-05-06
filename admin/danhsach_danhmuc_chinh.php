<?php
include_once 'header.php';
?>
      <!-- ========== table components start ========== -->
      <section class="table-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Danh Sách Danh Mục Chính</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                  
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center"  type="submit" onclick="window.location.href='form_danhmuc_add.php'">
                            Thêm Danh Mục Chính
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

          <!-- ========== tables-wrapper start ========== -->

          <?php
            include_once '../include/database.php';
            $sql = "SELECT * FROM tb_danhmuc_chinh";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $danhsach = $stmt->fetchAll(PDO::FETCH_ASSOC);
          ?> 
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="lead-company">
                            <h6>MÃ DANH MỤC CHA</h6>
                          </th>
                          <th class="lead-company">
                            <h6>TÊN DANH MỤC CHA</h6>
                          </th>
                          <th class="lead-company">
                            <h6>CẬP NHẬT</h6>
                          </th>
                          <th class="lead-company">
                            <h6>XOÁ</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <?php
                          foreach($danhsach as $ds){
                        ?>
                        <tr>
                          
                          <td class="min-width">  
                              <p><?=$ds['MADM_cha']?></p>
                            </td>
                          <td class="min-width">  
                            <p><?=$ds['TENDM_cha']?></p>
                          </td>
                          <td class="action">  
                              <button class="text-success" onclick="window.location.href='danhsach_danhmuc_chinh_update.php?id=<?=$ds['MADM_cha']?>'">
                                <i class="fa-solid fa-pen"></i>
                              </button>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-danger" onclick="window.location.href='danhsach_danhmuc_chinh_delete.php?id=<?=$ds['MADM_cha']?>'">
                                <i class="lni lni-trash-can"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
           
         


            
          </div>
          <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== table components end ========== -->

      <!-- ========== footer start =========== -->

<?php
  include_once 'footer.php';
?>