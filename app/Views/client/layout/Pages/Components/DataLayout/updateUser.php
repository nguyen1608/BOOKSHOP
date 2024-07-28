<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>

<div class="div-update-contain">
    <div class="div-form-update">
        <form action="<?= URL ?>Home/updateUser/<?= $data['user']['clientID'] ?>" class="form-login" method="post" enctype="multipart/form-data">
            <h3 class="h3-login">Thông tin tài khoản</h3>

            <div class="div-main-profile">
                <div class="div-avt">
                    <div class="div-input-box p-3">
                        <div class="div-img">
                            <img class="img-avt" src="../../../../../../../DuAn1-FPT/Public/upload/<?= $data['user']['avatar'] ?>" alt="">
                        </div>


                        <input type="file" id="file-img" name="avatar" class="custom-file-input" style="width: 100%" value="">


                        <div style="margin-top: 10px; padding-left: 35px;">
                            <p style="color: red;"><?= $data['error'] ?? '' ?></p>
                            <p style="color: #28a745;"><?= $_SESSION['success'] ?? '' ?></p>
                            <?php
                            if (isset($_SESSION['timeout']) && $_SESSION['timeout'] < time()) {
                                unset($_SESSION['success']);
                                unset($_SESSION['timeout']);
                                header('Location: ' . $_SERVER['PHP_SELF']);
                                // exit();
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="div-input-site p-3">
                    <div class="div-input-box">
                        <input type="text" name="email" class="input-form-login" value="<?= $data['user']['email'] ?? '' ?>" required>
                        <span class="span-label">Email</span>
                        <!-- <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['email_err'] ?? '' ?></span> -->
                    </div>

                    <div class="div-input-box p-3">
                        <input type="text" name="username" class="input-form-login" value="<?= $data['user']['username'] ?? '' ?>" required>
                        <span class="span-label">Họ và tên</span>
                        <!-- <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['username'] ?? '' ?></span> -->
                    </div>

                    <div class="div-input-box p-3">
                        <input type="text" name="accountName" class="input-form-login" value="<?= $data['user']['accountName'] ?? '' ?>" required>
                        <span class="span-label">Tên tài khoản</span>
                        <!-- <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['accountName'] ?? '' ?></span> -->
                    </div>

                    <!-- <div class="div-input-box">
                <input type="text" name="password" class="input-form-login" value="<?= $data['user']['password'] ?? '' ?>" required>
                <span class="span-label">Password</span>
                <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['password'] ?? '' ?></span>
            </div> -->

                    <div class="div-input-box p-3">
                        <input type="text" name="address" class="input-form-login" value="<?= $data['user']['address'] ?? '' ?>" required>
                        <span class="span-label">Địa chỉ</span>
                        <!-- <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['address'] ?? '' ?></span> -->
                    </div>

                    <div class="div-input-box p-3">
                        <input type="text" name="phoneNumber" class="input-form-login" value="<?= $data['user']['phoneNumber'] ?? '' ?>" required>
                        <span class="span-label">Số điện thoại</span>
                        <!-- <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['phoneNumber'] ?? '' ?></span> -->
                    </div>


                    <div class="div-input-box">
                        <button class="submit-btn update" name="btn-update" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>