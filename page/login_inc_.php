<?php
require_once('../include/database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = $_POST['Username']; // có thể là username hoặc email
    $password = trim($_POST['Password']);

    if (empty($input) || empty($password)) {
        header("location: ../index.php?act=login&error=kt_input_trong");
        exit();
    }

    $query = $conn->prepare('
        SELECT *
        FROM tb_user
        WHERE Username = :input OR Email = :input
    ');
    $query->bindValue(':input', $input);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header('location: ../index.php?act=login&error=kt_tontai');
        exit();
    } else {
        if ($password == $user['Password']) { // bạn nên dùng password_hash() và password_verify() nhé!
            session_start();
            $_SESSION['user']['id'] = $user['User_id'];
            $_SESSION['user']['Username'] = $user['Username'];
            $_SESSION['user']['name'] = $user['Fullname'];
            $_SESSION['user']['Password'] = $user['Password'];
            $_SESSION['user']['date'] = $user['NgaySinh'];
            $_SESSION['user']['gender'] = $user['GioiTinh'];
            $_SESSION['user']['CCCD'] = $user['CCCD'];
            $_SESSION['user']['SDT'] = $user['SDT'];
            $_SESSION['user']['DiaChi'] = $user['DiaChi'];
            $_SESSION['user']['VaiTro'] = $user['VaiTro'];
            $_SESSION['user']['Email'] = $user['Email'];
            $_SESSION['user']['Hinhanh'] = $user['Hinhanh'];

            if (isset($_SESSION['user']['VaiTro']) && $_SESSION['user']['VaiTro'] == "user") {
                header('location: ../index.php?act=dashboard');
                exit();
            } else {
                header('location: ../admin/');
                exit();
            }
        } else {
            header("location: ../index.php?act=login&error=kt_sai_pass");
            exit();
        }
    }
}
?>
