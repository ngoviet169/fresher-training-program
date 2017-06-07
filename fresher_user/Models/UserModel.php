<?php
require_once ('Database/connect.php');

class User extends Database
{
    public function getAllUser()
    {
        $sql = 'select * from user';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt;
        }
    }

    public function addUser($username, $email, $pass, $created_at)
    {
        $sql = "insert into user (username, user_email, pass, privilege, user_time_created) values ('$username', '$email', '$pass', 0, '$created_at')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function deactiveUser($id)
    {
        $sql = "update user set status = 0 where user_id = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function editUser($id, $username, $email, $pass, $status)
    {
        $sql = "UPDATE `user` SET `username` = '$username', `user_email` = '$email', `pass` = '$pass', `status` = '$status' WHERE `user`.`user_id` = $id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function selectUser($id)
    {
        $sql = "select * from user where user_id = '$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    public function login($username, $pass)
    {
        $sql = "select * from user where username ='$username' and pass = '$pass'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
}
