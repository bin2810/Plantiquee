<?php
    require_once('../include/database.php');
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['btnadddanhmuc'])){
      $madm = $_POST['madm'];
      $namedm = $_POST['namedm'];
      // var_dump($madm,$namedm);
      if(empty($madm) || empty($namedm) ){
        header("location: form_danhmuc_add.php?error=kt_input_trong");
        exit();
      }
      $query = 'INSERT INTO tb_danhmuc_chinh (MADM_cha ,TENDM_cha) VALUES (:MADM_cha , :TENDM_cha)';
      $stmt = $conn -> prepare($query);
      $stmt-> bindParam(':MADM_cha' , $madm);
      $stmt-> bindParam(':TENDM_cha' , $namedm);
      $stmt->execute();
      header('location: form_danhmuc_add.php');
      exit();
    }
  }

?>