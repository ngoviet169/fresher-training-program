<?php
    session_start();
    require_once ('SinhVien/SinhVien.php');

    $student = new SinhVien();
    $arr = array();

    if(isset($_POST['destroy'])) {
        session_destroy();
    }

    if(isset($_POST['add'])) {
        $student->setStudent();
        $arr = $student->getStudent();
        $_SESSION['student'][] = $arr;

    }
    if(isset($_GET['act']) == "del") {
        $student->delStudent();
        header('Location:index.php');
    }

?>

<html>
    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <th align="center">Add Student</th>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="txt_name"></td>
            </tr>
            <tr>
                <td>Age: </td>
                <td><input type="text" name="txt_age"></td>
            </tr>
            <tr>
                <td>Sex: </td>
                <td><select name="sex">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select></td>
            </tr>
            <tr>
                <td>File: </td>
                <td><input type="file" name="file"></td>
            </tr>
            <tr>
                <td><input type="submit" name="add" value="Add"></td>
                <td><input type="reset" name="reset" value="Reset"></td>
                <td><input type="submit" name="destroy" value="Destroy"></td>
            </tr>
        </table>
        <table>
            <th>List Student</th>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Age</td>
                <td>Sex</td>
                <td>File</td>
                <td>Delete</td>
            </tr>
            <?php
            if(isset($_SESSION['student'])) {
                foreach ($_SESSION['student'] as $key => $value) {
                    $id = $key + 1;
                    ?>
                    <tr>
                        <td width="100"><?php echo $id; ?></td>
                        <td width="100"><?php echo $value['name'] ?></td>
                        <td width="100"><?php echo $value['age'] ?></td>
                        <td width="100"><?php echo $value['sex'] ?></td>
                        <td width="100"><img src="data/<?php echo $value['file'] ?>" width="100" height="100"></td>
                        <td width="100"><a href="index.php?act=del&id=<?php echo $id ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </form>
</html>
