<?php
  include_once('header.php');
  include_once('../include/database.php');
  $sql = "SELECT * FROM tb_khachhang";
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
                  <h2>Danh Sách Khách Hàng</h2>
                </div>
              </div>
              <!-- end col -->
              
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
                            <h6>STT</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Họ Và Tên</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Email</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Số Điện Thoại</h6>
                          </th>
                          <th class="lead-info">
                            <h6>Địa Chỉ</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <tr>
                          <?php
                            $i = $vtbd+1;
                            foreach ($danhsach as $khachhang) {
                          ?>
                          <td class="min-width">  
                              <p><?=$i++?></p>
                          </td>
                          
                          <td class="min-width">  
                            <p><?=$khachhang['HoTen']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$khachhang['Email']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$khachhang['SĐT']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$khachhang['DiaChi']?></p>
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