<!DOCTYPE html>
<html>

<head>
    <title>Agregar Producto</title>
</head>

<body>
    <h1>Agregar Producto</h1>
    <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Categoría:</label>
        <input type="text" name="categoria" required><br>
        <label>Precio:</label>
        <input type="text" name="precio" required><br>
        <label>Imagen:</label>
        <input type="file" name="imagen" accept="image/*" required><br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>