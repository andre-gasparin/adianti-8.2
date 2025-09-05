<?php
// Exemplo: docs/01-formularios/validators/examples/cpf_example.php
require_once '../../../../init.php';

$value = isset($_POST['cpf']) ? $_POST['cpf'] : '';

$validator = new TCPFValidator('CPF inválido');
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    echo "OK: CPF válido -> " . htmlspecialchars($value);
}
