<!DOCTYPE html>
<html>
<head>
    <title>Event</title>
</head>
<body>
    <form method="post" action="index.php">
        <table>
            <tr>
                <td>Tên sự kiện: </td>
                <td><input type="text" name="tensukien"></td>
            </tr>
            <tr>
                <td>Ngày diễn ra: </td>
                <td><input type="date" name="ngay"></td>
            </tr>
            <tr>
                <td>Nội dung: </td>
                <td><input type="text" name="noidung"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
                <td><input type="reset" name="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php

    date_default_timezone_set('Asia/Ho_Chi_Minh');

    function getDateEvent()
    {
        if(isset($_POST['submit'])) {
            if(isset($_POST['ngay'])) {
                // $date = date('d, M, Y');
                $date1 = $_POST['ngay'];
                $date = date_create($date1);
            }
        }

        return $date;
    }

    function getNameEvetn()
    {
        if(isset($_POST['submit'])) {
            if(isset($_POST['tensukien'])) {
                $name = $_POST['tensukien'];
            }
        }

        return $name;
    }

    function getContentEvent()
    {
        if(isset($_POST['submit'])) {
            if(isset($_POST['noidung'])) {
                $content = $_POST['noidung'];
            }
        }

        return $content;
    }

    function getDeadline()
    {
        if(isset($_POST['submit'])) {
            if(isset($_POST['ngay'])) {
                // $date = date('d, M, Y');
                $date1 = $_POST['ngay'];
                $date = date_create($date1);
            }
        }

        $now = date_create(date('Y-m-d'));

        $deadline = date_diff($now, $date);

        $result = $deadline->format("%R%a");

        return $result;
    }

    function createFile()
    {
        $time = date('d/m/y - H:i:s');
        if(isset($_POST['ngay'])) {
            $date = $_POST['ngay'];
        }
        $date1 = getDateEvent();
        $date_format = date_format($date1, "d, M, Y");

        $name = getNameEvetn();

        $content = getContentEvent();

        $deadline = getDeadline();
        if($deadline == '+1') {
            $fp = @fopen("$date.txt", "w+");
            if(file_exists("$date.txt")) {
                $data = "Tên sự kiện: $name \nNgày diễn ra sự kiện: $date_format \nNội dung sự kiện: $content\nUpdate_at: $time";
                fwrite($fp, $data);
            } else {
                $data = "Tên sự kiện: $name \nNgày diễn ra sự kiện: $date_format \nNội dung sự kiện: $content";
                fwrite($fp, $data);
            }
        }

        if($deadline == "-1") {

            $fp = @fopen("$date.txt", "w+");
            if(file_exists("$date.txt")) {
                $data = "Tên sự kiện: $name \nNgày diễn ra sự kiện: $date_format \nNội dung sự kiện: $content\nUpdate_at: $time";
                fwrite($fp, $data);
            } else {
                $data = "Tên sự kiện: $name \nNgày diễn ra sự kiện: $date_format \nNội dung sự kiện: $content";
                fwrite($fp, $data);
            }
            fclose($fp);
            $newname = $date . "_PAST.txt";
            if(file_exists("$date.txt")) {
                rename("$date.txt" , "$newname");
            }
        }
    }

    echo getDeadline();
    // echo getDateEvent();
    createFile();
?>