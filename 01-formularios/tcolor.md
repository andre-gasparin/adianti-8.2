# TColor — Seletor de cor

Descrição

`TColor` permite escolher cores em formatos como hex ou rgb. Útil para personalização de temas ou seleção visual.

Exemplo

```php
// docs/01-formularios/examples/tcolor_example.php
require_once 'init.php';

$form = new TForm('form_color');

$color = new TColor('theme_color');
$color->setValue('#ff0000');

$form->addField($color);
$form->addAction('Salvar', new TAction(['ColorController', 'onSave']));

$form->show();
```

Cuidados

- Valide o formato (ex: regex para hex) antes de armazenar.
- Normalize para o formato padrão adotado pela aplicação.

## Métodos principais

- `__construct(string $name)`
- `setValue(string $color)`
- `getValue()`
- `setProperty(string $name, $value)`

Valide formatos antes de armazenar (ex: regex para hex).
