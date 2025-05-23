<?php
    require_once('../include/database.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $newusername = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordrepeat = $_POST['passwordrepeat'];
        
        // var_dump($newusername,$fullname,$email,$password,$passwordrepeat);
        
        if(empty($newusername) || empty($fullname) || empty($email) || empty($password)|| empty($passwordrepeat)){
            header("location: ../index.php?act=signup&error=kt_input_trong");
            exit();
        } else {
            if(strlen($newusername) < 4 || strlen($newusername) > 50){
                header('location: ../index.php?act=signup&error=kt_kytu_user');
                exit();
            }
            if(!preg_match('/^[a-zA-Z0-9_]+$/', $newusername)){
                header('location: ../index.php?act=signup&error=kt_user_ki_tu_dac_biet');
                exit();
            }
            if(strlen($password) < 4 || strlen($password) > 50){
                header('location: ../index.php?act=signup&error=kt_kytu_pass');
                exit();
            }
            if(is_numeric($fullname)){
                header('location: ../index.php?act=signup&error=kt_tenso');
                exit();
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('location: ../index.php?act=signup&error=kt_email_sai');
                exit();
            }
            
            if($password !== $passwordrepeat){
                header('location: ../index.php?act=signup&error=kt_nhaplaipass');
                exit();
            }
        }


        $query_user = "SELECT Username,Email FROM tb_user WHERE Username = :Username";
        $stmt_user = $conn ->prepare($query_user);
        $stmt_user->bindValue(':Username' , $newusername);
        $stmt_user->execute();

        $user = $stmt_user->fetch(PDO::FETCH_ASSOC);

        $query_email = "SELECT Username,Email FROM tb_user WHERE Email = :Email";
        $stmt_email = $conn ->prepare($query_email);
        $stmt_email->bindValue(':Email' , $email);
        $stmt_email->execute();

        $email_check = $stmt_email->fetch(PDO::FETCH_ASSOC);

        // var_dump($user);

        if($user){
            header('location: ../index.php?act=signup&error=kt_tontai_user');
            exit();
        }elseif($email_check){
            header('location: ../index.php?act=signup&error=kt_tontai_email');
            exit();
        }else {
            $query = $conn->prepare('
                INSERT INTO tb_user ( Username , Fullname , Email , Password , Hinhanh)
                VALUES (:Username , :Fullname , :Email , :Password , :Hinhanh)
            ');
            $query->bindParam(':Username' , $newusername);
            $query->bindParam(':Fullname' , $fullname);
            $query->bindParam(':Email' , $email);
            $query->bindParam(':Password' , $password);
            $query->bindValue(':Hinhanh' , "avta_md_user.jpg");
            
            $query->execute();

            header('location: ../index.php?act=login');
            exit();
        }
    }

?>