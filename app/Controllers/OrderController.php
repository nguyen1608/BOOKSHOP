<?php

class OrderController
{

    use Controller;
    private $statusOrder;
    private $order;
    private $mail;
    function __construct()
    {
        $this->order = $this->model("OrderModel");
        $this->statusOrder = $this->model("StatusOrderModel");
        $this->mail = new Mailer();
    }
    function detailOrder($orderID)
    {
        $order = $this->order->detailOrder($orderID);
        // _dump($order);?\
        $oneOrder = $this->order->oneOrder($orderID);
        // _dump($oneOrder);
        $userOrder = $this->order->getInfoUser($oneOrder['clientID']);
        // _dump($userOrder);
        $this->view(
            "admin.layout.Components.Orders.detailOrder",
            [
                'order' => $order,
                'userOrder' => $userOrder,
                'statusOrders' => $this->statusOrder->all(),
            ]
        );
    }
    // update status order
    function updateStatusOrder($orderID)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $_POST = filter_input_array(INPUT_POST);
            if (isset($_POST['updateStatus'])) {
                $data = [
                    'statusID' => trim($_POST['statusID'] ?? ''),
                ];
                $result = $this->order->updateStatus(status: $data['statusID'], orderID: $orderID);
                $emailOrder = $this->order->oneOrder($orderID);
                if ($result) {
                    // _dump($emailOrder);die;
                    $title = "Đơn hàng mua sắm của bạn trên website nhasach.com đã được duyệt với mã đơn hàng là: " . $orderID;
                    $content = "Trạng thái đơn hàng của bạn là: " . $emailOrder['statusOrderName'].
                    "<br>Vui lòng truy cập vào đường link sau để xem chính xác trạng thái đơn hàng của bạn.
                    <br><strong>Xin trân thành cảm ơn</strong>
                    <br> Xác nhận đơn hàng ".URL."Home/checkOrder";
                    $this->mail->sendMail($title, $content, $emailOrder['email']);
                    _redirectLo($_SERVER['HTTP_REFERER']);
                    
                } else {
                    return false;
                }
            }
        }
    }
}
