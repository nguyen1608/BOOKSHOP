<?php

class BaseModel {
    use Database;
    protected $table = null;
    protected $stmt;

    // Methods load all data
    function all() {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
        return false;
    }


    // Methods load data theo id
    function getOne($id) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE id = ?";
            $this->_query($sql)->execute([$id]);
            $data = $this->stmt->fetch();
            return $data;
        }
        return false;
    }

   

    // Methods delete
    function delete($id) {
        if($this->table !== null) {
            $sql = "DELETE FROM $this->table WHERE id = ?";
            return $this->_query($sql)->execute([$id]);
        }
        return false;
    }

    // function deleteClient($id) {
    //     if($this->table !== null) {
    //         $sql = "DELETE FROM $this->table WHERE clientID = ?";
    //         return $this->_query($sql)->execute([$id]);
    //     }
    //     return false;
    // }

    // Methods nạp câu truy vấn
    protected function _query($sql) {
        $this->stmt = $this->connect->prepare($sql);
        return $this->stmt;
    }
}
?>