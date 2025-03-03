<?php
    require_once('../include/database.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $newusername = $_POST['Username'];
        $password = trim($_POST['Password']);
        // var_dump($newusername,$password);

        if(empty($newusername) || empty($password)){
            header("location: login.php?error=kt_input_trong");
            exit();
        } else {
            if(strlen($newusername) < 4 || strlen($newusername) > 50){
                header('location: login.php?error=kt_kytu_user');
                exit();
            }
            if(strlen($password) < 4 || strlen($password) > 50){
                header('location: login.php?error=kt_kytu_pass');
                exit();
            }
        }

        $query = $conn -> prepare('
            SELECT Username, Fullname , Password , VaiTro , Hinhanh
            FROM tb_user
            WHERE Username = :Username
        ');
        $query -> bindValue(':Username', $newusername);
        $query-> execute();
        $user = $query ->fetch(PDO::FETCH_ASSOC);

        if(!$user){
            header('location: login.php?error=kt_tontai');
            exit();
        }else {
            // var_dump($password);
            // var_dump($user['Password']);
            if(password_verify($password, $user['Password'])){
                
                
                session_start();
                $_SESSION['user']['name'] = $user['Fullname'];
                $_SESSION['user']['VaiTro'] = $user['VaiTro'];
                $_SESSION['user']['Email'] = $user['Email'];
                $_SESSION['user']['Hinhanh'] = $user['Hinhanh'];
                
                if(isset($_SESSION['user']['VaiTro']) && $_SESSION['user']['VaiTro'] == "user"){
                    header('location: ../page/user_dashboard.php');
                    exit();
                } else{
                    header('location: ../admin/');
                        exit();
                    }
                } else {
                    // header('location: login.php?error=kt_password');
                    // exit();
                    echo"sai con mẹ nó rồi";
                }
            }
    }

?>