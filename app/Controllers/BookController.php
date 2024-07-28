<?php

class BookController
{

    use Controller;
    private $book;
    private $cate;
    private $status;
    private $author;

    function __construct()
    {
        $this->book = $this->model("BookModel");
        $this->cate = $this->model("CateModel");
        $this->status = $this->model("StatusModel");
        $this->author = $this->model("AuthorModel");
    }
    function index()
    {
        $this->view(
            "admin.layout.Components.Book.list",
            [
                'books' => $this->book->loadAll(),
                'cates' => $this->cate->all(),
            ]
        );
    }
    //Methods new 

    function new()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'cateID' => ($_POST['cateID'] ?? ''),
                'bookName' => trim($_POST['bookName'] ?? ''),
                'img' => $_FILES['image']['name'],
                'authorID' => ($_POST['authorID'] ?? ''),
                'date' => date("Y/m/d H:i:a"),
                'quantity' => trim($_POST['quantity'] ?? ''),
                'price' => trim($_POST['price'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'statusID' => ($_POST['statusID'] ?? ''),

                //err
                'cateID_err' => '',
                'bookName_err' => '',
                'img_err' => '',
                'authorID_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'description_err' => '',
                'statusID_err' => '',

            ];
            if (empty($data['cateID'])) {
                $data['cateID_err'] = "Bạn chưa chọn danh mục";
            }
            if (empty($data['bookName'])) {
                $data['bookName_err'] = "Bạn không được để trống tên sản phẩm";
            }
            if (($data['img']) == 0) {
                $data['img_err'] = "Bạn chưa chọn ảnh";
            }
            if (empty($data['authorID'])) {
                $data['authorID_err'] = "Bạn chưa chọn tác giả";
            }
            if (empty($data['quantity'])) {
                $data['quantity_err'] = "Bạn không được để trống số lượng";
            }
            if (empty($data['price'])) {
                $data['price_err'] = "Bạn không được để trống giá";
            }
            if (empty($data['description'])) {
                $data['description_err'] = "Bạn không được mô tả";
            }
            if (empty($data['statusID'])) {
                $data['statusID_err'] = "Bạn chưa chọn trạng thái";
            }
            if (empty($data['cateID_err']) && empty($data['bookName_err']) && empty($data['img_err']) && empty($data['authorID_err']) && empty($data['quantity_err']) && empty($data['price_err']) && empty($data['description_err']) && empty($data['statusID_err'])) {
                $result = $this->book->new($data['cateID'], $data['bookName'], $data['img'], $data['authorID'], $data['date'], $data['quantity'], $data['price'], $data['description'], $data['statusID']);
                move_uploaded_file($_FILES['image']['tmp_name'], "Public/upload/" . basename($data['img']));
                if ($result) {
                    _redirectLo(URL . "Admin/listBook");
                }
            } else {
                $this->view(
                    "admin.layout.Components.Book.add",
                    [
                        'cates' => $this->cate->all(),
                        'status' => $this->status->all(),
                        'authors' => $this->author->all(),
                        'err' => $data,
                    ]
                );
            }
        } else {
            $data = [
                'cateID' => '',
                'bookName' => '',
                'img' => '',
                'authorID' => '',
                'date' => '',
                'quantity' => '',
                'price' => '',
                'description' => '',
                'statusID' => '',

                //err
                'cateID_err' => '',
                'bookName_err' => '',
                'img_err' => '',
                'authorID_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'description_err' => '',
                'statusID_err' => '',
            ];
        }
        $this->view(
            "admin.layout.Components.Book.add",
            [
                'cates' => $this->cate->all(),
                'status' => $this->status->all(),
                'authors' => $this->author->all(),
                'err' => $data,
            ]
        );
    }

    //Methods Update
    function update($id)
    {
        $book = $this->book->getOne($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'cateID' => ($_POST['cateID'] ?? ''),
                'bookName' => trim($_POST['bookName'] ?? ''),
                'authorID' => ($_POST['authorID'] ?? ''),
                'date' => date("Y/m/d H:i:a"),
                'quantity' => trim($_POST['quantity'] ?? ''),
                'price' => trim($_POST['price'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'statusID' => ($_POST['statusID'] ?? ''),

                //err
                'cateID_err' => '',
                'bookName_err' => '',
                'img_err' => '',
                'authorID_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'description_err' => '',
                'statusID_err' => '',

            ];
            if (empty($data['cateID'])) {
                $data['cateID_err'] = "Bạn chưa chọn danh mục";
            }
            if (empty($data['bookName'])) {
                $data['bookName_err'] = "Bạn không được để trống tên sản phẩm";
            }
            if (empty($data['authorID'])) {
                $data['authorID_err'] = "Bạn chưa chọn tác giả";
            }
            if (empty($data['quantity'])) {
                $data['quantity_err'] = "Bạn không được để trống số lượng";
            }
            if (empty($data['price'])) {
                $data['price_err'] = "Bạn không được để trống giá";
            }
            if (empty($data['description'])) {
                $data['description_err'] = "Bạn không được mô tả";
            }
            if (empty($data['statusID'])) {
                $data['statusID_err'] = "Bạn chưa chọn trạng thái";
            }
            if ($_FILES['image']['size'] === 0) {
                $img = $book['image'];
            } else {
                $img = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "Public/upload/" . basename($img));
            }
            if (empty($data['cateID_err']) && empty($data['bookName_err']) && empty($data['img_err']) && empty($data['authorID_err']) && empty($data['quantity_err']) && empty($data['price_err']) && empty($data['description_err']) && empty($data['statusID_err'])) {
                $result = $this->book->update($data['cateID'], $data['bookName'], $img, $data['authorID'], $data['date'], $data['quantity'], $data['price'], $data['description'], $data['statusID'], $id);
                if ($result) {
                    _redirectLo(URL . "Admin/listBook");
                }
            } else {
                $this->view(
                    "admin.layout.Components.Book.update",
                    [
                        'book' => $this->book->getOne($id),
                        'cates' => $this->cate->all(),
                        'status' => $this->status->all(),
                        'authors' => $this->author->all(),
                        'err' => $data,
                    ]
                );
            }
        } else {
            $data = [
                'cateID' => '',
                'bookName' => '',
                'authorID' => '',
                'date' => '',
                'quantity' => '',
                'price' => '',
                'description' => '',
                'statusID' => '',

                //err
                'cateID_err' => '',
                'bookName_err' => '',
                'img_err' => '',
                'authorID_err' => '',
                'quantity_err' => '',
                'price_err' => '',
                'description_err' => '',
                'statusID_err' => '',
            ];
        }
        $this->view(
            "admin.layout.Components.Book.update",
            [
                'book' => $this->book->getOne($id),
                'cates' => $this->cate->all(),
                'status' => $this->status->all(),
                'authors' => $this->author->all(),
                'err' => $data,
            ]
        );
    }
    //Methods Delete
    function delete($id)
    {
        $result = $this->book->delete($id);
        if ($result) {
            // header("Location:".URL."Admin/listBook");
            _redirectLo(URL . "Admin/listBook");
            $this->view("admin.layout.Components.Book.list", ['books' => $this->book->all()]);
        }
    }
}
