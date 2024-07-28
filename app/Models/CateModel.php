<?php

class CateModel extends BaseModel{

    // use BaseModel;
    protected $table = "categories";


    //Methods tạo mới
    function new($cateName) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (cateName) VALUES (?)";
            return $this->_query($sql)->execute([$cateName]);
        }
    }

    // Methods update
    function update($cateName,$id){
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET cateName = ? WHERE id = ?";
            // _dump($sql);die;
            return $this->_query($sql)->execute([$cateName,$id]);
        }
    }
    // Phân trang
    function getPage($id,$page) {
        if($this->table !== null) {
            // $page = 1;
            $end = 6;
            $from = ($page - 1 ) * $end;
            $sql = "SELECT * FROM $this->table WHERE id LIKE '%$id%'";
            $sql = "SELECT * FROM $this->table LIMIT $from,$end";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }

    //Search Cate
    function searchCate($id) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE id LIKE '%$id%'";
            $this->stmt = $this->connect->prepare($sql);
            $this->stmt->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
}
?>