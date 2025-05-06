<main>
    <div class="container-full bg-login">
        <div class="container-center login">
            <div class="header-login">
                <p>ĐỔI MẬT KHẨU</p>
            </div>

            <div class="main-login">
                <div class="main-login-DN">
                    <form action="" method="post">
                        <table class="tb_DN">

                            <?php
                            if (isset($_POST['submit'])) {
                                $error = [];
                                $newpass = $_POST['newpass'] ?? '';
                                $repass = $_POST['repass'] ?? '';
                            
                                if ($newpass !== $repass) {
                                    $error['fail'] = 'Nhập Lại Mật Khẩu Không Khớp!';
                                } elseif (empty($newpass)) {
                                    $error['fail'] = 'Mật khẩu không được để trống!';
                                } else {
                                    $userEmail = $_SESSION['email_reset'];
                                    $pass = $newpass;
                            
                                    $sql = "UPDATE tb_user SET Password = ? WHERE Email = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute([$pass, $userEmail]);
                            
                                    $error['success'] = 'Đổi Mật Khẩu Thành Công! Chuyển hướng sau 3 giây.';
                                    header("refresh:3;url=index.php?act=login");
                                }
                            }
                            
                            ?>

                            <?php if (isset($error['fail'])) : ?>
                                <div style="color:red; text-align: center; font-size:1.6rem;padding:1.5rem; background: rgb(233, 187, 187);margin-bottom: 1rem;">
                                    <?= $error['fail'] ?>
                                </div>
                            <?php elseif (isset($error['success'])) : ?>
                                <div style="color:white; text-align: center; font-size:1.6rem;padding:1.5rem; background: green;margin-bottom: 1rem;">
                                    <?= $error['success'] ?>
                                </div>
                            <?php else: ?>
                                <div style="color: var(--PalePink-color); text-align: center; font-size:1.6rem;padding:1.5rem; background: var(--green-color);margin-bottom: 1rem;">
                                    Đổi Mật Khẩu Mới Tại Đây
                                </div>
                            <?php endif ?>

                            <tr>
                                <td><p class="title-tb">Mật Khẩu Mới</p></td>
                            </tr>
                            <tr>
                                <td><input class="input-tb" type="password" name="newpass" placeholder="Nhập Mật Khẩu Mới" required></td>
                            </tr>
                            <tr>
                                <td><input class="input-tb" type="password" name="repass" placeholder="Xác Nhận Mật Khẩu" required></td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="submit" class="btn-login">Gửi</button></td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
