<?php
  include_once('header.php');
  include_once('../include/database.php');
  $sql = "SELECT * FROM tb_sanpham";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $danhsach = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
      <!-- ========== header start ========== -->
      <!-- ========== header end ========== -->

      <!-- ========== tab components start ========== -->
      <section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Danh Sách Sản Phẩm</h2>
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
            <div class="form-elements-wrapper">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card-style mb-30">
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="lead-info">
                            <h6>ID Sản Phẩm</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Hình Ảnh</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Tên Sản Phẩm</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Màu Sắc</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Đơn Giá</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Số Lượng</h6>
                          </th>
                          <th class="lead-company">
                            <h6>Sửa</h6>
                          </th>
                          <th class="lead-company">
                            <h6>XOÁ</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                       
                        <tr>
                          <?php
                            foreach ($danhsach as $sanpham) {
                          ?>
                          <td class="min-width">  
                              <p><?=$sanpham['SanPham_id']?></p>
                          </td>
                          <td class="min-width">
                            <?php
                              $hinh_sp = explode('|', $sanpham['HinhAnh']);
                            ?>
                            <div class="lead">
                              <div class="lead-image">
                               <img src="../asset/img/sanpham/<?=$sanpham['MA_DM_con']?>/<?=$sanpham['TenSP']?>/<?=$hinh_sp[0]?>" alt="">
                              </div>
                            </div>
                          </td>
                          <td class="min-width">  
                            <p><?=$sanpham['TenSP']?></p>
                          </td>
                          <td class="min-width">
                            <?php
                              $ten_mau = explode(',', $sanpham['Ten_Mau_Sac']);
                              foreach ($ten_mau as $mau) {
                            ?>
                              <p><?=$mau?></p>
                            <?php
                              }
                            ?>
                          </td>
                          <td class="min-width">
                            <p><?=$sanpham['DonGia']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$sanpham['SoLuong']?></p>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-success" onclick="window.location.href='danhsach_user_delete.php?id=<?=$user['User_id']?>'">
                              <i class="fa-solid fa-pen"></i>
                              </button>
                            </div>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-danger" onclick="window.location.href='danhsach_user_delete.php?id=<?=$user['User_id']?>'">
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
                  </div>
                  </div>
                  <div class="card-style mb-30">
                    
                  </div>
                  

                  

                </div>
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="card-style mb-30">
                        <div class="table-wrapper table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="lead-info">
                                  <h6>Người Thêm Sản Phẩm</h6>
                                </th>
                                <th class="lead-info">
                                  <h6>Tên Sản Phẩm</h6>
                                </th>
                                <th class="lead-info">
                                  <h6>Ngày Và Giờ</h6>
                                </th> 
                              </tr>
                              <!-- end table row-->
                            </thead>
                            <tbody>
                            
                              <tr>
                                <?php
                                  foreach ($danhsach as $sanpham) {
                                ?>
                                <td class="min-width">  
                                    <p><?=$sanpham['Nguoi_add']?></p>
                                </td>
                                <td class="min-width">  
                                  <p><?=$sanpham['TenSP']?></p>
                                </td>
                                <td class="min-width">
                                  <p><?= date('d/m/Y H:i:s', strtotime($sanpham['NgayTao']))?></p>
                                </td>
                              </tr>
                            
                            <?php
                                  }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card-style mb-30">
                        <div class="table-wrapper table-responsive">
                          
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
              <!-- end row -->
            </div>
          
        </div>
        <!-- end container -->
      </section>
      <!-- ========== tab components end ========== -->
<?php
  include_once('footer.php');
?>