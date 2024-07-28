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
            <a class="navbar-brand mx-2" href="#">CẬP NHẬT TÁC GIẢ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Begin Main -->
    <main class="m-2">
        <form action="<?=URL?>/author/updateAuthor/<?=$data['author']['authorID']?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">ID</label>
                <input type="text" class="form-control" id="" placeholder="" disabled name="authorID" value="<?= $data['author']['authorID'] ?? ''?>">
            </div>
            <div class="form-group">
                <label for="">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="" placeholder="" name="authorName" value="<?= $data['author']['authorName'] ?? ''?>">
                <span class="span-err" style="color:red;font-weight:bold;font-style:i"><?= $data['err']['authorName_err'] ?? '' ?></span>
            </div>
            <div class="form-group mx-auto my-2">
                <input type="submit" name="btn-update" value="Cập Nhật" class="btn btn-primary">
                <a href="<?= URL?>Admin/listAuthor" class="btn btn-primary">Danh Sách</a>
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
<?php require_once "./app/Views/admin/layout/Components/footer.php";?>
