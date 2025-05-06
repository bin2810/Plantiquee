<!--  -->
        <main>
        <?php
            $error_message = '';
            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'kt_input_trong':
                        $error_message = "Vui lòng điền thông tin đăng nhập!";
                        break;
                    case 'kt_tontai':
                        $error_message = "Tài khoản không tồn tại!";
                        break;
                    case 'kt_sai_pass':
                        $error_message = "Mật khẩu không đúng!";
                        break;
                    default:
                        $error_message = "Có lỗi xảy ra, vui lòng thử lại!";
                        break;
                }
                $url = "index.php?act=login";
    echo "<script>
            history.replaceState({}, '', '$url');
          </script>";
            }
        ?>
        
            <div class="container-full bg-login">
                <div class="container-center login">
                    <div class="header-login">
                        <p>ĐĂNG NHẬP</p>
                    </div>
                    <div class="main-login">
                            <div class="main-login-DN">
                                <form action="page/login_inc_.php" method="post">
                                    <table class="tb_DN">
                                    <?php if (isset($error_message)){ ?>

                                        <tr>
                                            <td><p class="title-tb">Username:</p></td>
                                        </tr>
                                        
                                        <div style="color: red; text-align: center; font-size:1.6rem;padding:1rem;">
                                            <?=$error_message?>
                                        </div>
                                       
                                        <tr>
                                            <td><input class="input-tb" type="text" name="Username" placeholder="Username"></td>
                                        </tr>
                                        <tr>
                                            <td><p class="title-tb">MẬT KHẨU:</p></td>
                                        </tr>
                                        <tr>
                                            <td><input class="input-tb" type="password" name="Password" placeholder="Password"></td>
                                        </tr>
                                        <tr>
                                            <!-- <td><p class="link-signup"><a href="index.php?act=signup">Đăng Ký</a></p></td> -->
                                            <td><p class="link-signup"><a href="index.php?act=forgotpass">Quên Mật Khẩu</a></p></td>
                                        </tr>
                                        <tr>
                                            <td><p class="link-signup"><a href="index.php?act=signup">Đăng Ký</a></p></td>
                                            <!-- <td><p class="link-signup"><a href="index.php?act=signup">Quên Mật Khẩu</a></p></td> -->
                                        </tr>
                                        <tr>
                                            <td> <button type="submit" name="submit" class="btn-login">ĐĂNG NHẬP</button></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </main>

