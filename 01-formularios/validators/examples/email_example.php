<?php
// Exemplo: docs/01-formularios/validators/examples/email_example.php
require_once '../../../../init.php';

$value = isset($_POST['email']) ? $_POST['email'] : '';

$validator = new TEmailValidator('Email inválido');
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    echo "OK: email válido -> " . htmlspecialchars($value);
}
