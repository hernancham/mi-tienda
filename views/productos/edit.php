<!DOCTYPE html>
<html>

<head>
    <title>Editar Producto</title>
</head>

<body>
    <h1>Editar Producto</h1>
    <form action="index.php?action=update&id=<?php echo $producto['id']; ?>" method="POST" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>
        <label>Categoría:</label>
        <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>" required><br>
        <label>Precio:</label>
        <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" required><br>
        <label>Imagen:</label>
        <input type="file" name="imagen" accept="image/*"><br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>