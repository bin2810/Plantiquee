<?php
  include_once('header.php');
  include_once('../include/database.php');
  $sql = "SELECT * FROM tb_sanpham";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $danhsach = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // phân trang
  $sl_page = 6;
  $tong_product = count($danhsach);

  $tong_page = ceil($tong_product/$sl_page);

  $page_show = min($tong_page , max(1 , isset($_GET['page']) ? $_GET['page'] : 1));

  $vtbd = ($page_show - 1) * $sl_page;

  $sql .= " limit ".$vtbd.",".$sl_page;

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
                  
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center"  type="submit" onclick="window.location.href='form_sanpham_add.php'">
                            Thêm Sản Phẩm
                          </button>
                        </div>
                      </div>
                  </nav>
                </div>
              </div>
            </div>
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
                            <h6>Đơn Giá</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Số Lượng</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Người Thêm</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Thời Gian</h6>
                          </th>
                          <th class="lead-company">
                            <h6>Sửa</h6>
                          </th>
                          <th class="lead-company">
                            <h6>Xoá</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                       
                        <tr>
                          <?php
                            $i = $vtbd+1;
                            foreach ($danhsach as $sanpham) {
                          ?>
                          <td class="min-width">  
                              <p><?=$i++?></p>
                          </td>
                          <td class="min-width">
                            <div class="lead">
                              <div class="lead-image">
                               <img src="../asset/img/sanpham/<?=$sanpham['MA_DM_con']?>/<?=$sanpham['Ten_Khoa_Hoc']?>/<?=$sanpham['HinhAnh']?>" alt="">
                              </div>
                            </div>
                          </td>
                          <td class="min-width">  
                            <p><?=$sanpham['TenSP']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$sanpham['DonGia']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$sanpham['SoLuong']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$sanpham['Nguoi_add']?></p>
                          </td>
                          <td class="min-width">
                            <p><?= date('d/m/Y H:i:s', strtotime($sanpham['NgayTao']))?></p>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-success" onclick="window.location.href='danhsach_sanpham_update.php?id=<?=$sanpham['SanPham_id']?>'">
                              <i class="fa-solid fa-pen"></i>
                              </button>
                            </div>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-danger" onclick="window.location.href='danhsach_sanpham_delete.php?id=<?=$sanpham['SanPham_id']?>'">
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
                    <div class="phantrang">
                        <?php
                        if(isset($tong_page)){
                            for($so = 1; $so <= $tong_page; $so++){
                                if($so != $page_show){
                        ?>
                                    <a href="?page=<?=$so?>"><?=$so?></a>
                        <?php
                                }else{
                        ?>
                                <span><?=$so?></span>
                        <?php
                                }
                            }
                        }
                        ?>
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