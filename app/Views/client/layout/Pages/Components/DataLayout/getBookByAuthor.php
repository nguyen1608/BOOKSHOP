<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-container-authorList">
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
    <div class="div-authorListMain">
        <div class="div-author-box">
           
          
            <?php foreach ($data['authors'] as $value){ ?>

                <a class="a-author-tag" href="<?= URL ?>Home/getBookByAuthor/<?=$value['authorID']?>">
                    <p class="p-authorName">
                        <?=$value['authorName']?>
                        (<?=$value['numBook']?>)
                    </p>
                </a>
                <?php  } ?>

        </div>
      <div class="div-author-bookList">
      <div class="div-title-banner-author">
        <?php if(!empty($data['author'])):?>
            <h3 style="margin-bottom: 10px;"><?= $data['author']['authorName'] ?></h3>
        <?php else:?>

            <h3>Trống</h3>
            <?php endif?>
        </div>

      <ul class="listbook">
        <?php foreach($data['books'] as $value) {?>
            <li class="li-book">
                <a href="<?= URL ?>Home/bookDetail/<?= $value['id'] ?>/<?= $value['cateID'] ?>">
                    <img style="" src="../../../../../../../Du_An_1_FPT-Main/Public/upload/<?= $value['image'] ?>" alt="" title="<?= $value['bookName'] ?>">
                </a>
                <ul class="div-popup">
                    <div class="div-content-popup">
                        <p class="p-bookname-popup"><?= $value['bookName'] ?></p>
                        <div class="div-infor-book">
                            <ul class="ul-infor-book">
                                <li class="li-infor-book"><?= $value['cateName'] ?></li>
                                <li class="li-infor-book"><?= $value['authorName'] ?></li>
                                <li class="li-infor-book"><?= $value['dateAdded'] ?></li>
                            </ul>
                        </div>
                        <p class="p-price">

                            <a href="<?= URL ?>Home/bookDetail/<?= $value['id'] ?>/<?= $value['cateID'] ?>" class="a-price"> <?= number_format($value['price']) ?></a>
                            <a href="<?= URL ?>Home/bookDetail/<?= $value['id'] ?>/<?= $value['cateID'] ?>" class="a-buyNow">Mua ngay</a>
                        </p>
                    </div>
                </ul>
            </li>
         <?php }   ?>

    </ul>
      </div>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>
