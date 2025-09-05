# TCheckButton — Botão checkbox individual

Descrição

`TCheckButton` é um checkbox simples apresentado como botão visual. Útil para escolhas binárias com estilo.

Exemplo

```php
// docs/01-formularios/examples/tcheckbutton_example.php
require_once 'init.php';

$form = new TForm('form_checkbutton');

$subscribe = new TCheckButton('subscribe');
$subscribe->setSize(100);

$form->addField($subscribe);
$form->addAction('Salvar', new TAction(['CheckButtonController', 'onSave']));

$form->show();
```

Cuidados

- O valor pode ser `true`/`false` ou `1`/`0`. Normalize no servidor.
- Use labels claros para evitar ambiguidade.

## Métodos principais

- `__construct(string $name)`
- `setSize(int $size)`
- `setValue($value)`
- `getValue()`
- `setProperty(string $name, $value)`
