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
    public $raiz;
    
    public function __construct() {
        $this->raiz = null;
    }
    
    public function insertar($valor) {
        $this->raiz = $this->insertarRecursivo($this->raiz, $valor);
    }
    
    private function insertarRecursivo($nodo, $valor) {
        if ($nodo === null) {
            return new Nodo($valor);
        }
        
        if ($valor < $nodo->valor) {
            $nodo->izquierda = $this->insertarRecursivo($nodo->izquierda, $valor);
        } else {
            $nodo->derecha = $this->insertarRecursivo($nodo->derecha, $valor);
        }
        
        return $nodo;
    }
    
    public function preorden($nodo) {
        if ($nodo !== null) {
            echo $nodo->valor . " ";
            $this->preorden($nodo->izquierda);
            $this->preorden($nodo->derecha);
        }
    }
    
    public function inorden($nodo) {
        if ($nodo !== null) {
            $this->inorden($nodo->izquierda);
            echo $nodo->valor . " ";
            $this->inorden($nodo->derecha);
        }
    }
    
    public function postorden($nodo) {
        if ($nodo !== null) {
            $this->postorden($nodo->izquierda);
            $this->postorden($nodo->derecha);
            echo $nodo->valor . " ";
        }
    }
}

$arbol = new ArbolBinario();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valores = explode(" ", trim($_POST["nodos"]));
    foreach ($valores as $valor) {
        $arbol->insertar((int)$valor);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árbol Binario</title>
    <div class="contenedor-boton">
    <a href="../index.php" class="boton-indice">Ir al índice</a>
    <link rel="stylesheet" href="./arbol_binario.css">
</div>
</head>
<body>
    <div class="contenedor">
        <h2>Ingresar valores del árbol binario</h2>
        <form method="post">
            <input type="text" name="nodos" placeholder="Ejemplo: 10 5 15 2 7 12 20" required>
            <button type="submit" >Construir Árbol</button>
        </form>
        
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h3>Recorridos del Árbol</h3>
            <p><strong>Preorden:</strong> <?php $arbol->preorden($arbol->raiz); ?></p>
            <p><strong>Inorden:</strong> <?php $arbol->inorden($arbol->raiz); ?></p>
            <p><strong>Posorden:</strong> <?php $arbol->postorden($arbol->raiz); ?></p>
        <?php endif; ?>

        <!-- Botón para volver al índice -->
    </div>
    
</body>
</html>
