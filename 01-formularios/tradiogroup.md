# TRadioGroup — Grupo de botões radio

Descrição

`TRadioGroup` fornece um conjunto de opções exclusivas apresentadas como botões radio, com orientação configurável.

Exemplo

```php
// docs/01-formularios/examples/tradiogroup_example.php
require_once 'init.php';

$form = new TForm('form_radio');

$gender = new TRadioGroup('gender');
$gender->addItems(['M' => 'Masculino', 'F' => 'Feminino']);
$gender->setLayout('horizontal');

$form->addField($gender);
$form->addAction('Salvar', new TAction(['RadioController', 'onSave']));

$form->show();
```

Validação

- Valide se um valor obrigatório foi selecionado.
- Para acessibilidade, assegure labels apropriados.

## Métodos principais

- `__construct(string $name)`
- `addItems(array $items)`
- `setLayout(string $layout)` — 'horizontal'|'vertical'
- `setValue($value)`
- `getValue()`
