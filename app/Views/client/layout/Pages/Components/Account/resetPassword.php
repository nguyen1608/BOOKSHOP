<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-login-form">
    <div class="div-form-site">
        <form action="<?= URL ?>Home/resetPassword" class="form-login" method="post">
            <h3 class="h3-login ml-forGetmail">Thay đổi mật khẩu</h3>
            <div class="div-input-box">
                <input type="password" class="input-form-login" value="" name="passwordNew" required>
                <span class="span-label">Mật khẩu mới</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic">
                    <?= $_SESSION['password_err'] ?? '';
                    unset($_SESSION['password_err']) ?>
                </span>
            </div>
            <div class="div-input-box">
                <input type="password" class="input-form-login" value="" name="passwordRepeat" required>
                <span class="span-label">Nhập lại mật khẩu</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic">
                    <?= $_SESSION['password_err'] ?? '';
                    unset($_SESSION['password_err']) ?>
                </span>
            </div>
            <div class="div-input-box">
                <button class="submit-btn login" type="submit">Tiếp Tục</button>
            </div>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>