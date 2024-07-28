<?php

class CartModel extends BaseModel {

    protected $table = "carts";


    //lấy sản phẩm theo clientID
    function getCartByClientID($clientID) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE clientID = ?";
            $this->_query($sql)->execute([$clientID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    // thêm sản phảm vào giỏ hàng
    function store($bookName,$clientID,$bookID,$image,$price,$quantity){
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (bookName,clientID,bookID,image,price,quantity) VALUES (?,?,?,?,?,?)";
            return $this->_query($sql)->execute([$bookName,$clientID,$bookID,$image,$price,$quantity]);
        }
    }

    // kiểm tra xem sản phảm đã có trong giỏ hàng hay chưa
    function checkCartIsset($bookID,$clientID) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE bookID = ? AND clientID = ?";
            $this->_query($sql)->execute([$bookID,$clientID]);
            $data = $this->stmt->fetch();
            return $data;
        }
    }
    // remove cart
    function removeCart($cartID) {
        if($this->table !== null) {
            $sql = "DELETE FROM $this->table WHERE cartID = ?";
            return $this->_query($sql)->execute([$cartID]);
        }else {
            return false;
        }
    }
    // update cart
    function updateCart($quantity,$cartID) {
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET quantity = ? WHERE cartID = ?";
            return $this->_query($sql)->execute([$quantity,$cartID]);
        }else {
            return false;
        }
    }
}
?>