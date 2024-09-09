<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Servidor</title>
</head>
<body>
    <h1>Mensaje Recibido</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mensaje'])) {
        // Obtener el mensaje enviado por el cliente
        $mensaje = htmlspecialchars($_POST['mensaje']); // Escapar para evitar inyecciones de código
        // Obtener la dirección IP del cliente
        $ip_cliente = $_SERVER['REMOTE_ADDR'];

        // Validar si la IP es IPv4 o IPv6
        if (filter_var($ip_cliente, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $tipo_ip = 'IPv6';
        } else {
            $tipo_ip = 'IPv4';
        }

        echo "<p><strong>Mensaje:</strong> $mensaje</p>";
        echo "<p><strong>Dirección IP del cliente:</strong> $ip_cliente ($tipo_ip)</p>";
    } else {
        echo "<p>No se ha enviado ningún mensaje.</p>";
    }
    ?>
</body>
</html>
