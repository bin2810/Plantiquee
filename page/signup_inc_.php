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
            header("location: signup.php?error=kt_input_trong");
            exit();
        } else {
            if(strlen($newusername) < 4 || strlen($newusername) > 50){
                header('location: signup.php?error=kt_kytu_user');
                exit();
            }
            if(strlen($password) < 4 || strlen($password) > 50){
                header('location: signup.php?error=kt_kytu_pass');
                exit();
            }
            if(is_numeric($fullname)){
                header('location: signup.php?error=kt_tenso');
                exit();
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header('location: signup.php?error=kt_email_sai');
                exit();
            }
            
            if($password !== $passwordrepeat){
                header('location: signup.php?error=kt_nhaplaipass');
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
            header('location: login.php?error=kt_tontai');
            exit();
        }else {
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $query = $conn->prepare('
                INSERT INTO tb_user ( Username , Fullname , Email , Password , Hinhanh)
                VALUES (:Username , :Fullname , :Email , :Password , :Hinhanh)
            ');
            $query->bindParam(':Username' , $newusername);
            $query->bindParam(':Fullname' , $fullname);
            $query->bindParam(':Email' , $email);
            $query->bindParam(':Password' , $password_hashed);
            $query->bindValue(':Hinhanh' , "avta_user_md.jpg");
            
            $query->execute();

            header('location: login.php');
            exit();
        }
    }

?>