# TCombo — Lista suspensa

Descrição

`TCombo` é um campo dropdown para seleção única. Pode ser populado estática ou dinamicamente (banco).

Exemplo

```php
// docs/01-formularios/examples/tcombo_example.php
require_once 'init.php';

$form = new TForm('form_combo');

$combo = new TCombo('country');
$combo->addItems([ 'BR' => 'Brasil', 'US' => 'Estados Unidos' ]);
$combo->setSize('100%');

$form->addField($combo);
$form->addAction('Salvar', new TAction(['ComboController', 'onSave']));

$form->show();
```

Carregamento dinâmico

- Para carregar do banco, use `TDBCombo` ou preencha com resultados de `TTransaction`.

Boas práticas

- Defina um item vazio como placeholder se necessário.
- Normalize valores antes de persistir.

## Métodos principais

- `__construct(string $name)`
- `addItems(array $items)`
- `addItem($key, $value)`
- `setSize(string $size)`
- `setValue($value)`
- `getValue()`

Para carregamento do banco use `TDBCombo` quando disponível.
