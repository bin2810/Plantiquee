<?php
  include_once('header.php');
  include_once '../include/database.php';
  $sql = "SELECT * FROM tb_user";
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
                  <h2>NGƯỜI DÙNG</h2>
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
                  <div class="card-image">
                  <?php
                    if($user['Hinhanh'] == null){
                  ?>
                    <img src="assets/images/avata_md_admin.jpg" alt="" />
                  <?php
                    }else{
                  ?>
                    <img src="../asset/img/user/<?=$user['Hinhanh']?>" alt="" />
                  <?php
                    }
                  ?>
                  </div>
                  <div class="card-content">
                    <h4 style="text-align: center;"><?=$user['Username']?></h4>
                    <p style="padding: 10px 0;">Họ Và Tên: <span style="color:#224229;font-weight:bold"><?=$user['Fullname']?></span></p>
                    <p style="padding: 10px 0;">Email: <span style="color:#224229;font-weight:bold"><?=$user['Email']?></span></p>
                    <p style="padding: 10px 0;">Vai Trò: <span style="color:#224229;font-weight:bold"><?=$user['VaiTro']?></span></p>
                    <a href="danhsach_user_delete.php?id=<?=$user['User_id']?>'" class="main-btn" style="color:brown;font-weight:bold; font-size:15px" >Xoá</a>
                    <a href="danhsach_user_update.php?id=<?=$user['User_id']?>" class="main-btn " style="color:green;font-weight:bold; font-size:15px;margin-left:15px">Sửa</a>
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