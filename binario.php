<?php
if (isset($_GET['reset'])) {
    header("Location: binario.php");
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"]) && $_POST["numero"] !== "") {
    $numero = intval($_POST["numero"]);

    if ($numero < 0) {
        $mensaje = "<div class='error'>❌ Por favor, ingrese un número entero positivo.</div>";
    } else {
        $binario = decbin($numero);
        $mensaje = "<div class='resultado'>✅ El número <strong>$numero</strong> en binario es: <strong>$binario</strong></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertir a Binario</title>
    <link rel="stylesheet" href="binario.css">
</head>
<body>

<div class="contenedor">
    <h2>Convertir Número a Binario</h2>
    <p class="descripcion">Por favor, ingrese un número entero para convertirlo a binario.</p>

    <form action="binario.php" method="post">
        <input type="number" name="numero" placeholder="Ingrese un número entero" required>
        <button type="submit">Convertir</button>
    </form>

    <?php echo $mensaje; ?>
</div>

<!-- Botón "Volver" flotante -->
<a href="index.php" class="volver">Volver</a>

</body>
</html>
