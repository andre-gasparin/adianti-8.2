<?php
// Exemplo: docs/01-formularios/validators/examples/minlength_example.php
require_once '../../../../init.php';

$value = isset($_POST['username']) ? $_POST['username'] : '';

$validator = new TMinLengthValidator(3, 'Mínimo de 3 caracteres');
if (!$validator->validate($value)) {
    echo "Erro: " . $validator->getMessage();
} else {
    echo "OK: comprimento válido -> " . htmlspecialchars($value);
}
