<?php
class AuthorController
{
    use Controller;
    private $author;
    function __construct()
    {
        $this->author = $this->model("AuthorModel");
    }
    function index()
    {
        $this->view("admin.Views.author.list", ["authors" => $this->author->all()]);
    }
    function newAuthor()
    {
        if (isset($_POST['btn-new'])) {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'authorName' => trim($_POST['authorName'] ?? ''),
                // err
                'authorName_err' => '',
            ];
            if (empty($data['authorName'])) {
                $data['authorName_err'] = "Bạn chưa nhập tên tác giả";
            }
            if (empty($data['authorName_err'])) {
                $result = $this->author->newAuthor($data['authorName']);
                if ($result) {
                    _redirectLo(URL . "Admin/listAuthor");
                }
            } else {
                $this->view("admin.layout.Components.author.add", ['err' => $data]);
            }
        } else {
            $data = [
                'authorName' => '',
                // err
                'authorName_err' => '',
            ];
        }
        $this->view("admin.layout.Components.author.add", ['err' => $data]);
    }
    function updateAuthor($id)
    {
        if (isset($_POST['btn-update'])) {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'authorName' => trim($_POST['authorName'] ?? ''),
                // err
                'authorName_err' => '',
            ];
            if (empty($data['authorName'])) {
                $data['authorName_err'] = "Bạn chưa nhập tên tác giả";
            }
            if (empty($data['authorName_err'])) {
                $result = $this->author->updateAuthor($data['authorName'], $id);
                if ($result) {
                    _redirectLo(URL . "Admin/listAuthor");
                }
            } else {
                $this->view("admin.layout.Components.Author.update", ['author' => $this->author->find($id), 'err' => $data]);
            }
        } else {
            $data = [
                'authorName' => '',
                // err
                'authorName_err' => '',
            ];
        }
        $this->view("admin.layout.Components.Author.update", ['author' => $this->author->find($id), 'err' => $data]);
    }
    function deleteAuthor($id)
    {

        $result = $this->author->delete($id);
        if ($result) {
            _redirectLo(URL . "Admin/listAuthor");
        }
        return false;
    }
}
