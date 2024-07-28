<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-main-content">
    <div class="swiper" style="padding: 30px;">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide" style="background-image: url(../../../../../DU_AN_1_FPT-MAIN/Public/images/product/slide1.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../DU_AN_1_FPT-MAIN/Public/images/product/slide2.jpg);background-size: contain;background-position: center;">
            </div>
            <div class="swiper-slide" style="background-image: url(../../../../../DU_AN_1_FPT-MAIN/Public/images/product/slide3.jpg);background-size: contain;background-position: center;">
            </div>
        </div>
        <!-- If we need pagination -->
    </div>

    <div class="booksite">
        <?php if(count($data['book'])):?>
    <?php 
        // print_r($data['book']);
    ?>
        <div class="div-title-banner">
            <h3><?= $data['cate']['cateName']?></h3>
        </div>
        <ul class="listbook">
            <?php foreach ($data['book'] as $book) : ?>
                <li class="li-book">
                    <a href="<?= URL ?>Home/bookDetail/<?= $book['id'] ?>/<?= $book['cateID']?>">
                        <img style="" src="../../../../../../../DU_AN_1_FPT-MAIN/Public/upload/<?= $book['image'] ?>" alt="" title="<?= $book['bookName'] ?>">
                    </a>
                    <ul class="div-popup">
                        <div class="div-content-popup">
                            <div class="div-bookname-popup">
                                <p class="p-bookname-popup"><?= $book['bookName'] ?></p>
                            </div>
                            <div class="div-infor-book">
                                <ul class="ul-infor-book">
                                    <li class="li-infor-book"><?= $book['cateName'] ?></li>
                                    <li class="li-infor-book"><?= $book['authorName'] ?></li>
                                    <li class="li-infor-book"><?= $book['dateAdded'] ?></li>
                                </ul>
                            </div>
                            <p class="p-price">
                                <a href="#" class="a-price">Mua ngay</a>
                                <a href="#" class="a-buyNow"> <?= number_format($book['price']) ?>đ</a>
                            </p>
                        </div>
                    </ul>
                </li>
            <?php endforeach ?>
            <?php else:?>
                <div style="color:sienna;text-transform: uppercase; font-size: 20px;text-align: center; padding: 20px 0;">Không tồn tại sản phẩm có danh mục <?= $data['cate']['cateName']?></div>
            <?php endif?>
        </ul>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>