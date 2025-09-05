<?php
// Exemplo: docs/01-formularios/validators/examples/cnpj_example.php
require_once '../../../../init.php';

$value = isset($_POST['cnpj']) ? $_POST['cnpj'] : '';

$validator = new TCNPJValidator('CNPJ inválido');
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    echo "OK: CNPJ válido -> " . htmlspecialchars($value);
}
