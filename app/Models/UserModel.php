<?php

class UserModel extends BaseModel {

    protected $table = 'clients';

    // đăng ký
    function register($username,$accountName,$email,$password,$address,$phoneNumber) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (username,accountName,email,password,address,phoneNumber) VALUES(?,?,?,?,?,?)";
            return $this->_query($sql)->execute([$username,$accountName,$email,$password,$address,$phoneNumber]);
        }
    }
    function login($email) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE email = ?";
            $this->_query($sql)->execute([$email]);
            $data = $this->stmt->fetch();
            return $data;
        }
    }
    
    function getOneUser($id) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE clientID = ?";

            // $this->stmt = $this->connect->prepare($sql);
            // $this->stmt->execute([$id]);
            // $data = $this->stmt->fetch();
            // return $data;
            $this->_query($sql)->execute([$id]);
            $data = $this->stmt->fetch();
            return $data;
        }
    }

    function deleteClient($id) {
        if($this->table !== null) {
            $sql = "DELETE FROM $this->table WHERE clientID = ?";
            return $this->_query($sql)->execute([$id]);
        }
        return false;
    }
    
    // update user
    function updateUser($email,$username,$accountName,$address,$phoneNumber,$avatar,$userID){
        if ($this->table !== null) {
            $sql = "UPDATE $this->table SET email = ?,username = ? ,accountName = ?,address = ?, phoneNumber = ?, avatar = ? WHERE clientID = ?";
            return $this->_query($sql)->execute([$email, $username, $accountName, $address, $phoneNumber, $avatar, $userID]);
        }
    }
    // quên mật khẩu
    function getPassByEmail($password,$email) {
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET password = ? WHERE email = ?";
            return $this->_query($sql)->execute([$password,$email]);
        }
    }
    // update user phía admin
    function updateUserSideAdmin($username,$accountName,$email,$address,$phoneNumber,$avatar,$role,$userID) {
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET username = ?,accountName = ?,email = ?,address = ?,phoneNumber = ?,avatar = ?,role = ? WHERE clientID = ?";
            return $this->_query($sql)->execute([$username,$accountName,$email,$address,$phoneNumber,$avatar,$role,$userID]);
        }
    }
}
