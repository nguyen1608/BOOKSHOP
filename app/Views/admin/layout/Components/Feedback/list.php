<?php require_once "./app/Views/admin/layout/Components/header.php";?>
<!doctype html>
<html lang="en">

<head>
  <title>Danh Sách Bình Luận</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand mx-2" href="">DANH SÁCH BÌNH LUẬN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </header>
 


  <main class="m-2">
    <table class="table text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col" class=" p-3 w-20 text-nowrap" >#</th>
          <th scope="col" class=" p-3 w-20 text-nowrap">Note</th>
          <th scope="col" class=" p-3 w-20 text-nowrap">Tên Sách</th>
          <th scope="col" class=" p-3 w-20 text-nowrap">Khách Hàng</th>
          <th scope="col" class=" p-3 w-20 text-nowrap">Ngày Bình Luận</th>
          <th scope="col" class=" p-3 w-20 text-nowrap" colspan="1" style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>

          <?php foreach ($data['feedbacks'] as $feedback) : ?>
            <tr>
              <td scope="row"><?= $feedback['id'] ?></td>
              <td scope="row"><?= $feedback['note'] ?></td>
              <td scope="row"><?= $feedback['bookName'] ?></td>
              <td scope="row"><?= $feedback['username'] ?></td>
              <td scope="row"><?= $feedback['dateCreated'] ?></td>
              <td><a href="<?= URL?>FeedBack/delete/<?= $feedback['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?');" class="btn btn-danger">Delete</a></td>
            </tr> 
          <?php endforeach ?>

      </tbody>
    </table>

    <nav aria-label="Page navigation example" style="display: flex; justify-content: center;">
      <ul class="pagination">
        <?php for ($i = 1; $i <= $data['pages']; $i++) { ?>
            <li class="page-item"><a class="page-link" href="<?= URL?>Admin/listFeedBack/page/<?= $i?>"><?= $i ?></a></li>
            <?php } ?>

      </ul>
    </nav>
  </main>
 
  <footer>
  </footer>
 

</body>

</html>
<?php

// _dump($data['pages']);
?>
<?php require_once "./app/Views/admin/layout/Components/footer.php";?>
