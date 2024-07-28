<?php require_once "./app/Views/client/layout/Pages/header.php"; ?>
<?php if (!isset($_SESSION['userID'])) : ?>
    <div class="div-container-cart">
        <div class="div-main-cart">
            <div class="cart-empty">
                <img src="<?= URL?>/Public/images/product/cart_empty.png" alt="">
            </div>
            <div style="text-align: center;" class="content_cart-empty">
                <h4>Giỏ hàng đang cảm thấy trống trải</h4>
                <span>Ai đó ơi, mua sắm để nhận khuyến mãi ngay nào!</span>
                <a href="<?= URL ?>Home" class="submit-btn">Mua sắm ngay</a>
            </div>
        </div>
    </div>
    <?php else : ?>
<div class="div-container-orderSearch">
<div class="div-main-orderSearch">
<div class="div-header-orderSearch">
    <h2 class="h2-orderSearch">Tìm kiếm đơn hàng </h2>
<form action="<?= URL?>Home/searchOrder" class="form-orderSearch" method="post">
<input class="input-orderSearch" type="text" name="orderID" placeholder="Tìm kiếm..." required>
<input class="btn" type="submit" name="btn-searchOrder" value="Tìm Kiếm">

</form>
</div>

<div class="div-content-orderSearch">
<?php
if($data['result'] && count($data['result']) > 0) : ?>
    <div class="div-imgBookOrder">
        <img src="<?= URL?>/Public/upload/<?= $data['result']['image'] ?>" alt="">
        
    </div>
    <div class="div-content">
        <p><strong>Tên sách</strong> : <?=$data['result']['bookName']?></p>
        <p class="p-quantity">
           Só lượng : <?=$data['result']['quantity']?>
        </p>
        <p><strong>Đơn giá</strong> : <?=number_format($data['result']['priceOrder'])?></p>
        <p><strong>Thành tiền</strong> : <?=number_format($data['result']['sumPriceOrder'])?></p>
        <p><strong>Ngày mua : </strong><?=$data['result']['dateBuy']?></p>
        <p><strong>Tình trạng : </strong><?=$data['result']['statusOrderName']?></p>
    </div>
    
 
   
   <?php else : ?>
   <p>Hãy nhập mã đơn hàng của bạn để tra cứu</p>

<?php endif ?>
<?php endif ?>
    
</div>
</div>
</div>
<?php require_once "./app/Views/client/layout/Pages/footer.php"; ?>