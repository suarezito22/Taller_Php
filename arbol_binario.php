<?php
class Nodo {
    public $valor;
    public $izquierda;
    public $derecha;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

class ArbolBinario {
    private $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    public function construirDesdePreInorden($preorden, $inorden) {
        if (count($preorden) !== count($inorden)) {
            return null;
        }
        $this->raiz = $this->construirRecursivo($preorden, $inorden);
    }

    private function construirRecursivo(&$preorden, $inorden) {
        if (empty($inorden)) {
            return null;
        }

        $valorRaiz = array_shift($preorden);
        echo "<p>📌 Creando nodo con valor: $valorRaiz</p>"; // 🔍 Depuración

        $nodo = new Nodo($valorRaiz);
        $indice = array_search($valorRaiz, $inorden);
        if ($indice === false) {
            return null;
        }

        $nodo->izquierda = $this->construirRecursivo($preorden, array_slice($inorden, 0, $indice));
        $nodo->derecha = $this->construirRecursivo($preorden, array_slice($inorden, $indice + 1));

        return $nodo;
    }

    public function obtenerInorden($nodo) {
        if (!$nodo) return [];
        return array_merge($this->obtenerInorden($nodo->izquierda), [$nodo->valor], $this->obtenerInorden($nodo->derecha));
    }

    public function obtenerPreorden($nodo) {
        if (!$nodo) return [];
        return array_merge([$nodo->valor], $this->obtenerPreorden($nodo->izquierda), $this->obtenerPreorden($nodo->derecha));
    }

    public function obtenerPostorden($nodo) {
        if (!$nodo) return [];
        return array_merge($this->obtenerPostorden($nodo->izquierda), $this->obtenerPostorden($nodo->derecha), [$nodo->valor]);
    }

    public function getRaiz() {
        return $this->raiz;
    }
}

// ✅ Capturamos los datos enviados por el formulario
$preorden = isset($_POST['preorden']) ? array_filter(array_map('intval', explode(" ", trim($_POST['preorden'])))) : [];
$inorden = isset($_POST['inorden']) ? array_filter(array_map('intval', explode(" ", trim($_POST['inorden'])))) : [];

// 🔍 Depuración: Verificar si los datos se reciben correctamente
echo "<pre>📌 Preorden recibido: ";
print_r($preorden);
echo "📌 Inorden recibido: ";
print_r($inorden);
echo "</pre>";

$resultado = "";  // ✅ Inicializamos la variable

if (!empty($preorden) && !empty($inorden)) {
    if (count($preorden) !== count($inorden)) {
        $resultado = "<span style='color: red;'>❌ Error: La cantidad de valores en Preorden e Inorden no coincide.</span>";
    } else {
        echo "<p>✅ Iniciando construcción del árbol...</p>"; // 🔍 Depuración
        $arbol = new ArbolBinario();
        $arbol->construirDesdePreInorden($preorden, $inorden);

        if ($arbol->getRaiz() !== null) {
            echo "<p>🌳 Árbol construido correctamente.</p>"; // 🔍 Depuración
            $resultado = "<strong>✅ Recorrido Inorden:</strong> " . implode(" ", $arbol->obtenerInorden($arbol->getRaiz())) . "<br>";
            $resultado .= "<strong>✅ Recorrido Preorden:</strong> " . implode(" ", $arbol->obtenerPreorden($arbol->getRaiz())) . "<br>";
            $resultado .= "<strong>✅ Recorrido Postorden:</strong> " . implode(" ", $arbol->obtenerPostorden($arbol->getRaiz())) . "<br>";
        } else {
            $resultado = "<span style='color: red;'>❌ Error: No se pudo construir el árbol.</span>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="arbol_binario.css">
</head>
<body>
    <div class="container">
        <h2>Construcción del Árbol Binario</h2>
        <form method="post">
            <label>Recorrido Preorden:</label><br>
            <input type="text" name="preorden" placeholder="Ej: 3 4 5 6" required><br>
            
            <label>Recorrido Inorden:</label><br>
            <input type="text" name="inorden" placeholder="Ej: 4 3 6 5" required><br>

            <button type="submit">Construir Árbol</button>
            <button type="button" onclick="window.location.href=window.location.href;">Limpiar</button>
        </form>

        <h3>Resultado:</h3>
        <p><?php echo !empty($resultado) ? $resultado : "⌛ Esperando entrada..."; ?></p>
    </div>
</body>
</html>
