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
            <h3>Kết quả tìm kiếm</h3>
        </div>
        <ul class="listbook">
            <?php if (isset($data['bookSearch']) && count($data['bookSearch']) > 0) : ?>
                <?php foreach ($data['bookSearch'] as $bookSearch) : ?>
                    <li class="li-book">
                        <a href="<?= URL ?>Home/bookDetail/<?= $bookSearch['id'] ?>/<?= $bookSearch['cateID'] ?>">
                            <img style="" src="../../../../../../../Du_An_1_FPT-Main/Public/upload/<?= $bookSearch['image'] ?>" alt="" title="<?= $bookSearch['bookName'] ?>">
                        </a>
                        <ul class="div-popup">
                            <div class="div-content-popup">
                                <p class="p-bookname-popup"><?= $bookSearch['bookName'] ?></p>
                                <div class="div-infor-book">
                                    <ul class="ul-infor-book">
                                        <li class="li-infor-book"><?= $bookSearch['cateName'] ?></li>
                                        <li class="li-infor-book"><?= $bookSearch['authorName'] ?></li>
                                        <li class="li-infor-book"><?= $bookSearch['dateAdded'] ?></li>
                                    </ul>
                                </div>
                                <p class="p-price">

                                    <a href="#" class="a-price"> <?= number_format($bookSearch['price']) ?></a>
                                    <a href="#" class="a-buyNow">Mua ngay</a>
                                </p>
                            </div>
                        </ul>
                    </li>
                <?php endforeach ?>
            <?php else : ?>
                <!-- <div style="text-align: center;margin-bottom: 50px; text-transform: uppercase; font-size: 18px;">Không có sản phẩm mà bạn muốn tìm</div> -->
                <div class="search-not-found">
                    <img src="../../../../../../../../Du_An_1_FPT-Main/Public/images/banner/search-not-found.png" alt="">
                </div>
            <?php endif ?>
        </ul>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>