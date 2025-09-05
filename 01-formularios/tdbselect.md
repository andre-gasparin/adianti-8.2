# TDBSelect — Select conectado ao banco

Descrição

`TDBSelect` funciona como `TSelect` mas carrega opções a partir do banco usando Active Record.

Exemplo

```php
// docs/01-formularios/examples/tdbselect_example.php
require_once 'init.php';

$form = new TForm('form_dbselect');

$select = new TDBSelect('roles', 'my_database', 'Role', 'id', 'name');
$select->setMultiple(true);

$form->addField($select);
$form->addAction('Salvar', new TAction(['DBSelectController', 'onSave']));

$form->show();
```

## Métodos principais

- `__construct(string $name, string $database, string $activeRecord, string $keyField, string $displayField, TCriteria $criteria = null)`
- `setMultiple(bool $bool)`
- `setSize(string $size)`
- `setValue($value)`
- `getValue()`
- `setCriteria(TCriteria $criteria)`

Use `TCriteria` para filtros dinâmicos antes de carregar os itens.
