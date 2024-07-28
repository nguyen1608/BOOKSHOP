<?php require_once "./app/Views/admin/layout/Components/header.php";?>
<!doctype html>
<html lang="en">

<head>
  <title>Danh Mục Khách Hàng</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body>
    <header>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand mx-2" href="<?= URL?>Admin/listClient">DANH SÁCH KHÁCH HÀNG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        
    </header>

    <main class="m-2" style="overflow:auto">
       
        <table class="table text-center " >
            <thead class="table-dark">
                <tr>
                    <th scope="col" class=" p-3 w-20 text-nowrap">#</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap">Tên Khách Hàng</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap">Account</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap">Email</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap">Địa Chỉ</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap">Số Điện Thoại</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap">Ảnh</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap">Vai Trò</th>
                    <th scope="col" class=" p-3 w-20 text-nowrap" colspan="2" style="text-align: center;">Action</th>
                </tr>
            </thead>

            <tbody>
                 
                <?php foreach($data['clients'] as $client): ?>
                    <tr>
                        <th scope="row" class=" p-3 w-20 text-nowrap"><?= $client['clientID']?></th>
                        <th scope="row" class=" p-3 w-20" ><?= $client['username']?></th>
                        <th scope="row" class=" p-3 w-20 text-nowrap"><?= $client['accountName']?></th>
                        <th scope="row" class=" p-3 w-20 text-nowrap"><?= $client['email']?></th>
                        <th scope="row" class=" p-3 w-20"><?= $client['address']?></th>
                        <th scope="row" class=" p-3 w-20 text-nowrap"><?= $client['phoneNumber']?></th>
                        <th><img src="<?= URL?>/Public/upload/<?= $client['avatar'] ?>" alt="." style="height: 100px;"></th>
                        <th scope="row" class=" p-3 w-20 text-center"><?= $client['role']?></th>
                        <th><a href="<?= URL?>User/update/<?= $client['clientID']?>" class="btn btn-info">Update</a></th>
                        <th><a href="<?= URL?>User/delete/<?= $client['clientID']?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?')">Delete</a></th>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $data['pages']; $i++) { ?>
                <li class="page-item"><a class="page-link" href="<?= URL?>Admin/listClient/<?= $i?>"><?= $i ?></a></li>
                <?php } ?>
            <!-- <li class="page-item"><a class="page-link" href="">1</a></li> -->
      </ul>
    </nav>

    </main>

    <footer>

    </footer>
</body>
</html>
<?php require_once "./app/Views/admin/layout/Components/footer.php";?>
