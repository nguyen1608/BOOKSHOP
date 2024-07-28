<?php

class AdminController
{

    use Controller;
    protected $book;
    protected $cate;
    protected $client;
    protected $feedback;
    protected $author;
    protected $order;
    function __construct()
    {
        $this->book = $this->model("BookModel");
        $this->cate = $this->model("CateModel");
        $this->client = $this->model("UserModel");

        $this->feedback = $this->model("CmtModel");
        $this->author = $this->model("AuthorModel");
        $this->order = $this->model("OrderModel");

        if (!isset($_SESSION['userID']) || $_SESSION['role'] != 0) {
            _redirectLo(URL);
        }
    }
    function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'email' => trim($_POST['email'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),

                'email_err' => "",
                'password_err' => "",
            ];
            // validate email
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter your email";
            }
            //validate password
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter your password";
            }
            // k có lỗi 
            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->client->login($data['email']);
                if (!$user || !password_verify($data['password'], $user['password'])) {
                    $data['msgErr'] = "Thông tin tài khoản hoặc mật khẩu không chính xác";
                } else {
                    if ($_SESSION['role'] != 0) {
                        $data['msgErr'] = "Bạn không có quyền truy cập vào trong quản trị";
                    }
                    // $_SESSION['user'] = $user;
                    // if($_SESSION['role'] != 0) {
                    //     _redirectLo(URL."Admin");
                    // }
                    _redirectLo(URL . "Admin/home");
                }
            }
        } else {
            $data = [
                'email' => "",
                'password' => "",

                'email_err' => "",
                'password_err' => "",
            ];
        }
        $this->view("admin.layout.Components.Account.login", $data);
    }
    //login
    function home()
    {
        $this->view(
            "admin.layout.Components.home",
            [
                'statistical' => $this->book->statistical(),
                'books' => $this->book->loadAll(),
                'cates' => $this->cate->all(),
                'orders' => $this->order->loadAllOrder(),
                'statisticalView' => $this->book->statisticalView(),
            ]
        );
    }
    function listBook()
    {
        $page = $this->book->loadAll();
        $pages = ceil(count($page) / 6);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['btn-search'])) {
                $books = $this->book->searchBook($_POST['bookName'], $_POST['cateID']);
            }
        } else {
            $books = $this->book->loadAll();
        }
        $this->view(
            "admin.layout.Components.Book.list",
            [
                'books' => $books,
                'cates' => $this->cate->all(),
                'pages' => $pages,

            ]
        );
    }
    function listCate()
    {
        $page = $this->cate->all();
        $pages = ceil(count($page) / 6);
        // _dump($pages);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cate = $this->cate->searchCate($_POST['cateID']);
        } else {
            $cate = $this->cate->all();
        }
        $this->view(
            "admin.layout.Components.Cate.list",
            [
                'cates' => $cate,
                'pages' => $pages
            ]
        );
    }

    function listClient()
    {
        $page = $this->client->all();
        $pages = ceil(count($page) / 6);
        $this->view(
            "admin.layout.Components.Client.list",
            [
                'clients' => $this->client->all(),
                'pages' => $pages
            ]
        );
    }

    function listFeedBack()
    {
        $page = $this->feedback->loadAll();
        $pages = ceil(count($page) / 6);
        $this->view(
            "admin.layout.Components.Feedback.list",
            [
                'feedbacks' => $this->feedback->loadAll(),
                'pages' => $pages
            ]
        );
    }
    function listAuthor()
    {
        $this->view(
            "admin.layout.Components.Author.list",
            [
                'authors' => $this->author->all(),
            ]
        );
    }

    function listOrder()
    {

        $this->view(
            "admin.layout.Components.Orders.list",
            [
                'orders' => $this->order->loadAllOrder(),
            ]
        );
    }

    function statisticalView()
    {
        $this->view(
            "admin.layout.Components.statisticalView.statisticalView",
            [
                'statisticalView' => $this->book->statisticalView(),
            ]
        );
    }
    function statisticalSeller()
    {
        $this->view(
            "admin.layout.Components.statisticalSeller.statisticalSeller1",
            [
                'statisticalSeller' => $this->book->statisticalSeller(),
            ]
        );
    }
    function profile($userID)
    {
        $client = $this->client->getOneUser($userID);
        if (isset($_POST['btn-update'])) {
            $img = $client['btn-update'];
            if ($_FILES['avatar']['size'] !== 0) {
                $image = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                if ($image === 'png' || $image === 'jpg') {
                    $img = $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tpm_name'], "Public/upload" . basename($img));
                } else {
                    $_SESSION['success'] = 'Sai định dạng ảnh';
                    _redirectLo($_SERVER['HTTP_REFERER']);
                }
            } else {
                $img = $client['avatar'];
            }

            $result = $this->client->updateUser($_POST['email'], $_POST['username'], $_POST['accountName'], $_POST['address'], $_POST['phoneNumber'], $img, $userID);

            if ($result) {
                $_SESSION['success'] = 'Đã cập nhật';
                _redirectLo($_SERVER['HTTP_REFERER']);
            }
        }

        $this->view(
            "admin.layout.Components.Client.profileAdmin",
            [
                'admin' => $client,
            ]
        );
    }

    function changePassword()
    {
        $client = $this->client->getOneUser($_SESSION['userID']);
        $err = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            if (!password_verify($_POST['old-password'], $client['password'])) {
                $err['old-password'] = "Mật khẩu không đúng!";
            } else if ($_POST['old-password'] === $_POST['new-password']) {
                $err['confirmPassword'] = "Mật khẩu mới phải khác với mật khẩu cũ";
            } else if ($_POST['new-password'] !== $_POST['confirmPassword']) {
                $err['confirmPassword'] = "Mật khẩu mới và xác nhận lại mật khẩu không khớp nhau";
            } else {
                $newPass = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
                $this->client->getPassByEmail($newPass, $_SESSION['email']);
                $_SESSION['success'] = "CẬP NHẬT THÀNH CÔNG";
            }
        }
        $this->view("admin.layout.Components.Account.changepassword", [
            $err
        ]);
    }

   







}
