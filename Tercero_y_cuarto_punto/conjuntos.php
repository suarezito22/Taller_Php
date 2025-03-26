<?php
class Conjuntos {
    private $conjuntoA;
    private $conjuntoB;

    public function __construct($conjuntoA, $conjuntoB) {
        $this->conjuntoA = array_unique(array_map('intval', $conjuntoA));
        $this->conjuntoB = array_unique(array_map('intval', $conjuntoB));
    }

    public function calcularUnion() {
        return array_unique(array_merge($this->conjuntoA, $this->conjuntoB));
    }

    public function calcularInterseccion() {
        return array_values(array_intersect($this->conjuntoA, $this->conjuntoB));
    }

    public function calcularDiferenciaAB() {
        return array_values(array_diff($this->conjuntoA, $this->conjuntoB));
    }
    public function calcularDiferenciaBA() {
        return array_values(array_diff($this->conjuntoB, $this->conjuntoA));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['conjuntoA']) && !empty($_POST['conjuntoB'])) {
    $conjuntoA = explode(',', $_POST['conjuntoA']);
    $conjuntoB = explode(',', $_POST['conjuntoB']);
    $conjuntos = new Conjuntos($conjuntoA, $conjuntoB);
    $union = $conjuntos->calcularUnion();
    $interseccion = $conjuntos->calcularInterseccion();
    $diferenciaAB = $conjuntos->calcularDiferenciaAB();
    $diferenciaBA = $conjuntos->calcularDiferenciaBA();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones de conjuntos</title>
</head>
<body>
<h2>Calculadora de Conjuntos</h2>
    <form method="post">
        <label for="conjuntoA">Ingrese el conjunto A (números separados por comas):</label><br>
        <input type="text" id="conjuntoA" name="conjuntoA" required><br>
        <label for="conjuntoB">Ingrese el conjunto B (números separados por comas):</label><br>
        <input type="text" id="conjuntoB" name="conjuntoB" required><br>
        <button type="submit">Calcular</button>
    </form>
    
    <?php if (isset($union)): ?>
        <h3>Resultados:</h3>
        <p><strong>Unión:</strong> <?= implode(', ', $union) ?></p>
        <p><strong>Intersección:</strong> <?= implode(', ', $interseccion) ?></p>
        <p><strong>Diferencia A - B:</strong> <?= implode(', ', $diferenciaAB) ?></p>
        <p><strong>Diferencia B - A:</strong> <?= implode(', ', $diferenciaBA) ?></p>
    <?php endif; ?>


</body>
</html>
