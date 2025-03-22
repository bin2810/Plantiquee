<?php
  include_once('header.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once('../include/database.php');

    $query2 = "SELECT * FROM tb_danhmuc_con WHERE MADM_con = :id";
    $statement2 = $conn->prepare($query2);
    $statement2->bindParam(':id', $id);
    $statement2->execute();
    $categories2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
  }
?>
      <!-- ========== header end ========== -->

      <!-- ========== tab components start ========== -->
      <section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Danh Mục Con</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
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
          <div class="form-elements">
            <div class="row">
              <div class="col-lg-12">
                <!-- input style start -->
                <div class="card-style mb-30">
                  <h6 class="mb-25">Danh mục con</h6>
                  <form action="danhsach_danhmuc_con_update_inc_.php" method="post">
                  <?php foreach ($categories2 as $category2){ ?>
                    <div class="input-style-1">
                      <label>Mã Danh Mục Con</label>
                      <input type="text" name="madm" value="<?=$category2['MADM_con'];?>" placeholder="Mã Danh Mục" />
                    </div>
                    <div class="input-style-1">
                      <label>Tên Danh Mục Con</label>
                      <input type="text" name="namedm" value="<?=$category2['TENDM_con'];?>" placeholder="Tên Danh Mục" />
                    </div>
                    <input type="hidden" name="idMDMC" value="<?=$category2['MADM_con']?>"/>
                    <div class="input-style-3">
                        <button name="update_btnadddanhmuccon" style="background-color: #224229; color:white;" class="main-btn  btn-hover w-100 text-center">Thêm Danh Mục</button>
                    </div>
                </div>
                 <?php } ?>   
                </form>
                  <!-- end input -->
                </div>
                <!-- end card -->
                <!-- ======= input style end ======= -->

                <!-- ======= select style start ======= -->
                
                
              </div>
              <!-- end col -->
              
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== tab components end ========== -->
<?php
  include_once('footer.php');
?>
     