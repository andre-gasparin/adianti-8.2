# TDate — Seletor de data

Descrição

`TDate` é o campo para seleção de datas. Oferece suporte a máscaras, limites (min/max) e formatação para salvar no banco.

Exemplo

```php
// docs/01-formularios/examples/tdate_example.php
require_once 'init.php';

$form = new TForm('form_date');

$date = new TDate('birthdate');
$date->setMask('dd/mm/yyyy');
$date->setProperty('min', '01/01/1900');
$date->setProperty('max', date('d/m/Y'));

$form->addField($date);
$form->addAction('Salvar', new TAction(['DateController', 'onSave']));

$form->show();
```

Validação

- Valide formato no servidor e normalize para o padrão do banco (`Y-m-d`) antes de salvar.
- Use `DateTime::createFromFormat()` para parsing robusto.

## Métodos principais

- `__construct(string $name)`
- `setMask(string $mask)`
- `setProperty(string $name, $value)`
- `setValue($value)`
- `getValue()`

Normalmente converta `getValue()` para `Y-m-d` antes de persistir.
