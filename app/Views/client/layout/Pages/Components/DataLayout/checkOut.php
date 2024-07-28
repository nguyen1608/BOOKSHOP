<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<div class="div-checkout-container">
    <div class="div-checkout-main">
        <a id="linkHome" hidden href="<?=URL?>Home"></a>
        <?php if (isset($_SESSION['msgOrderSuccess'])) : ?>
            <h2 class=" h2-checkout">
                <?= $_SESSION['msgOrderSuccess'] ?? '';
                unset($_SESSION['msgOrderSuccess']) ?> 
                <span id="redirect"></span>
            </h2>
        <?php else : ?>
            <form action="<?= URL ?>Home/checkOut" method="post">
                <div class="div-infor-checkout">
                    <h4 style="">Thông tin người mua</h4>
                    <div class="div-infor site">
                        <table class="table-infor">
                            <thead class="thead-infor">
                                <th>Họ tên </th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                            </thead>
                            <tbody>
                                <tr class="tr-infor">
                                    <td><input type="text" class="inputDis" name="username" id="" value="<?= $_SESSION['username'] ?? '' ?>" disabled></td>
                                    <td><input type="text" class="inputDis" name="email" id="" value="<?= $_SESSION['email'] ?? '' ?>" disabled></td>
                                    <td><input type="text" class="inputDis" name="phoneNumber" id="" value="<?= $_SESSION['phone'] ?? '' ?>" disabled></td>
                                    <td><input type="text" class="inputDis" name="address" id="" value="<?= $_SESSION['address'] ?? '' ?>" disabled></td>
                                </tr>
                            </tbody>
                        </table>
                        <h2>Thông tin sản phẩm</h2>
                        <table class="table-checkout">
                            <thead class="thead-checkout">
                                <th>STT</th>
                                <th>Book Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                foreach ($_SESSION['carts'] as $key => $value) :
                                    $subtotal = ($value['quantity'] * $value['price']);
                                    $total += $subtotal;
                                ?>
                                    <tr>
                                        <td class="td-checkOut"><?= $key + 1 ?></td>
                                        <td class="td-checkOut"><?= $value['bookName'] ?? '' ?></td>
                                        <td class="td-checkOut"><?= number_format($value['price'] ?? '') ?></td>
                                        <td class="td-checkOut"><?= $value['quantity'] ?? '' ?></td>
                                        <td class="td-checkOut"><?= number_format($subtotal) ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr style="border-top: 1px solid #ccc;">
                                    <td class="td-checkOut"></td>
                                    <td class="td-checkOut"></td>
                                    <td class="td-checkOut"></td>
                                    <td class="td-checkOut">Phí vận chuyển</td>
                                    <td class="td-checkOut">Free</td>
                                </tr>
                                <tr>
                                    <td class="td-checkOut"></td>
                                    <td class="td-checkOut"></td>
                                    <td class="td-checkOut"></td>
                                    <td class="td-checkOut"><strong>Tổng cộng</strong></td>
                                    <td class="td-checkOut"><?= number_format($total) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h2 class="h2-checkout">
                    <button type="submit" name="submit-checkout">Xác nhận thanh toán </button>
                </h2>
            </form>
        <?php endif ?>
    </div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>