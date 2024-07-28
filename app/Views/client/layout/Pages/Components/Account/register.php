<?php require_once "./app/Views/client/layout/Pages/header.php";?>
<div class="div-login-form">
    <div class="div-formSignIn-site">
        <form action="<?= URL?>Home/register" class="form-login" method="post">
            <center>
                <div style="color: seagreen; text-transform: uppercase; font-size: 20px;"><?= $data['msgSuccess'] ?? ''?></div>
            </center>
            <h3 class="h3-login">Đăng Ký</h3>
            <div class="div-input-box">
            <input type="email" name="email" class="input-form-login" value="<?= $data['email'] ?? ''?> " required>
                <span class="span-label">Email :</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['email_err'] ?? '' ?></span>
            </div>
            <div class="div-input-box">
            <input type="text" name="username" class="input-form-login" value="<?= $data['username'] ?? ''?>" required>
                <span class="span-label">Họ và tên :</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['username_err'] ?? ''?></span>
            </div>
            <div class="div-input-box">
            <input type="text" name="accountName" class="input-form-login" value="<?= $data['accountName'] ?? ''?>" required>
                <span class="span-label">Tên tài khoản :</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['accountName_err'] ?? ''?></span>
            </div>
            <div class="div-input-box">
            <input type="password" name="password" class="input-form-login" value="<?= $data['password'] ?? ''?>" required>
                <span class="span-label">Mật khẩu :</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['password_err'] ?? ''?></span>
            </div>
            <div class="div-input-box">
            <input type="password" name="passwordRepeat" class="input-form-login" value="<?= $data['passwordRepeat'] ?? ''?>" required>
                <span class="span-label">Xác nhận mật khẩu :</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['passwordRepeat_err'] ?? '' ?></span>
            </div>
            <div class="div-input-box">
            <input type="text" name="phoneNumber" class="input-form-login" value="<?= $data['phoneNumber'] ?? ''?>" required>
                <span class="span-label">Số điện thoại :</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['phoneNumber_err'] ?? ''?></span>
            </div>
            <div class="div-input-box">
            <input type="text" name="address" class="input-form-login" value="<?= $data['address'] ?? ''?>" required>
                <span class="span-label">Địa chỉ :</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['address_err'] ?? ''?></span>
            </div>
            <div class="div-input-box">
                <button class="submit-btn signin" type="submit">Đăng Ký</button>
            </div>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php";?>
