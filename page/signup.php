<?php
    include_once('../include/header_user.php');
?>
    <main>
        <div class="container-full bg-login">
            <div class="container-center login">
                <div class="header-login">
                    <p class="header-login-DK" id="header-login-DK">ĐĂNG KÝ</p>
                </div>
                <div class="main-login">
                    <p class="title-login" id="title-dangky">Đăng Ký</p>
                        <div class="main-login-DK">
                            <form action="signup_inc_.php" method="POST">
                                <table class="tb_DN">
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
    
<?php
    include_once('../include/footer_user.php');
?>