<?php
  require_once __DIR__ .'/includes/functions.php';
    $tareas = obtenerPedido();

if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarPedido($_GET['id']);
    $mensaje = $count > 0 ? "Tarea eliminada con éxito." : "No se pudo eliminar la tarea.";
}
$tareas = obtenerPedido();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas de ropas</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Tareas de ropas</h1>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <a href="agregar_tarea.php" class="button">Agregar Nueva Tarea</a>

        <h2>Lista de Tareas</h2>
        <table>
            <tr>
                <th>ropa</th>
                <th>talla   </th>
                <th>color  </th>
                <th>material </th>
                <th>precio</th>
                <th>Fecha de Entrega</th>
                <th>Completada</th>
            </tr>
            <?php foreach ($tareas as $tarea): ?>
            <tr>
            <td><?php echo htmlspecialchars($tarea['ropa'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($tarea['talla'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($tarea['color'] ?? ''); ?></td>
                <td><?php echo htmlspecialchars($tarea['material'] ?? ''); ?></td>  
                <td><?php echo htmlspecialchars($tarea['precio'] ?? ''); ?></td>
                <td><?php echo formatDate($tarea['fecha_en']); ?></td>
                <td><?php echo $tarea['completada'] ? 'Sí' : 'No'; ?></td> 
                <td class="actions">
                    <a href="editar_tarea.php?id=<?php echo $tarea['_id']; ?>" class="button">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?php echo $tarea['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>