
<main>
        <div class="container-full bg-dashboard">
            <div class="container-center dashboard">
                <div class="menu-navigation-bar">
                    <ul class="menu-navigation-list">
                        <li class="menu-navigation-item"><a href="index.php?act=bangdieukien">Bảng Điều Khiển</a><i class="fa-solid fa-gauge"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=donhang">Đơn Hàng</a><i class="fa-solid fa-basket-shopping"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=phieugiamgia">Phiếu Giảm Giá</a><i class="fa-solid fa-ticket"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=diachi">Địa chỉ</a><i class="fa-solid fa-house"></i></li>
                        <li class="menu-navigation-item"><a href="index.php?act=chitiettaikhoan">Chi Tiết Tài Khoản</a><i class="fa-solid fa-user"></i></li>
                        <li class="menu-navigation-item"><a href="page/logout.php">Đăng Xuất</a><i class="fa-solid fa-right-from-bracket"></i></li>
                    </ul>
                </div>
                <div class="dashboard-content">
                    <div class="chitiettaikhoan">
                        <div class="img_chitiettaikhoan">
                            <img src="asset/img/user/<?=$_SESSION['user']['Hinhanh']?>" alt="">
                        </div>
                        <form action="include/update_user.php" method="post" id="form-thongtin" class="form-taikhoan" enctype="multipart/form-data" onsubmit="return validateEmail();">
                            <div class="form-group">
                                <label for="">HÌNH ẢNH</label>
                                <input type="file" name="hinh_moi">
                            </div>
                            <div class="form-group">
                                <label for="">HỌ VÀ TÊN</label>
                                <input type="text" name="Fullname"  value="<?=$_SESSION['user']['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="">GIỚI TÍNH</label>
                                <?php
                                    $gender = $_SESSION['user']['gender'] ?? '';
                                ?>
                                <select name="gioitinh">
                                    <option value="Nam" <?= $gender == 'Nam' ? 'selected' : '' ?>>Nam</option>
                                    <option value="Nữ" <?= $gender == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="Username" value="<?=$_SESSION['user']['Username']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">ĐỊA CHỈ</label>
                                <input type="text" name="DiaChi"  value="<?=$_SESSION['user']['DiaChi']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="Email" id="email" value="<?=$_SESSION['user']['Email']?>" placeholder="abc@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Số Điện Thoại</label>
                                <input type="number" name="SDT" id="sdt"  value="<?=$_SESSION['user']['SDT']?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                            <div class="form-group">
                                <label for="email">Ngày Sinh</label>
                                <input type="date" name="Ngay_sinh"  value="<?=$_SESSION['user']['date']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">CĂN CƯỚC CÔNG DÂN</label>
                                <input type="number" name="CCCD" id="cccd"  value="<?=$_SESSION['user']['CCCD']?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            </div>
                            
                            <div class="doimatkhau">
                                <h3>Thay đổi mật khẩu</h3>
                                <div class="form-group password-toggle-group">
                                    <label for="matkhaucu">MẬT KHẨU HIỆN TẠI</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="Password" id="matkhaucu" class="password-input" value="<?=$_SESSION['user']['Password']?>">
                                        <i class="fa-regular fa-eye toggle-password" onclick="togglePassword(this, 'matkhaucu')"></i>
                                    </div>
                                </div>
                                <div class="form-group password-toggle-group">
                                    <label for="matkhaumoi">MẬT KHẨU MỚI (ĐỂ TRỐNG ĐỂ KHÔNG THAY ĐỔI)</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="Password_new" id="matkhaumoi">
                                        <i class="fa-regular fa-eye toggle-password" onclick="togglePassword(this, 'matkhaumoi')"></i>
                                    </div>
                                </div>
                                <div class="form-group password-toggle-group">
                                    <label for="xacnhanmatkhaumoi">XÁC NHẬN MẬT KHẨU MỚI</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="Password_confirm" id="xacnhanmatkhaumoi">
                                        <i class="fa-regular fa-eye toggle-password" onclick="togglePassword(this, 'xacnhanmatkhaumoi')"></i>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_user" value="<?=$_SESSION['user']['id']?>">
                            <input type="hidden" name="hinh_cu" value="<?=$_SESSION['user']['Hinhanh']?>">
                            <div class="error-text" id="email-error"></div>
                            <div class="error-text" id="cccd-error"></div>
                            <div class="error-text" id="sdt-error"></div>
                            <button type="submit" name="update_user" class="btn-luuthaydoi">LƯU THAY ĐỔI</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>

