<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-bg">
    <div class="div-main-contact">
        <h2 class="h2-contact">
            LIÊN HỆ

        </h2>
        <div class="div-contact-content" style="display: flex;gap: 40px; ">
            <p class="p-contact-main">
                Trường Cao Đẳng FPT Polytechnic
                <br>
                <strong>Địa chỉ</strong>: Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội
                <br>
                <strong>Liên hệ</strong>:(024) 8582 0808
                <br>
                <strong>Email</strong>:fpt.edu.tw@gmail.com
            </p>
            <iframe style="width: 60%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14895.455922776757!2d105.7467871!3d21.0381278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1680016327868!5m2!1svi!2s" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="div-feedbackUs" style="">
            <form action="<?= URL ?>Home/login" class=""  method="post">
                <h3 class="h3-login" style="padding-bottom:20px;">Góp ý thêm về chúng tôi</h3>
              
                <div class="div-input-box">
                    <input type="text" class="input-form-login" style="width: 200%;left: -70px;height: 100px;" value="<?= $data['password'] ?? '' ?>" name="password" required>
                    <span class="span-label" style="left: -40px;border-bottom: none;">Đóng góp ý kiến của bạn tại đây:</span>
                    <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['password_err'] ?? '' ?></span>
                </div>
                <div class="div-input-box" style="display: flex;justify-content: flex-end;width: 150%;">
                    <button class="submit-btn " style="width: 100px;" type="submit">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>