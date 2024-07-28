<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-login-form">
    <div class="div-form-site">
        <form action="<?= URL ?>Home/virification" class="form-login" method="post">
            <span>Vui lòng nhập mã mà chúng tôi đã gửi về gmail của bạn</span>
            <h3 class="h3-login ml-forGetmail">Xác thực</h3>
            <div class="div-input-box">
                <input type="text" class="input-form-login" value="" name="code">
                <span class="span-label">Code</span>
            </div>
            <div class="div-input-box">
                <span style="color:red;font-weight:bold;font-style:italic"><?= $_SESSION['codeErr'] ?? ''; unset($_SESSION['codeErr']) ?></span>
                <button class="submit-btn login" type="submit">Tiếp Tục</button>
            </div>
        </form>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>