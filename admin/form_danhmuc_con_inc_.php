<?php
  require_once('../include/database.php');
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['btnadddanhmuc'])){
      $madm = $_POST['madm'];
      $namedm = $_POST['namedm'];
      $danhmucchinh = $_POST['dmchinh'];
      // var_dump($madm,$namedm,$danhmucchinh);
      if(empty($madm) || empty($namedm) || empty($danhmucchinh)){
        header("location: form_danhmuc_con_add.php?error=kt_input_trong");
        exit();
      }
      $query = 'INSERT INTO tb_danhmuc_con (MADM_con,TENDM_con,MA_DM_cha) VALUES (:MADM_con,:TENDM_con,:MA_DM_cha)';
      $stmt = $conn -> prepare($query);
      $stmt-> bindParam(':MADM_con' , $madm);
      $stmt-> bindParam(':TENDM_con' , $namedm);
      $stmt-> bindParam(':MA_DM_cha' , $danhmucchinh);
      $stmt->execute();
      header('location: form_danhmuc_con_add.php');
      exit();
    }
  }

?>