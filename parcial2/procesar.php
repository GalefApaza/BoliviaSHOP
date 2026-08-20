<?php
$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$sabores = $_POST['sabores'] ?? '';

$carta = [
    "Cono simple - Bs 8",
    "Copa doble - Bs 15",
    "Litro para llevar - Bs 35"
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido Recibido</title>
</head>
<body>
    <h1>Pedido recibido en Heladería Doña Nieve</h1>

    <h2>Datos del pedido:</h2>
    <p>Nombre: <?php echo htmlspecialchars($nombre); ?></p>
    <p>Correo: <?php echo htmlspecialchars($correo); ?></p>
    <p>Sabores: <?php echo htmlspecialchars($sabores); ?></p>

    <h2>Carta de la heladería:</h2>
    <ul>
        <?php foreach ($carta as $item): ?>
            <li><?php echo $item; ?></li>
        <?php endforeach; ?>
    </ul>

    <p>Te atiende Josué Apaza</p>
</body>
</html>