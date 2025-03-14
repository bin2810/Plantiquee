<?php
    include_once('../include/header_user.php');
?>
        <main>
            <div class="container-full bg-login">
                <div class="container-center login">
                    <div class="header-login">
                        <p>ĐĂNG NHẬP</p>
                        <!-- <p class="header-login-DK" id="header-login-DK">ĐĂNG KÝ</p> -->
                    </div>
                    <div class="main-login">
                            <div class="main-login-DN">
                                <form action="login_inc_.php" method="post">
                                    <table class="tb_DN">
                                        <tr>
                                            <td><p class="title-tb">Username:</p></td>
                                        </tr>
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
                                            <td><p class="link-signup"><a href="signup.php">Đăng Ký</a></p></td>
                                        </tr>
                                        <tr>
                                            <td> <button type="submit" name="submit" class="btn-login">ĐĂNG NHẬP</button></td>
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