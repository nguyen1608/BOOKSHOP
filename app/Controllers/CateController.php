<?php

class CateController {

    use Controller;
    private $cate;
    function __construct()
    {
        $this->cate = $this->model("CateModel");
    }
    // index là nới load tất cả danh sách
    function index() {
        $this->view("admin.Views.Cate.list",["cates" => $this->cate->all()]);
    }
    // Phương thức tạo mới
    function new() {
        if(isset($_POST['btn-new'])) {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'cateName' => trim($_POST['cateName'] ?? ''),
                // err
                'cateName_err' => "",
            ];
            if(empty($data['cateName'])) {
                $data['cateName_err'] = "Bạn chưa nhập tên danh mục";
            }
            if(empty($data['cateName_err'])) {
                $result = $this->cate->new($data['cateName']);
                if($result) {
                    _redirectLo(URL."Admin/listCate");
                }
            }else{
                $this->view("admin.layout.Components.Cate.add",['err' => $data]);
            }
        }else {
            $data = [
                'cateName' => "",
                // err
                'cateName_err' => "",
            ];
        }
        $this->view("admin.layout.Components.Cate.add",['err' => $data]);
    }
    // Phương thức update
    function update($id) {
        if(isset($_POST['btn-update'])) {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'cateName' => trim($_POST['cateName'] ?? ''),
                // err
                'cateName_err' => "",
            ];
            if(empty($data['cateName'])) {
                $data['cateName_err'] = "Bạn chưa nhập tên danh mục";
            }
            if(empty($data['cateName_err'])) {
                $result = $this->cate->update($data['cateName'],$id);
                if($result) {
                    _redirectLo(URL."Admin/listCate");
                }
            }else {
                $this->view("admin.layout.Components.Cate.update",['cate' => $this->cate->getOne($id),'err' => $data]);
            }
        }else {
            $data = [
                'cateName' => "",
                // err
                'cateName_err' => "",
            ];
        }
        $this->view("admin.layout.Components.Cate.update",['cate' => $this->cate->getOne($id),'err' => $data]);
    }
    // Phương thức delete
    function delete($id) {
        $result = $this->cate->delete($id);
        if($result) {
            // header("Location".URL."Admin/listCate");
            _redirectLo(URL."Admin/listCate");
            $this->view("admin.layout.Components.Cate.add",['cates' => $this->cate->all()]);
        }
        return false;
    }

   
}
?>