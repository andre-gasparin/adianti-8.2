<?php
// Exemplo: docs/01-formularios/validators/examples/maxlength_example.php
require_once '../../../../init.php';

$value = isset($_POST['bio']) ? $_POST['bio'] : '';

$validator = new TMaxLengthValidator(50, 'Máximo de 50 caracteres');
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    echo "OK: tamanho aceitável";
}
