<?php
require_once __DIR__ . '/includes/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$tarea = obtenerPedidoPorId($_GET['id']);

if (!$tarea) {
    header("Location: index.php?mensaje=Tarea no encontrada");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarPedido($_GET['id'], $_POST['ropa'], $_POST['talla'], $_POST['color'], $_POST['material'], $_POST['precio'], $_POST['fecha_en'],$completada);
    if ($count > 0) {
        header("Location: index.php?mensaje=Tarea actualizada con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el pedido.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarea</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
    <label>Ropa: <input type="text" name="ropa" value="<?php echo htmlspecialchars($tarea['ropa']); ?>" required></label>
    <label>talla: <textarea name="talla" required><?php echo htmlspecialchars($tarea['talla']); ?></textarea></label>
    <label>color: <textarea name="color" required><?php echo htmlspecialchars($tarea['color']); ?></textarea></label>
    <label>material: <textarea name="material" required><?php echo htmlspecialchars($tarea['material']); ?></textarea></label>
    <label>precio: <textarea name="precio" required><?php echo htmlspecialchars($tarea['precio']); ?></textarea></label>
    <label>Fecha de Entrega: <input type="date" name="fecha_en" value="<?php echo formatDate($tarea['fecha_en']); ?>" required></label>
    <label>Completada: <input type="checkbox" name="completada" <?php echo $tarea['completada'] ? 'checked' : ''; ?>></label>
    <input type="submit" value="Actualizar Pedido">
</form>
<a href="index.php" class="button">Volver a la lista de pedidos</a>
</div>
</body>
</html>
      