<?php
class Estadisticas {
    private $numeros;

    public function __construct($numeros) {
        // Limpia espacios y convierte a flotantes
        $this->numeros = array_filter(array_map('floatval', array_map('trim', $numeros)), 'is_numeric');
    }

    public function calcularPromedio() {
        return count($this->numeros) > 0 ? array_sum($this->numeros) / count($this->numeros) : 0;
    }

    public function calcularMediana() {
        $count = count($this->numeros);
        if ($count === 0) return 0;

        sort($this->numeros);
        $middle = floor($count / 2);

        return ($count % 2) ? $this->numeros[$middle] 
                            : ($this->numeros[$middle - 1] + $this->numeros[$middle]) / 2;
    }

    public function calcularModa() {
        if (empty($this->numeros)) return "No hay datos";

        // Convertimos los valores a string para que `array_count_values()` los procese correctamente
        $numerosEnteros = array_map(fn($n) => (string) round($n, 2), $this->numeros);
        $frecuencias = array_count_values($numerosEnteros);
        $maxFrecuencia = max($frecuencias);

        if ($maxFrecuencia === 1) return "No hay moda"; // Si todos aparecen una sola vez, no hay moda

        $moda = array_keys($frecuencias, $maxFrecuencia);
        return implode(', ', $moda);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['numeros'])) {
    $numeros = explode(',', $_POST['numeros']);
    $estadisticas = new Estadisticas($numeros);
    $promedio = $estadisticas->calcularPromedio();
    $mediana = $estadisticas->calcularMediana();
    $moda = $estadisticas->calcularModa();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <a href="../index.php" class="boton-indice">Ir al índice</a>
    <title>Calculadora Estadística</title> 
</head>
<body>
<h2>Calculadora de Promedio, Mediana y Moda</h2>
    <form method="post">
        <label for="numeros">Ingrese números separados por comas:</label><br>
        <input type="text" id="numeros" name="numeros" required>
        <button type="submit">Calcular</button>
    </form>
    
    <?php if (isset($promedio)): ?>
        <h3>Resultados:</h3>
        <p><strong>Promedio:</strong> <?= number_format($promedio, 2) ?></p>
        <p><strong>Mediana:</strong> <?= number_format($mediana, 2) ?></p>
        <p><strong>Moda:</strong> <?= $moda ?></p>
    <?php endif; ?>
</body>
</html>
