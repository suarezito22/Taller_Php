<?php
class Acronymo {
    private $phrase;

    public function __construct($phrase) {
        $this->phrase = $phrase;
    }

    public function generate() {
        // Reemplazar guiones por espacios y eliminar puntuación
        $cleanPhrase = preg_replace('/[^a-zA-Z\s-]/', '', $this->phrase);
        $cleanPhrase = str_replace('-', ' ', $cleanPhrase);

        // Extraer la primera letra de cada palabra y convertir en mayúscula
        $words = explode(" ", $cleanPhrase);
        $acronym = "";
        foreach ($words as $word) {
            if (!empty($word)) {
                $acronym .= strtoupper($word[0]);
            }
        }
        return $acronym;
    }
}
?>
