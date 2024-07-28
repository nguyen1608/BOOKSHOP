<?php
class UserController
{

    use Controller;
    private $client;

    function __construct()
    {
        $this->client = $this->model("UserModel");
        // session_start();
    }

    function index()
    {
        $this->view("admin.layout.Components.Client.list", ["clients" => $this->client->all()]);
    }


    function update($clientID)
    {
        $client = $this->client->getOneUser($clientID);
        if (isset($_POST['btn-update'])) {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'username' => trim($_POST['username'] ?? ''),
                'accountName' => trim($_POST['accountName'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'phoneNumber' => trim($_POST['phoneNumber'] ?? ''),
                'role' => trim($_POST['role'] ?? ''),
                // err
                'username_err' => '',
                'accountName_err' => '',
                'email_err' => '',
                'address_err' => '',
                'phoneNumber_err' => '',
                'role_err' => '',
            ];
            if (empty($data['username'])) {
                $data['username_err'] = "Bạn không được để trống Tên";
            }
            if (empty($data['accountName'])) {
                $data['accountName_err'] = "Bạn không được để trống Tên Tài Khoản";
            }
            if (empty($data['email'])) {
                $data['email_err'] = "Bạn không được để trống Email";
            }
            if (empty($data['address'])) {
                $data['address_err'] = "Bạn không được để trống địa chỉ";
            }
            if (empty($data['phoneNumber'])) {
                $data['phoneNumber_err'] = "Bạn không được để trống số điện thoại";
            }
            if ($data['role'] < 0) {
                $data['role_err'] = "Bạn không được để trống vai trò";
            }

            if ($_FILES['avatar']['size'] === 0) {
                $img = $client['avatar'];
            } else {
                $img = $_FILES['avatar']['name'];
                move_uploaded_file($_FILES['avatar']['tmp_name'], "Public/upload/" . basename($img));
            }
            if (empty($data['username_err']) && empty($data['accountName_err']) && empty($data['email_err']) && empty($data['address_err']) && empty($data['phoneNumber_err']) && empty($data['role_err'])) {
                $result = $this->client->updateUserSideAdmin($data['username'], $data['accountName'], $data['email'], $data['address'], $data['phoneNumber'], $img,  $data['role'], $clientID);
                if ($result) {
                    header("location:" . URL . "Admin/listClient");
                }
            } else {
                $this->view("admin.layout.Components.Client.update", ['client' => $this->client->getOneUser($clientID), 'err' => $data]);
            }
        } else {
            $data = [
                'username' => '',
                'accountName' => '',
                'email' => '',
                'address' => '',
                'phoneNumber' => '',
                'role' => '',
                // err
                'username_err' => '',
                'accountName_err' => '',
                'email_err' => '',
                'address_err' => '',
                'phoneNumber_err' => '',
                'role_err' => '',
            ];
        }
        $this->view("admin.layout.Components.Client.update", ['client' => $this->client->getOneUser($clientID), 'err' => $data]);
    }

    function delete($ClientID)
    {
        $result = $this->client->deleteClient($ClientID);
        if ($result) {
            header("location:" . URL . "Admin/listClient");
            $this->view("admin.layout.Components.Client.list", ['clients' => $this->client->all()]);
        }
        return false;
    }
}
