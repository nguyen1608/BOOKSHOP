<?php require_once "./app/Views/admin/layout/Components/header.php"; 
$err=$data[0];
?>
    <div class="div-update-contain">
        <div class="div-form-update">
            <form action="<?= URL?>Admin/changePassword/" method="POST" class="form-login ml-3  ">
                <h2 class="h3-login">Thay đổi mật khẩu</h2>
                <div class="div-input-box p-3">
                    <label for="">Mật khẩu cũ:</label>
                    <input type="text" name="old-password" class="form-control" style="width:500px" required>
                    <span style="color:red;font-weight:bold;font-style:i"><?=   isset( $err['old-password'])?$err['old-password'] :''?></span>
                </div>
                <div class="div-input-box p-3">
                    <label for="">Mật khẩu mới:</label>
                    <input type="password" name="new-password" class="form-control" style="width:500px" required>
                    <!-- <span style="color:red;font-weight:bold;font-style:i"><?=   $err['old-password']?$err['old-password'] :''?></span> -->
                </div>
                <div class="div-input-box p-3">
                    <label for="">Xác nhận lại mật khẩu:</label>
                    <input type="password" name="confirmPassword" class="form-control" style="width:500px" required>
                    <span style="color:red;font-weight:bold;font-style:i"><?= isset($err['confirmPassword'])?$err['confirmPassword'] :''?></span>
                </div>    

                <div class="div-input-box p-3">
                    <span style="color: seagreen; text-transform: uppercase; font-size: 20px;"><?= $_SESSION['success'] ?? '';unset($_SESSION['success'])?></span>
                </div>

                <div class="div-input-box p-3">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
<?php require_once "./app/Views/admin/layout/Components/footer.php"; ?>
