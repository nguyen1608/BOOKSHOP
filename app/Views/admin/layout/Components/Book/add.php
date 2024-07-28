<?php require_once "./app/Views/admin/layout/Components/header.php"; ?>
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
            <a class="navbar-brand mx-2" href="#">THÊM MỚI SẢN PHẨM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Begin Main -->
    <main class="m-2">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" class="form-control" id="" placeholder="" disabled>
            </div>
            <div class="form-group">
                <label for="">Loại Hàng</label>
                <select class="form-control" id="" name="cateID">
                    <?php foreach ($data['cates'] as $cate) : ?>
                        <option value="<?= $cate['id'] ?>"><?= $cate['cateName'] ?></option>
                    <?php endforeach ?>
                </select>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['cateID_err'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Trạng Thái</label>
                <select class="form-control" id="" name="statusID">
                    <?php foreach ($data['status'] as $status) : ?>
                        <option value="<?= $status['id'] ?>"><?= $status['statusName'] ?></option>
                    <?php endforeach ?>
                </select>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['statusID_err'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Tác Giả</label>
                <select class="form-control" id="" name="authorID">
                    <?php foreach ($data['authors'] as $author) : ?>
                        <option value="<?= $author['authorID'] ?>"><?= $author['authorName'] ?></option>
                    <?php endforeach ?>
                </select>
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['authorID_err'] ?? '' ?></span>
            </div>

            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="" placeholder="" name="bookName">
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['bookName_err'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" id="" placeholder="" name="image">
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['img_err'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Số Lượng</label>
                <input type="text" class="form-control" id="" placeholder="" name="quantity">
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['quantity_err'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="text" class="form-control" id="" placeholder="" name="price">
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['price_err'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" class="form-control" id="" placeholder="" name="description">
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['description_err'] ?? '' ?></span>
            </div>
            <div class="form-group mx-auto my-2">
                <input type="submit" name="btn-new" value="Thêm Mới" class="btn btn-primary">
                <a href="<?= URL ?>Book" class="btn btn-primary">Danh Sách</a>
            </div>
        </form>
    </main>
    <!-- End Main -->

    <!-- Begin Footer -->
    <footer>
    </footer>
    <!-- End Footer -->

</body>

</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php"; ?>