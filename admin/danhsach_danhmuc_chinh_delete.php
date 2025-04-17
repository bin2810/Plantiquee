<?php
  if(isset($_GET['id'])){
    $ma_ds_con = $_GET['id'];
    var_dump($userId);
    include_once('../include/database.php');
        $query = 'DELETE FROM tb_danhmuc_chinh WHERE MADM_cha = :id';
        $delete_user = $conn->prepare($query);
        $delete_user->bindParam(':id', $ma_ds_con);
        $delete_user->execute();
        if($delete_user){
          header('Location: danhsach_danhmuc_chinh.php');
        }else{
          echo 'XOÁ KHÔNG THÀNH CÔNG';
        }
  }    
?>
