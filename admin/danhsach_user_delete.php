<?php
  if(isset($_GET['id'])){
    $userId = $_GET['id'];
    include_once('../include/database.php');
        $query = 'DELETE FROM tb_user WHERE User_id = :id';
        $delete_user = $conn->prepare($query);
        $delete_user->bindParam(':id', $userId, PDO::PARAM_INT);
        $delete_user->execute();
        if($delete_user){
          header('Location: danhsach_user.php');
        }else{
          echo 'XOÁ KHÔNG THÀNH CÔNG';
        }
  }    
?>
