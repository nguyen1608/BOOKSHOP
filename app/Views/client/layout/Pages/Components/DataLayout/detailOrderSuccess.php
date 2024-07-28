<?php
_dump($data['detailOrderSuccess']);
?>
<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<?php if (!isset($_SESSION['userID'])) : ?>
    <div class="div-container-cart">
        <div class="div-main-cart">
            <div class="cart-empty">
                <img src="../../../../../../../DuAn1-FPT/Public/images/product/cart_empty.png" alt="">
            </div>
            <div style="text-align: center;" class="content_cart-empty">
                <h4>Giỏ hàng đang cảm thấy trống trải</h4>
                <span>Ai đó ơi, mua sắm để nhận khuyến mãi ngay nào!</span>
                <a href="<?= URL ?>Home" class="submit-btn">Mua sắm ngay</a>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="div-checkContainer">
        <div class="div-mainCheck">
            <h1 class="h3-checkCart">CHI TIẾT ĐƠN HÀNG ĐÃ ĐƯỢC GIAO THÀNH CÔNG</h1>
            <table class="table-checkCart">
                <thead class="thead-checkCart">
                    <th class="th-checkCart">Mã Đơn Hàng</th>
                    <th class="th-checkCart">Ngày Mua</th>
                    <th class="th-checkCart">Tiêu Đề</th>
                    <th class="th-checkCart">Giá</th>
                </thead>
                <tbody>
                    <?php if (count($data['detailOrderSuccess']) > 0) : ?>
                        <?php foreach ($data['detailOrderSuccess'] as $detailOrderSuccess) : ?>
                            <?php if($detailOrderSuccess['statusID'] == 5) :?>
                            <tr class="tr-checkCart">
                                <td class="td-checkCart"><?= "#P" . $detailOrderSuccess['orderDetailID'] ?? '' ?></td>
                                <td class="td-checkCart"><?= $detailOrderSuccess['dateBuy'] ?? '' ?></td>
                                <td class="td-checkCart"><?= $detailOrderSuccess['bookName'] ?? '' ?></td>
                                <td class="td-checkCart"><?= number_format($detailOrderSuccess['priceOrder']) ?? '' ?></td>
                            </tr>
                            <?php endif?>
                        <?php endforeach ?>
                    <?php else : ?>
                        <div class="div-main-cart">
                            <div class="cart-empty">
                                <img src="../../../../../../../DuAn1-FPT/Public/images/product/cart_empty.png" alt="">
                            </div>
                            <div style="text-align: center;" class="content_cart-empty">
                                <h4>Giỏ hàng đang cảm thấy trống trải</h4>
                                <span>Ai đó ơi, mua sắm để nhận khuyến mãi ngay nào!</span>
                                <a href="<?= URL ?>Home" class="submit-btn">Mua sắm ngay</a>
                            </div>
                        </div>

                    <?php endif ?>
                </tbody>
            </table>
            <button style="padding: 5px;border-radius: 30px;border: none;color: #ffffff;background-color: #046307;"><a href="<?= URL?>">QUAY LẠI ĐỂ MUA SẮM</a></button>
        </div>
    </div>
<?php endif ?>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>