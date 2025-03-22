<?php
  if(isset($_POST['update_btnadddanhmuc'])){
    include_once('../include/database.php');

    $idMDM = $_POST['idMDM'];
    $madm = $_POST['madm'];
    $namedm = $_POST['namedm'];

    $query = 'UPDATE tb_danhmuc_chinh SET MADM_cha = :madanhmuc, TENDM_cha = :tendanhmuc WHERE MADM_cha = :id';
    $user = $conn->prepare($query);
    $user->bindParam(':madanhmuc', $madm);
    $user->bindParam(':tendanhmuc', $namedm);
    $user->bindParam(':id', $idMDM);
    $user->execute();

    if($user){
      header('Location: danhsach_danhmuc_chinh.php');
    }else{
      echo 'CẬP NHẬT KHÔNG THÀNH CÔNG';
    }
   
  }
?>