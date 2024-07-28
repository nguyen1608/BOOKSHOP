<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-main-content">
    <div class="detail-content">
        <div class="detail-row flex">
            <div>
                <img src="<?= URL?>/Public/upload/<?= $data['book']['image'] ?>" alt="img" />
            </div>
            <div>
                <h2 class="detail-title">
                    <?= $data['book']['bookName'] ?>
                </h2>
                <div class="flex detail-info">
                    <ul class="detail-ul">
                        <li>Mã sản phẩm: <a href="#"> <?= $data['book']['id'] ?></a></li>
                        <li>Số Lượng:
                            <a href="#"> <?= $data['book']['quantity'] > 0 ? $data['book']['quantity'] : "Hết Hàng"?></a>
                        </li>
                        <li>Tác giả: <a href="#"><?= $data['book']['authorName'] ?></a></li>
                        <li>Lượt xem: <?= $data['book']['view'] ?></li>
                        <!-- <li>Dịch giả: <a href="#">Hoàng Đức Long</a></li>
                        <li>Nhà xuất bản: <a href="#">Thế Giới</a></li>
                        <li>Số trang: 622</li>
                        <li>Kích thước: 15.5x24 cm</li> -->
                        <li>Ngày phát hành: <?= $data['book']['dateAdded'] ?></li>
                    </ul>
                    <div>
                        <form action="" method="post">
                            <span>Giá bìa: <span class="price-old">150.000đ</span></span>
                            <span class="shop-pr">Giá : <?= number_format($data['book']['price']) ?>đ (Đã có VAT)</span>
                            <div class="q">
                                <span>SỐ LƯỢNG:</span>
                                <div class="flex e">
                                    <div class="quantity">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="subtracts"></button>
                                        <input id="input-detail" type="number" value="1" min="1" style="-webkit-appearance: none;" name="quantity">
                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                    </div>
                                    <div>
                                        <button class="detail-btn" type="submit" name="btn-add-cart" style="cursor: pointer;">Thêm vào giỏ hàng</button>
                                        <!-- <button class="detail-btn" type="submit" name="btn-buy-cart">Mua ngay</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div style="margin-top: 10px; color:tomato">
                            <?= $_SESSION['msgCartIsset'] ?? '';
                            unset($_SESSION['msgCartIsset']) ?>
                        </div>
                        <div style="margin-top: 10px; color:tomato">
                            <?= $_SESSION['quantity_err'] ?? '';
                            unset($_SESSION['quantity_err']) ?>
                        </div>
                        <!-- <div style="margin-top: 10px;">
                            <?= $data['quantity_err'] ?? '' ?>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-if">
            <h3>Giới thiệu sách</h3>
            <span>
                <?= $data['book']['description'] ?>
            </span>
        </div>

        <div class="div-recommend-book">
            <div class="dt">
                <span class="detail-title2">SÁCH CÙNG DANH MỤC</span>
            </div>
            <div class="bookRecommend flex col-gap-20">
                <!-- <div style="width: 20%; flex-wrap: wrap;"> -->
                <?php if (count($data['similarBook']) > 0) : ?>
                    <?php foreach ($data['similarBook'] as $similarBook) : ?>
                        <div class="content">
                            <a href="<?= URL ?>Home/bookDetail/<?= $similarBook['id'] ?>/<?= $similarBook['cateID'] ?>">
                                <img style="" src="<?= URL?>/Public/upload/<?= $similarBook['image'] ?>" alt="" title="<?= $similarBook['bookName'] ?>">
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div>Không có sản phẩm cùng danh mục</div>
                <?php endif ?>
                <!-- </div> -->
            </div>
        </div>

        <div>
            <div class="dt">
                <span class="detail-title2">Bình luận</span>
            </div>
            <div class="flex col-gap-20">
                <div class="box-comment">
                    <form action="" method="post" id="comment-form">
                        <input type="text" name="note" id="comment" placeholder="Comment here..." class="input-comment">
                        <span class="span-err" style="color:red;font-weight:bold;font-style:italic"><?= $data['note_err'] ?? '' ?></span>
                        <input type="submit" value="POST" class="btn-comment" id="submit-comment" name="btn-comment">
                    </form>
                    <div id="result-comment">
                        <?php if (count($data['comments']) > 0) : ?>
                            <?php foreach ($data['comments'] as $cmt) : ?>
                                <ul class="list-result-cmt">
                                    <div class="box-item-cmt">
                                        <li class="p-result-cmt"><img src="<?= URL?>/Public/upload/<?= $cmt['avatar'] ?>" alt="ảnh này" style="width: 100%;"></li>
                                        <li class="item-result"><?= $cmt['username'] ?? '' ?></li>
                                    </div>
                                    <li class="item-result-cmt"><?= $cmt['note'] ?? '' ?></li>
                                    <li class="item-result-cmt"><?= $cmt['dateCreated'] ?></li>
                                    <?php if (isset($_SESSION['userID']) && $_SESSION['userID'] === $cmt['clientID']) { ?>
                                        <li class="item-result-cmt"><a href="<?= URL ?>Home/removeCmt/<?= $cmt['id'] ?>" onclick="return confirm('Are you sure?')">Xóa</a></li>
                                    <?php } ?>
                                </ul>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                    <div style="font-size: 18px; color:tomato">
                        <?= $_SESSION['msgCmtEmpty'] ?? '';
                        unset($_SESSION['msgCmtEmpty']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>