<?php
// Definir los puntos del índice en un array
$indice = [
    "Conversión de frase en acrónimo" => "acronimo.php",
    "Cálculo de Sucesión de Fibonacci o Factorial" => "fibonacci_factorial.php",
    "Cálculo del promedio, media y moda" => "estadistica.php",
    "Operaciones con conjuntos (Unión, intersección y diferencia)" => "conjuntos.php",
    "Conversión de un número entero a binario" => "binario.php",
    "Construcción de un Árbol Binario" => "arbol_binario.php"
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice de Aplicaciones en PHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: #333; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 10px 0; }
        a { text-decoration: none; color: blue; font-size: 18px; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <h2>Índice de Aplicaciones</h2>
    <ul>
        <?php
        // Generar la lista de enlaces dinámicamente
        foreach ($indice as $titulo => $archivo) {
            echo "<li><a href='$archivo'>$titulo</a></li>";
        }
        ?>
    </ul>

</body>
</html>
