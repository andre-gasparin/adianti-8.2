<?php
// Exemplo: docs/01-formularios/validators/examples/date_example.php
require_once '../../../../init.php';

$value = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';

$validator = new TDateValidator('d/m/Y', 'Data inválida');
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    // normalizar
    $dt = DateTime::createFromFormat('d/m/Y', $value);
    echo "OK: data normalizada -> " . $dt->format('Y-m-d');
}
