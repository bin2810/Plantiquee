<?php
  if(isset($_POST['update_frofile'])){
    include_once('../include/database.php');

    $id_user = $_POST['iduser'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Fullname = $_POST['Fullname'];
    $Email = $_POST['Email'];
    $gioitinh = $_POST['gioitinh'];
    $date = $_POST['Ngay_sinh'];
    $CCCD = $_POST['CCCD'];
    $SDT = $_POST['SDT'];
    $Address = $_POST['DiaChi'];

    // var_dump($id_user);
    // var_dump($Username);  
    // var_dump($Password);  
    // var_dump($Fullname);  
    // var_dump($Email);  
    // var_dump($gioitinh);  
    // var_dump($date);  
    // var_dump($CCCD);  
    // var_dump($SDT);  
    // var_dump($Address);
    // Kiểm tra nếu có ảnh mới được tải lên
    $hinh_cu = $_POST['hinh_cu'];
    $hinh_sp = $_FILES['hinh_moi']['error'] == 0 ? $_FILES['hinh_moi']['name'] : $hinh_cu;

    // var_dump($hinh_cu);
    if ($hinh_sp != $hinh_cu) { 
        // Upload ảnh mới
        move_uploaded_file($_FILES['hinh_moi']['tmp_name'], "../asset/img/user/$hinh_sp");
    }

    $query = 'UPDATE tb_user SET Username = :username, Fullname = :fullname, Password = :password , NgaySinh = :ngaysinh, GioiTinh = :gioitinh, DiaChi = :diachi, Email = :email, CCCD = :CCCD, SDT = :SDT, Hinhanh = :hinhanh  WHERE User_id = :id';
    $user = $conn->prepare($query);
    $user->bindParam(':username', $Username);
    $user->bindParam(':fullname', $Fullname);
    $user->bindParam(':password', $Password);
    $user->bindParam(':ngaysinh', $date);
    $user->bindParam(':gioitinh', $gioitinh);
    $user->bindParam(':diachi', $Address);
    $user->bindParam(':email', $Email);
    $user->bindParam(':CCCD', $CCCD);
    $user->bindParam(':SDT', $SDT);
    $user->bindParam(':hinhanh', $hinh_sp);
    $user->bindParam(':id', $id_user);
    $user->execute();


    if($user){
        $query_user = 'SELECT * FROM tb_user WHERE User_id = :id';
        $stmt = $conn->prepare($query_user);
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        $updated_user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Cập nhật session với dữ liệu mới
        session_start();
        $_SESSION['user']['name'] = $updated_user['Fullname'];
        $_SESSION['user']['Hinhanh'] = $updated_user['Hinhanh'];
        header('Location: settings_user_admin.php?id='.$id_user);
        }else{
        echo 'CẬP NHẬT KHÔNG THÀNH CÔNG';
        }
  }
?>