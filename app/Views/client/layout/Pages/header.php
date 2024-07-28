<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
    <link rel="shortcut icon" href="Public/images/banner/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= URL?>/Public/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="../../../../../../DuAn1-FPT/Public/images/product/black-up-arrow-png-22.png" alt=""></button>
    <div class="div-container">
        <header>
            <div class="div-introduct">
                <a class="anchor-a" href="#">GIỚI THIỆU</a>
                <a class="anchor-a" href="<?= URL?>Home/searchOrder">TÌM KIẾM ĐƠN HÀNG</a>
                <a class="anchor-a" href="<?= URL ?>Home/checkOrder">KIỂM TRA ĐƠN HÀNG</a>
            </div>
            <div class="div-login-site">
                <?php if (!isset($_SESSION['userID'])) : ?>
                    <a class="anchor-a" href="<?= URL ?>Home/login">ĐĂNG NHẬP</a>
                    <a class="anchor-a" href="<?= URL ?>Home/register">ĐĂNG KÝ</a>
                <?php elseif (isset($_SESSION['username']) && $_SESSION['role'] == 0) : ?>
                    <a class="anchor-a" href="<?= URL ?>Home/destroy">ĐĂNG XUẤT</a>
                    <a class="anchor-a" href="<?= URL ?>Admin/Home">ADMIN</a>

                    <!-- <div class="p-setting anchor-a " style="display: inline;" href="#"><img class="img-setting" src="../../../../../../DuAn1-FPT/Public/images/product/settings-icon-13.png" alt="">
                        <div class="ul-setting">
                            <p class="li-setting"><?= $_SESSION['username'] ?? '' ?></p>
                            <p class="li-setting"><a href="">LogOut</a></p>

                        </div>
                    </div> -->
                <?php else : ?>
                    <a href="#" style="position: relative;" class="user">
                        Xin chào <p style="display: inline-block;text-transform: uppercase;"><?= isset($_SESSION['userID']) ? $_SESSION['username'] : '' ?></p>
                        <div class="p-setting" style="display: inline;" href="#"><img class="img-setting" src="<?= URL?>/Public/images/product/settings-icon-13.png" alt="">
                            <ul class="ul-setting">
                                <li class="li-setting"><a class="anchor-a" style="border-right: none;" href="<?= URL ?>Home/updateUser/<?= $_SESSION['userID'] ?>">Thông tin tài khoản</a></li>
                                <li class="li-setting"><a class="anchor-a" style="border-right: none;" href="<?= URL ?>Home/forgetPassword">Quên mật khẩu</a></li>
                                <li class="li-setting"><a class="anchor-a" style="border-right: none;" href="<?= URL ?>Home/destroy">ĐĂNG XUẤT</a></li>
                            </ul>
                        </div>
                    </a>
                    <!-- <a class="anchor-a" href="<?= URL ?>Home/updateUser/<?= $_SESSION['userID'] ?>">TÀI KHOẢN</a> -->
                <?php endif ?>
            </div>
        </header>
        <div class="div-banner">
            <a href="<?= URL ?>Home">
                <p class="p-title-banner" style="font-family: 'Dancing Script', serif;">Bởi vì sách là cả thế giới</p>
                <img src="<?= URL?>/Public/images/product/banner.png" alt="" class="img-banner">
            </a>
            <div class="div-searchsite">
                <a href="<?= URL ?>Home/getCartByClientID" class="cart">
                    <div class="div-buble-cart">
                        <p><?= $data['countCarts'] ?? 0?></p>
                        <!-- <p>0</p> -->
                    </div>
                </a>
                <form action="<?= URL ?>Home/loadBookSearch" method="post">
                    <input type="text" class="search-box" placeholder="Tìm kiếm sách của bạn..." name="bookName" required>
                    <input type="image" type="submit" name="search-btn" src="<?= URL?>/Public/images/product/searchbg.png" value="Tìm kiếm" class="search-btn">
                </form>
            </div>
        </div>
        <div class="div-nav">
            <ul class="ul-nav">
                <li class="li-nav"><a href="#">DANH MỤC SÁCH</a>
                    <ul class="ul-child-list">
                        <?php foreach ($data['cates'] as $cate) : ?>

                            <li class="li-child-list"><a href="<?= URL ?>Home/bookFollowCategories/<?= $cate['id'] ?? '' ?>"><?= $cate['cateName'] ?? '' ?></a>
                                <!-- <ul class="ul-child-last-list">
                                <li class="li-child-last-list">Tác phẩm 1</li>
                                <li class="li-child-last-list">Tác phẩm 2</li>
                                <li class="li-child-last-list">Tác phẩm 3</li>
                            </ul> -->
                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li class="li-nav"><a href="<?= URL ?>Home/loadBookView">SÁCH CÓ LƯỢT XEM NHIỀU NHẤT</a></li>
                <li class="li-nav"><a href="<?= URL ?>Home/loadAuthor">Tác giả</a></li>
                <li class="li-nav"><a href="<?= URL ?>Home/_contact">LIÊN HỆ</a></li>
            </ul>
        </div>