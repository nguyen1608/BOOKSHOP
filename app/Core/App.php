<?php

class App {

    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];


    function __construct()
    {
        $url = $this->urlProcess();
        // Xử lý Controller 
        if(isset($url[0])) { // Kiểm tra xem $url[0] có tồn tại không
            // Nếu $url[0] tồn tại thì kiểm tra xem file trong folder Controllers với giá trị $url[0] đc truyền
            // ở trên thanh trình duyệt có trùng với file ở trong Controllers không
            if(file_exists("./app/Controllers/".$url[0]."Controller.php")) {
                // nếu đúng thì thay đổi thuộc tính của controller thành giá trị của $url[0]
                $url[0] .= "Controller";
                $this->controller = $url[0];
            }
            // Sau khi lấy thực hiện xong thì hủy để có thể lấy đc giá trị params cho chính xác
            unset($url[0]);
        }
        // Sau đó sẽ require 
        require_once "./app/Controllers/".$this->controller.".php";
        // Khởi tạo thực thể
        $this->controller = new $this->controller;
        // Xử lý Action
        if(isset($url[1])) { // Tiếp tục kiểm tra xem $url[1] có tồn tại không
            // Trả về true thì kiểm tra phương thức ở trong Controllers đã require_once ở trên tồn tại không
            if(method_exists($this->controller, $url[1])) {
                // nếu tồn tại thì thay đổi giá trị của action thành giá trị lấy đc ở trên
                $this->action = $url[1];
            }
            // Sau khi lấy thực hiện xong thì hủy để có thể lấy đc giá trị params cho chính xác
            unset($url[1]);
        }
        //  Xử lý Params
        // Nếu $url tồn tại thì lấy giá trị trong mảng $url còn không thì trả ra mảng rỗng
        $this->params = $url ? array_values($url) : [];
        // call_user_func_array để gọi một phương thức của đối tượng
        // Tham số đầu là 1 phương thức cần gọi , tham số thứ 2 là 1 mảng các giá trị đc truyền vào
        call_user_func_array([$this->controller,$this->action],$this->params);
    }


    private function urlProcess() {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = filter_var(ucfirst(strtolower(trim($url))) , FILTER_SANITIZE_URL);
            $urlNew = explode("/",$url);
            return $urlNew;
        }
    }
}
?>