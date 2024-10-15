<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
</head>

<body>
    <h1>Lista de Productos</h1>
    <form action="index.php?action=search" method="GET">
        <input type="text" name="keywords" placeholder="Buscar por nombre">
        <button type="submit">Buscar</button>
    </form>
    <a href="index.php?action=new">Agregar Producto</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['categoria']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><img src="uploads/<?php echo $producto['imagen']; ?>" width="50"></td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $producto['id']; ?>">Editar</a>
                    <a href="index.php?action=delete&id=<?php echo $producto['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>