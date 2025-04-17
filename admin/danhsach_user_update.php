<?php
    include_once('header.php');
  ?>

      <!-- ========== signin-section start ========== -->
      <section class="signin-section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>CẬP NHẬT VAI TRÒ USER</h2>
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
                      <li class="breadcrumb-item"><a href="#0">Auth</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Sign up
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
          <?php
          if(isset($_GET['id'])){
            $id = $_GET['id'];
            $vaitro = ['admin', 'user'];
            include_once('../include/database.php');
            $query = 'SELECT * FROM tb_user  WHERE User_id = '. $_GET['id'];
            $user = $conn->prepare($query);
            $user->execute();
            $users = $user->fetchAll(PDO::FETCH_ASSOC);
          }
            foreach ($users as $us) {
              
            
          ?>
          <div class="row g-0 auth-row">
            <div class="col-lg-12">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-15">BẢNG CẬP NHẬT VAI TRÒ USER</h6>
                  <form action="danhsach_user_update_inc_.php" method="POST">
                    <div class="row">
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>FULLNAME</label>
                          <input type="text" name="fullname" placeholder="Name" value="<?=$us['Fullname']?>"/>
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="select-style-1">
                        <label>VAI TRÒ</label>
                        <div class="select-position">
                          <select name="vaitro">
                            <option value="admin" <?= ($us['VaiTro'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                            <option value="user" <?= ($us['VaiTro'] == 'user') ? 'selected' : '' ?>>User</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="input-style-1">
                          <input type="hidden" name="iduser" value="<?=$us['User_id']?>"/>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center" name="update_user">
                            CẬP NHẬT
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  <?php
                    }
                  ?>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->

<?php
    include_once('footer.php');
?>