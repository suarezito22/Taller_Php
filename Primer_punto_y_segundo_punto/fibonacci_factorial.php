<?php
require_once "../clases/ClaseFibonacci.php"; // Importar la clase

$fibonacci = new Fibonacci();
$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"])) {
    $numero = intval($_POST["numero"]);
    $resultado = $fibonacci->calcular($numero);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucesión de Fibonacci</title>
</head>
<body>

<h2>Generar Sucesión de Fibonacci</h2>
<form method="post">
    <label for="numero">Ingrese un número entero:</label>
    <input type="number" name="numero" id="numero" required>
    <button type="submit">Calcular</button>
</form>

<?php if (!empty($resultado)) : ?>
    <h3>Resultado:</h3>
    <p><?php echo is_array($resultado) ? implode(", ", $resultado) : $resultado; ?></p>
<?php endif; ?>

<!-- Botón de Volver -->
<a href="../index.php">⬅ Volver al Índice</a>

</body>
</html>
