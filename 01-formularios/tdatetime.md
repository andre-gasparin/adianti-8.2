# TDateTime — Seletor de data e hora

Descrição

`TDateTime` combina data e hora. Use quando precisar armazenar timestamp completo. Atenção ao fuso e ao formato aceito pelo banco.

Exemplo

```php
// docs/01-formularios/examples/tdatetime_example.php
require_once 'init.php';

$form = new TForm('form_datetime');

$dt = new TDateTime('scheduled_at');
$dt->setMask('dd/mm/yyyy hh:ii');

$form->addField($dt);
$form->addAction('Agendar', new TAction(['DateTimeController', 'onSchedule']));

$form->show();
```

Boas práticas

- Normalize para `Y-m-d H:i:s` no servidor antes de salvar.
- Considere armazenar UTC e converter em exibição para o fuso do usuário.

## Métodos principais

- `__construct(string $name)`
- `setMask(string $mask)`
- `setProperty(string $name, $value)`
- `setValue($value)`
- `getValue()`

Ao salvar, normalize para `Y-m-d H:i:s` e prefira UTC quando possível.
