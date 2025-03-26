<?php
$indice = [
    "Conversión de frase en acrónimo" => "Primer_punto_y_segundo_punto/acronimo.php",
    "Cálculo de Sucesión de Fibonacci o Factorial" => "Primer_punto_y_segundo_punto/fibonacci_factorial.php",
    "Cálculo del promedio, media y moda" => "Tercero_y_cuarto_punto/estadistica.php",
    "Operaciones con conjuntos (Unión, intersección y diferencia)" => "Tercero_y_cuarto_punto/conjuntos.php",
    "Conversión de un número entero a binario" => "Quinto_y_sexto_punto/binario.php",
    "Construcción de un Árbol Binario" => "Quinto_y_sexto_punto/arbol_binario.php"
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Índice de Aplicaciones en PHP</title>
    <link rel="stylesheet" href="index.css"> 
</head>
<body>

    <div class="contenedor">
        <h2>Índice de Aplicaciones</h2>
        <ul>
            <?php
            foreach ($indice as $titulo => $archivo) {
                echo "<li><a href='$archivo'>$titulo</a></li>";
            }
            ?>
        </ul>
    </div>

</body>
</html>
