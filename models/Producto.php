<?php
class Producto
{
    private $conn;
    private $table_name = "productos";

    public $id;
    public $nombre;
    public $categoria;
    public $precio;
    public $imagen;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function get($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, categoria=:categoria, precio=:precio, imagen=:imagen";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->imagen = htmlspecialchars(strip_tags($this->imagen));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":imagen", $this->imagen);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, categoria=:categoria, precio=:precio, imagen=:imagen WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->categoria = htmlspecialchars(strip_tags($this->categoria));
        $this->precio = htmlspecialchars(strip_tags($this->precio));
        $this->imagen = htmlspecialchars(strip_tags($this->imagen));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":imagen", $this->imagen);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function search($keywords)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE nombre LIKE ? OR categoria LIKE ?";
        $stmt = $this->conn->prepare($query);

        $keywords = htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";

        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);

        $stmt->execute();
        return $stmt;
    }
}
