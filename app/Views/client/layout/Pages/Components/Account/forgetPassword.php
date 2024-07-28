<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-login-form">
    <div class="div-form-site w-fit">
        <form action="<?= URL ?>Home/forgetPassword" class="form-login" method="post">
            <h3 class="h3-login ml-forGetmail">Quên Mật Khẩu</h3>
            <div class="div-input-box">
                <input type="text" class="input-form-login " value="<?= $data['email'] ?? '' ?>" name="email" required>
                <span class="span-label">Email</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $_SESSION['email_err'] ?? ''; unset($_SESSION['email_err']) ?></span>
            </div>
            <div class="div-input-box">
                <button class="submit-btn login" type="submit">Tiếp Tục</button>
            </div>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>