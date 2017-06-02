<?php
    class SinhVien
    {
        private $name;
        private $age;
        private $sex;
        private $file;

        public function __construct()
        {

        }

        public function setStudent()
        {
            if(isset($_POST['txt_name'])) {
                $this->name = $_POST['txt_name'];
            }
            if(isset($_POST['txt_age'])) {
                $this->age = $_POST['txt_age'];
            }
            if(isset($_POST['sex'])) {
                if($_POST['sex'] == "1") {
                    $this->sex = 'Male';
                }
                if($_POST['sex'] == "2") {
                    $this->sex = 'Female';
                }
            }
            if(isset($_FILES['file'])) {
                $end_of_file = strstr($_FILES['file']['name'], '.');     //lay ra phan mo rong cua anh
                $file_tmp = $_FILES['file']['tmp_name'];                        //lay ra duong dan cua client de up anh len sever
                $_FILES['file']['name'] = $this->name . $end_of_file;           //doi ten file thanh ten user
                $path = __DIR__ . "/../data/" . $_FILES['file']['name'];        //duong dan de luu file
                move_uploaded_file($file_tmp, $path);                           //upload file
                $this->file = $_FILES['file']['name'];
            }
        }

        public function getStudent()
        {
            $arr = array(
                'name' => $this->name,
                'age' => $this->age,
                'sex' => $this->sex,
                'file' => $this->file
            );

            return $arr;
        }

        public function delStudent()
        {
            $id = $_GET['id'];
            $path = __DIR__ . "/../data/" . $_FILES['file']['name'];
            unset($_SESSION['student'][$id-1]);
            unlink($path);
        }
    }