<?php
  include_once('header.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once('../include/database.php');

    $query2 = "SELECT * FROM tb_sanpham WHERE SanPham_id = :id";
    $product = $conn->prepare($query2);
    $product->bindParam(':id', $id);
    $product->execute();
    $sanpham = $product->fetchAll(PDO::FETCH_ASSOC);
  }
?>
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
          <form action="danhsach_sanpham_update_inc_.php" method="post" enctype="multipart/form-data">
            <div class="form-elements-wrapper">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card-style mb-30">
                    <?php
                      foreach ($sanpham as $sp) {
                    ?>
                    <div class="input-style-1">
                      <label>Tên Sản Phẩm:</label>
                      <input type="text" name="ten_sp" value="<?=$sp['TenSP']?>" placeholder="Tên Sản Phẩm" />
                    </div>
                    <div class="input-style-1">
                      <label>Tên Khoa Học:</label>
                      <input type="text" name="ten_kh" value="<?=$sp['Ten_Khoa_Hoc']?>" placeholder="Tên Khoa Học" />
                    </div>
                    <div class="input-style-1">
                      <label>Tên Phổ Biến:</label>
                      <input type="text" name="ten_pb" value="<?=$sp['Ten_Pho_Bien']?>" placeholder="Tên Phổ Biến" />
                    </div>
                    <div class="input-style-1">
                      <label>Giá Sản Phẩm:</label>
                      <input type="number" name="gia_sp" value="<?=$sp['DonGia']?>" placeholder="Giá Sản Phẩm" />
                    </div>
                    <div class="input-style-1">
                      <label>Số Lượng:</label>
                      <input type="number" name="soluong_sp" value="<?=$sp['SoLuong']?>" placeholder="Giá Sản Phẩm" />
                    </div>
                    <div class="input-style-1">
                      <label>Hình Sản Phẩm</label>
                        <input type="file" name="hinh_sp_moi"/>
                      </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Tiêu Đề Sản Phẩm</label>
                      <textarea placeholder="Message" name="tieu_de_sp"  rows="5"><?=$sp['Title_SP']?></textarea>
                    </div>
                    <!-- end textarea -->
                    <div class="input-style-1">
                      <label>Mô Tả Sản Phẩm</label>
                      <textarea placeholder="Message" name="mota_sp" rows="5"><?=$sp['MoTa']?></textarea>
                    </div>
                    <h6 class="mb-25">Trạng Thái</h6>
                    <div class="select-style-1">
                      <div class="select-position">
                        <select name="trangthai">
                          <option value="New">New</option>
                          <option value="Discount10">Discount10</option>
                          <option value="Discount20">Discount20</option>
                          <option value="Discount30">Discount30</option>
                          <option value="Discount40">Discount40</option>
                          <option value="Discount50">Discount50</option>
                          <option value="Discount60">Discount60</option>
                          <option value="Discount70">Discount70</option>
                        </select>
                      </div>
                    </div>
                    <input type="hidden" name="id_update_sp" value="<?=$sp['SanPham_id']?>">
                    <input type="hidden" name="danhmuc_con" value="<?=$sp['MA_DM_con']?>">
                    <input type="hidden" name="hinh_sp_cu" value="<?=$sp['HinhAnh']?>">
                  </div>
                  <div class="card-style mb-30">
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center" name="update_sp" type="submit">
                            Cập Nhật Sản Phẩm
                          </button>
                        </div>
                      </div>
                  </div>
                </div>
                <?php
                      }
                ?>
              </div>
            </div>
          </form>
        </div>
      </section>
<?php
  include_once('footer.php');
?>