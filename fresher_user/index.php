<?php

    require_once('checklogin.php');

    if(isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action = $_GET['action'];
    } else {
        $controller = 'UserController';
        $action = 'showAllUser';
    }

    require_once ("Controllers/" . $controller . ".php");

    $controller = new $controller();
    $controller->$action();
?>
