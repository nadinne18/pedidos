<?php
require_once __DIR__.'/includes/functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearTareas($_POST['ropa'], $_POST['talla'], $_POST['color'], $_POST['material'], $_POST['precio'], $_POST['fecha_en']);
    if ($id) {
        header("Location: index.php?mensaje=el pedido se ah   creada con éxito");
        exit;
    } else {
        $error = "No se pudo crear los datos del producto";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nuevo pedido de ropa</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo pedido de ropa  </h1>
    
    <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>


    <form method="POST">
        <label>Ropa : <input type="text" name="ropa" required></label><br></br>
        <label> Talla : <textarea name="talla" required></textarea></label><br></br>
        <label>Color : <textarea name="color" required></textarea></label><br></br>
        <label>Material: <textarea name="material" required></textarea></label><br></br>
        <label>precio: <textarea name="precio" required></textarea></label><br></br>
        <label>fecha entrega : <input type="date" name="fecha_en" required></label><br></br>
    <input type="submit" value="Crear Tarea">
</form>
    <a href="index.php" class="button">Volver a la lista de tareas</a>
</body>
</html>