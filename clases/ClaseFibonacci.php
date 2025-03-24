<?php
class Fibonacci {
    public function calcular($n) {
        if ($n < 0) return "❌ Ingrese un número positivo.";
        if ($n == 0) return [0];
        if ($n == 1) return [0, 1];

        $serie = [0, 1];
        for ($i = 2; $i <= $n; $i++) {
            $serie[] = $serie[$i - 1] + $serie[$i - 2];
        }
        return $serie;
    }
}
?>
