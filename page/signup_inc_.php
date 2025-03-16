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

        $query = "SELECT Username,Email FROM tb_user WHERE Username = :Username OR Email = :Email";
        $stmt = $conn ->prepare($query);
        $stmt->bindValue(':Username' , $newusername);
        $stmt->bindValue(':Email' , $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // var_dump($user);


        if($user){
            header('location: ../index.php?act=signup&error=kt_tontai');
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