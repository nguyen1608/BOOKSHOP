<?php

class OrderModel extends BaseModel {

    protected $table = "orders";
    protected $sub_table = "orderDetail";
    
    
    // lấy thông tin trong bảng orders
    function loadAllOrder() {
        if($this->table !== null && $this->sub_table !== null) {
            // $sql = $this->_sqlOrder() . " ORDER BY $this->table.id DESC";
            $sql = "SELECT $this->table.id, $this->table.clientName,$this->table.dateBuy,statusOrders.statusOrderName 
            FROM $this->table 
            LEFT JOIN statusOrders ON $this->table.statusID = statusOrders.id ORDER BY $this->table.id DESC";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    // chi tiết đơn hàng admin

    function detailOrder($orderID) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = $this->_sqlOrder() . " WHERE $this->table.id = ?";
            $this->_query($sql)->execute([$orderID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    function detailOrderSuccess($orderID) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = $this->_sqlOrder() . " WHERE $this->sub_table.id = ?";
            $this->_query($sql)->execute([$orderID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    function getInfoUser($clientID) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = "SELECT * FROM $this->table WHERE clientID = ?";
            $this->_query($sql)->execute([$clientID]);
            $data = $this->stmt->fetch();
            return $data;
        }
        
    }

    //cập nhật trạng thái đơn hàng
    function updateStatus($status,$orderID) {
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET $this->table.statusID = ? WHERE $this->table.id = ?";
            $this->_query($sql)->execute([$status,$orderID]);
            return true;
        }
    }
    //Load order details phía client
    function loadOrderClient($clientID) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = $this->_sqlOrder(). " WHERE $this->table.clientID = ? ORDER BY $this->table.id DESC ";
            $this->_query($sql)->execute([$clientID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }

    // 
    function store($clientID,$dateBuy,$clientName,$address,$phone,$carts) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = "INSERT INTO $this->table(clientID,dateBuy,clientName,address,phoneNumber) VALUES(?,?,?,?,?)";
            $this->_query($sql)->execute([$clientID,$dateBuy,$clientName,$address,$phone]);
            $orderID = $this->connect->lastInsertId();
            // _dump($sql);_dump($orderID);
            // _dump($clientID);die;
            $sql = "INSERT INTO $this->sub_table(orderID,bookID,quantity,price) VALUES(?,?,?,?)";
            // $this->stmt = $this->_query($sql);
            foreach($carts as $itemCart) {
                $this->_query($sql)->execute([$orderID,$itemCart['bookID'],$itemCart['quantity'],$itemCart['price']]);
            }
            return true;
        }
    }


    //lấy chi tiết sản phẩm
    function oneOrder($orderID) {
        if($this->table !== null) {
            $sql = $this->_sqlOrder(). " WHERE $this->table.id = ?";
            $this->_query($sql)->execute([$orderID]);
            $data = $this->stmt->fetch();
            return $data;
        }
    }
    function delete($id) {
        if($this->table !== null) {
            $sql = "DELETE FROM $this->sub_table WHERE id = ?";
            return $this->_query($sql)->execute([$id]);
        }
        return false;
    }
    // Tìm kiếm đơn hàng phía user
    function searchOrder($data,$id) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = "SELECT *
            FROM orderDetail 
            JOIN books ON orderDetail.bookID = books.id
            JOIN orders ON orderDetail.orderID = orders.id
            WHERE orders.clientID = '$id'
            AND bookName LIKE '%$data%'";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetch();
            return $data;
        }
    }
    // _
    function _sqlOrder() {
        $sql = "SELECT $this->sub_table.id AS orderDetailID,$this->table.id AS orderID
        ,$this->sub_table.quantity,$this->sub_table.price AS priceOrder
        ,($this->sub_table.price * $this->sub_table.quantity) AS sumPriceOrder
        ,books.bookName,books.image,$this->table.dateBuy
        ,$this->table.clientID,$this->table.clientName
        ,$this->table.statusID,statusOrders.statusOrderName,clients.phoneNumber,clients.address,clients.email 
        FROM $this->sub_table 
        LEFT JOIN $this->table ON $this->sub_table.orderID = $this->table.id 
        LEFT JOIN books ON $this->sub_table.bookID = books.id 
        LEFT JOIN statusOrders ON $this->table.statusID = statusOrders.id 
        LEFT JOIN clients ON clients.clientID = $this->table.clientID";
        return $sql; 
    }
}
?>