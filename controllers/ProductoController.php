<?php
require_once 'config/database.php';
require_once 'models/Producto.php';

class ProductoController
{
    private $db;
    private $producto;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->producto = new Producto($this->db);
    }

    public function index()
    {
        $stmt = $this->producto->read();
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/productos/index.php';
    }

    public function new()
    {
        include 'views/productos/new.php';
    }

    public function create()
    {
        $this->producto->nombre = $_POST['nombre'];
        $this->producto->categoria = $_POST['categoria'];
        $this->producto->precio = $_POST['precio'];

        if (!empty($_FILES['imagen']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
            $this->producto->imagen = basename($_FILES["imagen"]["name"]);
        }

        if ($this->producto->create()) {
            header("Location: index.php");
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        if ($id) {
            $stmt = $this->producto->get($id);
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            include 'views/productos/edit.php';
        } else {
            header("Location: index.php");
        }
    }

    public function update()
    {
        $this->producto->id = $_GET['id'];
        $this->producto->nombre = $_POST['nombre'];
        $this->producto->categoria = $_POST['categoria'];
        $this->producto->precio = $_POST['precio'];

        if (!empty($_FILES['imagen']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
            $this->producto->imagen = basename($_FILES["imagen"]["name"]);
        }

        if ($this->producto->update()) {
            header("Location: index.php");
        }
    }

    public function delete()
    {
        $this->producto->id = $_GET['id'];
        if ($this->producto->delete()) {
            header("Location: index.php");
        }
    }

    public function search()
    {
        $keywords = $_GET['keywords'];
        $stmt = $this->producto->search($keywords);
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include 'views/productos/index.php';
    }
}
