# TSeekButton / TDBSeekButton — Botão de busca com popup

Descrição

`TSeekButton` abre um popup para buscar e selecionar registros. `TDBSeekButton` integra a busca com Active Record.

Exemplo

```php
// docs/01-formularios/examples/tseekbutton_example.php
require_once 'init.php';

$seek = new TSeekButton('product_id');
$seek->setAction(new TAction(['ProductSearch', 'onSearch']));

$form = new TForm('form_seek');
$form->addField($seek);
$form->addAction('Salvar', new TAction(['SeekController', 'onSave']));
$form->show();
```

## Métodos principais

- `__construct(string $name)`
- `setAction(TAction $action)` — ação que abre a janela de busca
- `setValue($value)`
- `getValue()`
- `setProperty(string $name, $value)`

Integre o callback de busca com uma página que lista resultados e retorna o id selecionado via JS.
