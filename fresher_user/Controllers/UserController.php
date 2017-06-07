<?php
require_once ('Models/UserModel.php');

class UserController
{
    public function showAllUser()
    {
        $user = new User();
        $result = $user->getAllUser();

        include('Views/list-users.php');
    }

    public function editUser()
    {
        $user = new User();
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $user->selectUser($id);
            $row = $result->fetch(PDO::FETCH_ASSOC);
        }
        if(isset($_POST['update'])) {
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            if(isset($_POST['txtusername'])) {
                $username = $_POST['txtusername'];
            }
            if(isset($_POST['txtemail'])) {
                $email = $_POST['txtemail'];
            }
            if(isset($_POST['txtpass'])) {
                $pass = md5($_POST['txtpass']);
            }
            if(isset($_POST['status'])) {
                $status = $_POST['status'];
            }

            $user->editUser($id, $username, $email, $pass, $status);

            header('Location:index.php');
        }

        include ('Views/edit-user.php');
    }

    public function addUser()
    {
        $user = new User();
        if(isset($_POST['add'])) {
            if(isset($_POST['txtusername'])) {
                $username = $_POST['txtusername'];
            }
            if(isset($_POST['txtemail'])) {
                $email = $_POST['txtemail'];
            }
            if(isset($_POST['txtpass'])) {
                $pass = md5($_POST['txtpass']);
            }
            $created_at = date('d-m-Y H:i:s');
            $user->addUser($username, $email, $pass, $created_at);

            header('Location:index.php');
        }

        include('Views/add-user.php');
    }

    public function login()
    {
        $user = new User();
        if(isset($_POST['login'])) {
            if(isset($_POST['txtusername'])) {
                $username = $_POST['txtusername'];
            }
            if(isset($_POST['txtpass'])) {
                $pass = md5($_POST['txtpass']);
            }
            $a = $user->login($username, $pass);
            $row = $a->fetch(PDO::FETCH_ASSOC);
            $result = (count($row['username']));
            if($result > 0) {
                $_SESSION['username'] = $row['username'];
                header('location:index.php');
            } else {
                echo 'login failed';
            }
        }

        include ('login.php');
    }

    public function deactiveUser()
    {
        $user = new User();
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $user->deactiveUser($id);

            header('location:index.php');
        }
    }
}
