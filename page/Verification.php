
        <main>
            <div class="container-full bg-login">
                <div class="container-center login">
                    <div class="header-login">
                        <p>NHẬP MÃ XÁC NHẬN</p>
                    </div>
                    
                    <div class="main-login">
                            <div class="main-login-DN">
                                <form action="" method="post">
                                    <table class="tb_DN">
                                    <?php
                                    // echo($_SESSION['reset_code']);
                                        if(isset($_POST['submit'])){
                                            $error = [];
                                            if($_POST['text'] != $_SESSION['reset_code']){
                                                $error['fail'] = 'Mã xác nhận ko hợp lệ !';
                                            }else{
                                                header('location: index.php?act=Resetpass');
                                            }
                                        }
                                    
                                    ?>

                                    <?php if(isset($error['fail'])) :?>
                                        <div style="color:red; text-align: center; font-size:1.6rem;padding:2rem 1rem; background: rgb(233, 187, 187);margin-bottom: 1rem;">
                                           <?=$error['fail']?>
                                        </div>
                                        <?php else: ?>
                                            <div style="color: var(--PalePink-color); text-align: center; font-size:1.6rem;padding:2rem 1rem; background: var(--green-color);margin-bottom: 1rem;">
                                                Hãy Nhặp Mã Xác Nhận Mà Chúng Tôi Đã Gửi Cho Bạn Về Gmail
                                            </div>
                                    <?php endif?>
                                        <tr>
                                            <td><p class="title-tb">Nhập mã</p></td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td><input class="input-tb" type="text" name="text" placeholder="Nhập Mã Xác Minh"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td> <button type="submit" name="submit" class="btn-login">Gửi</button></td>
                                        </tr>
                                       
                                    </table>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </main>

