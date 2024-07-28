<?php
class AuthorModel extends BaseModel {

    protected $table = "authors";
   
   function newAuthor($authorName) {
        if($this->table !== null) {
            $sql = "INSERT INTO  $this->table (authorName) VALUES (?)"; 
            return $this->_query($sql)->execute([$authorName]);
        }
   }
   function updateAuthor($authorName,$id){
    if($this->table !== null) {
        $sql = "UPDATE $this->table SET authorName = ? WHERE authorID = ?";
        return $this->_query($sql)->execute([$authorName,$id]);
    }
   }
 
   function find($id){
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE authorID = ?";
            $this->_query($sql)->execute([$id]);
            $data = $this->stmt->fetch();
            return $data;
        }
   }
   function delete($id){
        if($this->table !== null) {
            $sql = "DELETE FROM $this->table WHERE authorID = ?";
            return $this->_query($sql)->execute([$id]);
        }
   }
   function _countBook(){
        if($this->table !== null) {
           $sql = "SELECT $this->table.authorID,$this->table.authorName, COUNT(books.id) AS numBook FROM $this->table LEFT JOIN books ON $this->table.authorID = books.authorID WHERE books.authorID = authors.authorID GROUP BY $this->table.authorName";
           $this->_query($sql)->execute();
           $data = $this->stmt->fetchAll();
           return $data;
        }
        
   }
}
?>