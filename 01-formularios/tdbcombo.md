# TDBCombo — Combo conectado ao banco

Descrição

`TDBCombo` popula opções a partir de uma tabela do banco. Use `setDatabase()` e `setActiveRecord()` quando necessário ou passe pares id=>label.

Exemplo

```php
// docs/01-formularios/examples/tdbcombo_example.php
require_once 'init.php';

$form = new TForm('form_dbcombo');

$combo = new TDBCombo('category', 'my_database', 'Category', 'id', 'name');

$form->addField($combo);
$form->addAction('Salvar', new TAction(['DBComboController', 'onSave']));

$form->show();
```

Filtros

- Você pode passar um `TCriteria` para filtrar resultados no construtor ou via método específico.
- Para performance, habilite cache quando os dados mudam raramente.

## Métodos principais

- `__construct(string $name, string $database, string $activeRecord, string $keyField, string $displayField, TCriteria $criteria = null)`
- `setSize(string $size)`
- `setValue($value)`
- `getValue()`
- `setCriteria(TCriteria $criteria)`

Use `TCriteria` para filtros avançados e `setValue()` para selecionar programaticamente.
