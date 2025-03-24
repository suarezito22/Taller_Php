<?php
require_once __DIR__ . "/../clases/ClaseAcronymo.php";

$acronym = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["phrase"])) {
    $phrase = trim($_POST["phrase"]);
    $acronymGenerator = new Acronymo($phrase);
    $acronym = $acronymGenerator->generate();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Acrónimos</title>
</head>
<body>

    <h2>Convertir Frase en Acrónimo</h2>
    <form method="post">
        <input type="text" name="phrase" placeholder="Ingrese una frase" required>
        <button type="submit">Generar Acrónimo</button>
    </form>

    <?php if (!empty($acronym)): ?>
        <p>Acrónimo: <?= $acronym ?></p>
    <?php endif; ?>

    <a href="../index.php">⬅ Volver al Índice</a>

</body>
</html>
