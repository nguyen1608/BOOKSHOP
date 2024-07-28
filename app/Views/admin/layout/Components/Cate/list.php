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
      <a class="navbar-brand mx-2" href="<?= URL?>Admin/listCate">DANH SÁCH DANH MỤC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
    <form action="<?= URL?>Admin/listCate" method="POST">
      <h6 class="mx-2">Tìm Kiếm Danh Mục</h6>
      <div class="form-group  mx-2">
        <select name="cateID" id="" class="form-control">
          <option value="" selected> -- Tất Cả -- </option>
          <?php foreach ($data['cates'] as $cate) : ?>
            <option value="<?= $cate['id'] ?>"><?= $cate['cateName'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group mx-2 my-2">
        <input type="submit" value="Tìm Kiếm" name="btn-search" class="btn btn-info">
        <a href="<?= URL?>Cate/new" class="btn btn-primary">Thêm mới</a>
      </div>
    </form>
  </header>
  <!-- End Header -->

  <!-- Begin Main -->
  <main class="m-2">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col" colspan="2" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if(count($data['cates']) > 0):?>
        <?php foreach ($data['cates'] as $cate) : ?>
          <tr>
            <td scope="row"><?= $cate['id'] ?></td>
            <td scope="row"><?= $cate['cateName'] ?></td>
            <td><a href="<?= URL?>Cate/update/<?= $cate['id']?>" class="btn btn-info">Update</a></td>
            <td><a href="<?= URL?>Cate/delete/<?= $cate['id']?>" onclick="return confirm('Bạn có muốn xóa không?');" class="btn btn-danger">Delete</a></td>
          </tr>
        <?php endforeach ?>
        <?php else:?>
        <div>Không có sản phẩm bạn muốn tìm</div>
          <?php endif?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
      <ul class="pagination">
        <?php for ($i = 1; $i <= $data['pages']; $i++) { ?>
            <li class="page-item"><a class="page-link" href="<?= URL?>Admin/listCate?page=<?= $i?>"><?= $i ?></a></li>
            <?php } ?>
            <!-- <li class="page-item"><a class="page-link" href="">1</a></li> -->
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
