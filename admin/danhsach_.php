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
                  <h2>Danh Sách User</h2>
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
                      <li class="breadcrumb-item active" aria-current="page">
                        Tables
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

          <!-- ========== tables-wrapper start ========== -->

          <?php
            include_once '../include/database.php';
            $sql = "SELECT * FROM tb_user";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            ?> 
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Data Table</h6>
                  <p class="text-sm mb-20">
                    For basic styling—light padding and only horizontal
                    dividers—use the class table.
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="lead-info">
                            <h6>USER_ID</h6>
                          </th>
                          <th class="lead-info">
                            <h6>AVATA</h6>
                          </th>
                          <th class="lead-info">
                            <h6>USERNAME</h6>
                          </th>
                          <th class="lead-info">
                            <h6>FULLNAME</h6>
                          </th>
                          <th class="lead-info">
                            <h6>EMAIL</h6>
                          </th>
                          <th class="lead-company">
                            <h6>VAI TRÒ</h6>
                          </th>
                          <th class="lead-company">
                            <h6>XOÁ</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <?php
                          foreach($users as $user){
                        ?>
                        <tr>
                          
                          <td class="min-width">  
                              <p><?=$user['User_id']?></p>
                            </td>
                          <td class="min-width">
                            <div class="lead">
                              <div class="lead-image">
                                <?php
                                  if($user['Hinhanh'] == null){
                                ?>
                                  <img src="assets/images/avata_md_admin.jpg" alt="" />
                                <?php
                                  }else{
                                ?>
                                  <img src="assets/images/<?=$user['Hinhanh']?>" alt="" />
                                <?php
                                  }
                                ?>
                              </div>
                            </div>
                          </td>
                          <td class="min-width">  
                            <p><?=$user['Username']?></p>
                          </td>
                          <td class="min-width">
                            <p><a href="#0"><?=$user['Fullname']?></a></p>
                          </td>
                          <td class="min-width">
                            <p><?=$user['Email']?></p>
                          </td>
                          <td class="min-width">
                            <p><?=$user['VaiTro']?></p>
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
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
           
            <!-- end row -->

            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">VAI TRÒ</h6>
                  <p class="text-sm mb-20">
                    For Striped Table—light padding and only horizontal
                    dividers.
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table striped-table">
                      <thead>
                        <tr>
                          <th>
                            <h6>USER_ID</h6>
                          </th>
                          <th>
                            <h6>FULLNAME</h6>
                          </th>
                          <th>
                            <h6>VAI TRÒ</h6>
                          </th>
                          <th>
                            <h6>CHI TIẾT</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <?php
                          foreach($users as $user){
                        ?>
                        <tr>
                          <!-- <td>
                            <div class="check-input-primary">
                              <input class="form-check-input" type="checkbox" id="checkbox-1" />
                            </div>
                          </td> -->
                          <td>
                            <p><?=$user['User_id']?></p>
                          </td>
                          <td>
                            <p><?=$user['Fullname']?></p>
                          </td>
                          <td>
                            <p style="color:#224229;font-weight:bold;"><?=$user['VaiTro']?></p>
                          </td>
                          <td>
                            <div class="action">
                              <button class="text-success " onclick="window.location.href='danhsach_user_update.php?id=<?=$user['User_id']?>'">
                                <i class="fa-solid fa-pen"></i>
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