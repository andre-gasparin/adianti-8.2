<?php
// Exemplo: docs/01-formularios/validators/examples/required_example.php
require_once '../../../../init.php';

// Simulando dados recebidos do formulário
$value = isset($_POST['name']) ? $_POST['name'] : '';

$validator = new TRequiredValidator('Nome é obrigatório');
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    echo "OK: valor presente -> " . htmlspecialchars($value);
}
