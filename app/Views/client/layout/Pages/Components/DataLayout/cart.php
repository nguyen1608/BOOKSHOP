<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>

<div class="div-container-cart">
    <img src="" alt="">
    <div class="div-main-cart">
        <?php if (count($_SESSION['carts']) > 0) : ?>
            <table class="table-cart">
                <h2>Giỏ hàng của bạn: </h2>
                <div class="đây là msg thông báo khi người dùng đã xóa giỏ hàng">
                    <?= $_SESSION['msgDelSuccessCart'] ?? '';
                    unset($_SESSION['msgDelSuccessCart']) ?>
                </div>
                <div class="đây là msg thông báo khi người dùng update giỏ hàng thành công">
                    <?= $_SESSION['msgUpdateCartSuccess'] ?? '';
                    unset($_SESSION['msgUpdateCartSuccess']) ?>
                </div>
                <thead class="thead-title">
                    <tr class="tr-title">
                        <td class="td-cart"></td>
                        <td class="td-cart">Tiêu đề</td>
                        <td class="td-cart">Giá</td>
                        <td class="td-cart">Số lượng</td>
                        <td class="td-cart">Ảnh</td>
                        <td class="td-cart">Tổng Tiền</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['carts'] as $cart) : ?>
                        <tr class="tr-cart">
                            <td class="td-cart"><a href="<?= URL ?>Home/delCart/<?= $cart['cartID'] ?>" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')"><button class="deleteBtn" style="cursor: pointer;font-weight: 900;">X</button></a></td>
                            <td class="td-cart"><?= $cart['bookName'] ?? '' ?></td>
                            <td class="td-cart"><?= number_format($cart['price'] ?? '') ?></td>
                            <td class="td-cart">
                                <form action="<?= URL ?>Home/updateCart/<?= $cart['cartID'] ?>" class="form-CountPrd" method="post">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="subtracts-cart"></button>
                                    <input type="number" value="<?= $cart['quantity'] ?>" min="1" style="-webkit-appearance: none;" name="quantity">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus-cart"></button>
                                    <button class="updateBtn" id="updateCart" type="submit" name="btn-updateCart" style="cursor: pointer;">Update</button>
                                </form>
                            </td>
                            <td class="td-cart"><img src="../../../../../../../Du_An_1_FPT-Main/Public/upload/<?= $cart['image'] ?? '' ?>" alt=""></td>
                            <td class="td-cart" style="border-bottom:none;padding-top: 100px;"><?= number_format($cart['quantity'] * $cart['price']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <button class="button-paying"><a href="<?= URL ?>HOME/checkOut" style="text-decoration: none;">Tiến hành thanh toán</a></button>
        <?php else : ?>
            <div class="cart-empty">
                <img src="../../../../../../../Du_An_1_FPT-Main/Public/images/product/cart_empty.png" alt="">
            </div>
            <div style="text-align: center;" class="content_cart-empty">
                <h4>Giỏ hàng đang cảm thấy trống trải</h4>
                <span>Ai đó ơi, mua sắm để nhận khuyến mãi ngay nào!</span>
                <a href="<?= URL?>Home" class="submit-btn">Mua sắm ngay</a>
            </div>
        <?php endif ?>
    </div>
</div>

<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>