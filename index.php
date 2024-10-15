<?php
require_once 'controllers/ProductoController.php';

$controller = new ProductoController();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $controller->$action();
} else {
    $controller->index();
}
