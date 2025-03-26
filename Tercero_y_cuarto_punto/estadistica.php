
<?php
class Estadisticas {
    private $numeros;

    public function __construct($numeros) {
        $this->numeros = array_map('floatval', $numeros);
    }

    public function calcularPromedio() {
        return array_sum($this->numeros) / count($this->numeros);
    }

    public function calcularMediana() {
        sort($this->numeros);
        $count = count($this->numeros);
        $middle = floor($count / 2);

        if ($count % 2) {
            return $this->numeros[$middle];
        } else {
            return ($this->numeros[$middle - 1] + $this->numeros[$middle]) / 2;
        }
    }
    public function calcularModa() {
        $frecuencias = array_count_values($this->numeros);
        $maxFrecuencia = max($frecuencias);
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

<a href="index.php" class="boton-volver">⬅ Volver al Índice</a>

</body>
</html>
