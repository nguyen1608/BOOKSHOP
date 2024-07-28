<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-main-content">
    <div class="swiper" style="padding: 30px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->

            <div class="swiper-slide" style="background-image: url(../../../../../../../Du_An_1_FPT-Main/Public/images/product/slide1.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../../../Du_An_1_FPT-Main/Public/images/product/slide2.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../../../Du_An_1_FPT-Main/Public/images/product/slide3.jpg);background-size: contain;background-position: center;">
            </div>
        </div>
        <!-- If we need pagination -->
    </div>

    <div>
        <div class="div-title-banner">
            <h3>SÁCH CÓ LƯỢT XEM NHIỀU NHẤT</h3>
        </div>
        <ul class="listbook">
            <?php foreach ($data['viewBook'] as $viewBook) : ?>
                <li class="li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $viewBook['id'] ?>/<?= $viewBook['cateID'] ?>">
                        <img style="" src="../../../../../../../Du_An_1_FPT-Main/Public/upload/<?= $viewBook['image'] ?>" alt="" title="<?= $viewBook['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <p class="p-bookname-popup"><?= $viewBook['bookName'] ?></p>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $viewBook['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $viewBook['authorName'] ?></li>
                                    <li class="li-infor-book"><?= $viewBook['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <div  class="p-price">
                                <a href="<?= URL ?>Home/bookDetail/<?= $viewBook['id'] ?>/<?= $viewBook['cateID'] ?>" class="a-price"><?= number_format($viewBook['price']) ?></a>
                                <a href="<?= URL ?>Home/bookDetail/<?= $viewBook['id'] ?>/<?= $viewBook['cateID'] ?>" class="a-buyNow">Mua ngay</a>
            </div>
                        </div>
                    </ul>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>