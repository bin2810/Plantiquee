
    <main>
    <?php
            $error_message = '';
            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'kt_input_trong':
                        $error_message = "Vui lòng điền thông tin đăng ký!";
                        break;
                    case 'kt_kytu_user':
                        $error_message = "Username 4 ký tự trở lên!";
                        break;
                    case 'kt_kytu_pass':
                        $error_message = "Password 4 ký tự trở lên!";
                        break;
                    case 'kt_tenso':
                        $error_message = "Họ tên ko được có số!";
                        break;
                    case 'kt_email_sai':
                        $error_message = "email ko đúng định dạng!";
                        break;
                    case 'kt_nhaplaipass':
                        $error_message = "Nhập lại mật khẩu không đúng!";
                        break;
                    case 'kt_tontai_user':
                        $error_message = "Username đã tồn tại!";
                        break;
                    case 'kt_tontai_email':
                        $error_message = "Email đã tồn tại!";
                        break;
                    default:
                        $error_message = "Có lỗi xảy ra, vui lòng thử lại!";
                        break;
                }
                // history.replaceState giúp ko tải lại trang 
                $url = "index.php?act=login";
                echo "<script>
                        history.replaceState({}, '', '$url'); 
                    </script>";
            }
        ?>
        <div class="container-full bg-login">
            <div class="container-center login">
                <div class="header-login">
                    <p class="header-login-DK" id="header-login-DK">ĐĂNG KÝ</p>
                </div>
                <div class="main-login">
                    <p class="title-login" id="title-dangky">Đăng Ký</p>
                        <div class="main-login-DK">
                            <form action="page/signup_inc_.php" method="POST">
                                <table class="tb_DN">
                                <?php if (isset($error_message)){ ?>
                                    <div style="color: red; text-align: center; font-size:1.6rem;padding:1rem;">
                                            <?=$error_message?>
                                        </div>
                                <?php
                            }
                            ?>
                                    <tr>
                                        <td><p class="title-tb">USERNAME:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input class="input-tb" type="text" name="username" placeholder="Username"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><p class="title-tb">HỌ VÀ TÊN:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input class="input-tb" type="text" name="fullname" placeholder="Họ và Tên"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><p class="title-tb">EMAIL:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input class="input-tb" type="text" name="email" placeholder="Email"></td>
                                    </tr>
                                    <tr>
                                        <td><p class="error"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p class="title-tb">MẬT KHẨU:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input class="input-tb" type="password" name="password" placeholder="Mật khẩu"></td>
                                    </tr>
                                    <tr>
                                        <td><p class="error"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p class="title-tb">NHẬP LẠI MẬT KHẨU:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input class="input-tb" type="password" name="passwordrepeat" placeholder="Nhập lại mật khẩu"></td>
                                    </tr>
                                    <tr>
                                        <td><p class="error"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" name="submitdk" class="btn-login">ĐĂNG KÝ</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
    
