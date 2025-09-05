# TSpinner — Campo numérico com botões

Descrição

`TSpinner` apresenta um campo numérico com botões de incremento/decremento. Ideal para quantidades e valores limitados.

Exemplo

```php
// docs/01-formularios/examples/tspinner_example.php
require_once 'init.php';

$form = new TForm('form_spinner');

$quantity = new TSpinner('quantity');
$quantity->setRange(0, 100);
$quantity->setStep(1);

$form->addField($quantity);
$form->addAction('Salvar', new TAction(['SpinnerController', 'onSave']));

$form->show();
```

Validação

- Garanta conversão para inteiro no servidor.
- Verifique limites antes de salvar para evitar valores inválidos.

## Métodos principais

- `__construct(string $name)`
- `setRange(int $min, int $max)`
- `setStep(int $step)`
- `setValue($value)`
- `getValue()`
