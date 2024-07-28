<?php require_once "./app/Views/admin/layout/Components/header.php";?>
<!doctype html>
<html lang="en">

<head>
  <title>Danh Mục</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <!-- Begin Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand mx-2" href="#">DANH SÁCH ĐƠN HÀNG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </header>
  <!-- End Header -->

  <!-- Begin Main -->
  <main class="m-2">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">MÃ ĐƠN HÀNG</th>
          <th scope="col">TÊN KHÁCH HÀNG</th>
          <!-- <th scope="col">SỐ LƯỢNG</th>
          <th scope="col">GIÁ</th> -->
          <th scope="col">NGÀY ĐẶT HÀNG</th>
          <th scope="col">TRẠNG THÁI</th>
          <th scope="col" colspan="" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($data['orders']) > 0):?>
        <?php foreach ($data['orders'] as $order) : ?>
          <tr>
            <td scope="row"><?= $order['id'] ?></td>
            <td scope="row"><?= $order['clientName'] ?></td>
            <!-- <td scope="row"><?= $order['quantity'] ?></td>
            <td scope="row"><?= number_format($order['priceOrder']) ?></td> -->
            <td scope="row"><?= $order['dateBuy'] ?></td>
            <td scope="row"><?= $order['statusOrderName'] ?></td>
            <td>
                <a href="<?= URL?>Order/detailOrder/<?= $order['id']?>" class="btn btn-info">Chi Tiết</a>
            </td>
          </tr>
        <?php endforeach ?>
        <?php else:?>
        <div>Không có sản phẩm bạn muốn tìm</div>
          <?php endif?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
      <ul class="pagination">
        <!-- <?php for ($i = 1; $i <= $data['pages']; $i++) { ?>
            <li class="page-item"><a class="page-link" href="<?= URL?>Admin/listCate?page=<?= $i?>"><?= $i ?></a></li>
            <?php } ?> -->
            <li class="page-item"><a class="page-link" href="">1</a></li>
      </ul>
    </nav>
  </main>
  <!-- End Main -->

  <!-- Begin Footer -->
  <footer>
  </footer>
  <!-- End Footer -->

</body>

</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php";?>
