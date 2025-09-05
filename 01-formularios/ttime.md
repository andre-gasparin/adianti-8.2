# TTime — Seletor de hora

Descrição

`TTime` é um campo para seleção de hora. Suporta formatos 12h/24h e intervalos.

Exemplo

```php
// docs/01-formularios/examples/ttime_example.php
require_once 'init.php';

$form = new TForm('form_time');

$time = new TTime('start_time');
$time->setProperty('format', '24h');

$form->addField($time);
$form->addAction('Agendar', new TAction(['TimeController', 'onSet']));

$form->show();
```

Validação

- Verifique formato com regex ou `DateTime::createFromFormat()`.
- Para intervalos, compare valores convertidos para minutos.

## Métodos principais

- `__construct(string $name)`
- `setProperty(string $name, $value)`
- `setValue($value)`
- `getValue()`

Para comparar intervalos, normalize para minutos e compare numericamente.
