<?php
  if(isset($_POST['update_user'])){
    include_once('../include/database.php');

    $id_user = $_POST['iduser'];
    $fullname = $_POST['fullname'];
    $vaitro = $_POST['vaitro'];

    var_dump($id_user);
    var_dump($fullname);  
    var_dump($vaitro);

    $query = 'UPDATE tb_user SET Fullname = :fullname, VaiTro = :vaitro WHERE User_id = :id';
    $user = $conn->prepare($query);
    $user->bindParam(':fullname', $fullname);
    $user->bindParam(':vaitro', $vaitro);
    $user->bindParam(':id', $id_user);
    $user->execute();

    if($user){
      header('Location: danhsach_user.php');
    }else{
      echo 'CẬP NHẬT KHÔNG THÀNH CÔNG';
    }
   
  }
?>