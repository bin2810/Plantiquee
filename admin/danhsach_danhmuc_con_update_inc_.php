<?php
  if(isset($_POST['update_btnadddanhmuccon'])){
    include_once('../include/database.php');

    $idMDMC = $_POST['idMDMC'];
    $madm = $_POST['madm'];
    $namedm = $_POST['namedm'];

    $query = 'UPDATE tb_danhmuc_con SET MADM_con = :madanhmuccon, TENDM_con = :tendanhmuccon WHERE MADM_con = :id';
    $user = $conn->prepare($query);
    $user->bindParam(':madanhmuccon', $madm);
    $user->bindParam(':tendanhmuccon', $namedm);
    $user->bindParam(':id', $idMDMC);
    $user->execute();

    if($user){
      header('Location: danhsach_danhmuc_con.php');
    }else{
      echo 'CẬP NHẬT KHÔNG THÀNH CÔNG';
    }
   
  }
?>