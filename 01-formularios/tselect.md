# TSelect — Seleção múltipla

Descrição

`TSelect` permite seleção múltipla quando configurado. Ideal para relacionamentos N:N ou múltiplas preferências.

Exemplo

```php
// docs/01-formularios/examples/tselect_example.php
require_once 'init.php';

$form = new TForm('form_select');

$select = new TSelect('tags');
$select->addItems([1 => 'PHP', 2 => 'JS', 3 => 'HTML']);
$select->setSize('100%');
$select->setMultiple(true);

$form->addField($select);
$form->addAction('Salvar', new TAction(['SelectController', 'onSave']));

$form->show();
```

Cuidados

- Se usar nomes com `[]`, normalize no servidor para arrays.
- Para grandes volumes, prefira busca com autocomplete (TMultiSearch).

## Métodos principais

- `__construct(string $name)`
- `addItems(array $items)`
- `setMultiple(bool $bool)`
- `setSize(string $size)`
- `getValue()`
- `setValue($value)`
