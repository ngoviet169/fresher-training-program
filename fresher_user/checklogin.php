<?php
    session_start();

    if(!isset($_SESSION["username"])) {
        echo '<a href="index.php?controller=UserController&action=login">Login</a>';
    }

?>
