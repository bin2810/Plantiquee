<?php
  include_once('header.php');
  include_once('../include/database.php');
  $sl_page = 5;
  $sql_count = "SELECT COUNT(*) FROM tb_khachhang";
  $stmt_count = $conn->prepare($sql_count);
  $stmt_count->execute();
  $tong_product = $stmt_count->fetchColumn();
  $tong_page = ceil($tong_product / $sl_page);


  $page_show = min($tong_page , max(1 , isset($_GET['page']) ? $_GET['page'] : 1));

  $vtbd = ($page_show - 1) * $sl_page;

  $sql = "SELECT 
            kh.KhachHang_id,
            kh.HoTen,
            kh.Email,
            kh.SĐT,
            kh.DiaChi,
            COALESCE(SUM(ct.SoLuong * ct.DonGia), 0) AS TongTienMua
        FROM tb_khachhang kh
        LEFT JOIN tb_donhang dh ON kh.KhachHang_id = dh.MaKhachHang
        LEFT JOIN tb_ctdonhang ct ON dh.DonHang_id = ct.MaDH
        GROUP BY kh.KhachHang_id
        LIMIT $vtbd, $sl_page";

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
                          <th class="lead-info">
                            <h6>Tổng Tiền</h6>
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
                          <td class="min-width">
                             <p><?=number_format($khachhang['TongTienMua'], 0, ',', '.')?> đ</p>
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