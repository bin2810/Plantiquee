
<main>
        <?php
           
            if (isset($_POST['submit'])) {
                $error = [];
                $email = trim($_POST['email']);
            
                // Kiểm tra rỗng
                if ($email == '') {
                    $error['email'] = "Không được để trống. Vui lòng nhập email.";
                }
            
                if (empty($error)) {
                    $sql = "SELECT * FROM tb_user WHERE Email = :email ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(['email' => $email]);
                    $user = $stmt->fetch();
            
                    if ($user) {
                        // Tồn tại email, xử lý gửi mã
                        $code = substr(rand(0,999999),0,6);
                        $title = "Quên mật khẩu";
                        $content = '
                            <div style="max-width: 600px; margin: auto; font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px; border-radius: 8px;">
                                <h2 style="color: #2b8a3e; text-align: center;">🌿 Plantiquee - Quên Mật Khẩu</h2>
                                <p>Chào bạn,</p>
                                <p>Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu từ bạn. Dưới đây là mã xác nhận:</p>
                                <div style="text-align: center; margin: 20px 0;">
                                    <span style="font-size: 28px; font-weight: bold; color: #2b8a3e; background-color: #f0f0f0; padding: 10px 20px; border-radius: 6px; display: inline-block;">' . $code . '</span>
                                </div>
                                <p>Vui lòng sử dụng mã này trong vòng <strong>5 phút</strong> để xác nhận yêu cầu.</p>
                                <hr style="margin: 20px 0;">
                                <p style="font-size: 13px; color: #777;">Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng bỏ qua email này hoặc liên hệ hỗ trợ của chúng tôi.</p>
                                <p style="font-size: 13px; color: #777;">Trân trọng,<br>Đội ngũ Plantiquee</p>
                            </div>';

                        // echo "Sending to: " . $email;

                        $mail -> sendMail($title,$content,$email);
  
                        $_SESSION['reset_code'] = $code;
                        $_SESSION['email_reset'] = $email;
                       
                        header("Location: index.php?act=verification"); 
                        exit();
                    } else {
                        $error['email'] = "Email không tồn tại trong hệ thống.";
                    }
                }
            }
        ?>
            
       
        
            <div class="container-full bg-login">
                <div class="container-center login">
                    <div class="header-login">
                        <p>QUÊN MẬT KHẨU</p>
                    </div>
                    
                    <div class="main-login">
                            <div class="main-login-DN">
                                <form action="" method="post">
                                    <table class="tb_DN">
                                   

                                        <tr>
                                            <td><p class="title-tb">Email:</p></td>
                                        </tr>
                                        
                                        <div style="color: red; text-align: center; font-size:1.6rem;padding:1rem;">
                                            <?php if(isset($error['email'])) echo $error['email']?>
                                        </div>
                                        <tr>
                                            <td><input class="input-tb" type="email" name="email" placeholder="Email"></td>
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

