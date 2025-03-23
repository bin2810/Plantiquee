<?php
  include('header.php');
  if(isset($_GET['id'])){
    include_once('../include/database.php');
    $id = $_GET['id'];
    $query_user = 'SELECT * FROM tb_user WHERE User_id = :id';
    $user = $conn -> prepare($query_user);
    $user -> bindParam(':id',$id);
    $user -> execute();
    $setting_user = $user->fetchAll(PDO::FETCH_ASSOC);
  }
?>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Settings</h2>
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
                      <li class="breadcrumb-item"><a href="#0">Pages</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Settings
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

          <div class="row">
            <div class="col-lg-6">
              <div class="card-style settings-card-1 mb-30">
                <div class="title mb-30 d-flex justify-content-between align-items-center">
                  <h6>My Profile</h6>
                  <button class="border-0 bg-transparent">
                    <i class="lni lni-pencil-alt"></i>
                  </button>
                </div>
                <?php
                  foreach ($setting_user as $us) {
                ?>
                <form action="setting_user_admin_update_inc_.php" method="post" enctype="multipart/form-data">
                <div class="profile-info">
                  <div class="d-flex align-items-center mb-30">
                    <div class="profile-image">
                      <img src="../asset/img/user/<?=$us['Hinhanh']?>" alt="" />
                    
                      <div class="update-image">
                        <input type="file" name="hinh_moi" id="">
                        <i class="lni lni-cloud-upload"></i>
                      </div>
                    </div>
                    <div class="profile-meta">
                      <h5 class="text-bold text-dark mb-10"><?=$us['Fullname']?></h5>
                    </div>
                  </div>
                  <div class="input-style-1">
                    <label>Tên Đăng Nhập</label>
                    <input type="text" placeholder="admin@example.com" name="Username" value="<?=$us['Username']?>" />
                  </div>
                  <div class="input-style-1">
                    <label>Password</label>
                    <input type="password" name="Password" value="<?=$us['Password']?>" />
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card-style settings-card-2 mb-30">
                <div class="title mb-30">
                  <h6>My Profile</h6>
                </div>
                
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Họ Tên</label>
                        <input type="text" placeholder="Họ Tên" name="Fullname" value="<?=$us['Fullname']?>" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Giới Tính</label>
                        <div class="select-style-1">
                      <div class="select-position">
                        <select name="gioitinh">
                          <option value="Nam">Nam</option>
                          <option value="Nữ">Nữ</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" placeholder="Họ Tên" name="Email" value="<?=$us['Email']?>" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Ngày Sinh</label>
                        <input type="date"  name="Ngay_sinh" value="<?=$us['NgaySinh']?>" />
                      </div>
                    </div>
                   
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Căn Cước Công Dân</label>
                        <input type="number"  name="CCCD" value="<?=$us['CCCD']?>" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Số Điện Thoại</label>
                        <input type="number"  name="SDT" value="<?=$us['SDT']?>" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Địa Chỉ</label>
                        <input type="text" placeholder="Địa Chỉ" name="DiaChi" value="<?=$us['DiaChi']?>" />
                        <input type="hidden" name="iduser" value="<?=$us['User_id']?>" />
                        <input type="text" name="hinh_cu" value="<?=$us['Hinhanh']?>" />
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="main-btn primary-btn btn-hover" name="update_frofile">
                        Update Profile
                      </button>
                    </div>
                  
                  </div>
              </div>
              <!-- end card -->
            </div>
                  </form>
            <?php
              }
            ?>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      <!-- ========== footer start =========== -->

<?php
  include('footer.php');
?>