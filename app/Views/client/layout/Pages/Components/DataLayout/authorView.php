<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-container-authorList">
<div class="swiper" style="padding: 30px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->

            <div class="swiper-slide" style="background-image: url(../../../../../../Du_An_1_FPT-Main/Public/images/product/slide1.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../../Du_An_1_FPT-Main/Public/images/product/slide2.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../../Du_An_1_FPT-Main/Public/images/product/slide3.jpg);background-size: contain;background-position: center;">
            </div>
        </div>
        <!-- If we need pagination -->
    </div>
    <div class="div-authorListMain">
        <div class="div-author-box">
            <?php foreach ($data['authors'] as $value) { ?>

                <a class="a-author-tag" href="<?= URL ?>Home/getBookByAuthor/<?= $value['authorID'] ?>">
                    <p class="p-authorName">
                        <?= $value['authorName'] ?>
                        (<?= $value['numBook'] ?>)
                    </p>
                </a>
            <?php  } ?>

        </div>
        <div class="div-author-bookList">
            <div class="div-title-banner-author">
                <h3 style="margin-bottom: 10px;"><?= $data['author']['authorName'] ?></h3>
            </div>
            <ul class="listbook">
                <li class="li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $data['author']['authorID'] ?>/<?= $data['author']['cateID'] ?>">
                        <img style="" src="../../../../../../Du_An_1_FPT-Main/Public/upload/<?= $data['author']['image'] ?>" alt="" title="<?= $data['author']['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <div class="div-bookname-popup">
                                <p class="p-bookname-popup"><?= $data['author']['bookName'] ?></p>
                            </div>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $data['author']['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $data['author']['authorName'] ?></li>
                                    <li class="li-infor-book"><?= $data['author']['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <a href="<?= URL ?>Home/bookDetail/<?= $data['author']['id'] ?>/<?= $data['author']['cateID'] ?>" class="a-price">Mua ngay</a>
                                <a href="<?= URL ?>Home/bookDetail/<?= $data['author']['id'] ?>/<?= $data['author']['cateID'] ?>" class="a-buyNow"> <?= number_format($data['author']['price']) ?>đ</a>
                            </p>
                        </div>
                    </ul>
                </li>
        </div>
    </div>
</div>


<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>