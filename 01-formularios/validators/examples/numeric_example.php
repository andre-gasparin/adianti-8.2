<?php
// Exemplo: docs/01-formularios/validators/examples/numeric_example.php
require_once '../../../../init.php';

$value = isset($_POST['price']) ? $_POST['price'] : '';

$validator = new TNumericValidator('Valor numérico inválido', 0, 1000);
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    echo "OK: número válido -> " . $value;
}
