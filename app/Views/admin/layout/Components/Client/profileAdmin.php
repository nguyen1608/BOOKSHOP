<?php require_once "./app/Views/admin/layout/Components/header.php";?>

<div class="div-update-contain">
    <div class="div-form-update">
        <form action="<?= URL ?>Admin/profile/<?= $data['admin']['clientID'] ?>" class="form-login ml-3" method="post" enctype="multipart/form-data">
            <h2 class="h3-login">Profile</h3>
            
            <div class="div-main-profile row  ">
                <div class="div-avt col ">
                    <div class="div-input-box ">
                        <div class="div-img">
                            <img width="600px" height="550px" name="avatar" src="../../Public/upload/<?= $data['admin']['avatar'] ?>" alt="">
                        </div>
                        
                        <input type="file" name="avatar" class="mt-3"  style="width: 100%" value="">
                        
                    </div>
                </div>
                <div class="div-input-site col">
                    
                    <div class="div-input-box p-3">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" class="input-form-login"  value="<?= $data['admin']['email'] ?? '' ?>" required>
                    </div>

                    <div class="div-input-box p-3">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" class="input-form-login" value="<?= $data['admin']['username'] ?? '' ?>" required>
                       
                    </div>

                    <div class="div-input-box p-3">
                        <label for="">AccountName</label>
                        <input type="text" name="accountName" class="form-control" class="input-form-login" value="<?= $data['admin']['accountName'] ?? '' ?>" required>
                      
                    </div>

                    <div class="div-input-box p-3">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" class="input-form-login" value="<?= $data['admin']['address'] ?? '' ?>" required>
                       
                    </div>

                    <div class="div-input-box p-3">
                        <label for="">Number</label>
                        <input type="text" name="phoneNumber" class="form-control" value="<?= $data['admin']['phoneNumber'] ?? '' ?>" required>
                        
                    </div>
                    
                    <div>
                        <p><?= $_SESSION['success'] ?? ''; unset($_SESSION['success'])?></p>
                    </div>

                    <div class="div-input-box p-3">
                        <button class="btn btn-primary" name="btn-update" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once "./app/Views/admin/layout/Components/footer.php";?>
