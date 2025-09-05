# TFile — Upload de arquivo

Descrição

`TFile` gerencia upload de arquivos. Para múltiplos arquivos use `TMultiFile`. Valide tipos e tamanhos antes de mover para destino.

Exemplo

```php
// docs/01-formularios/examples/tfile_example.php
require_once 'init.php';

$form = new TForm('form_file');

$file = new TFile('document');
$file->setSize('100%');

$form->addField($file);
$form->addAction('Enviar', new TAction(['FileController', 'onUpload']));

$form->show();
```

Validação e segurança

- Verifique `$_FILES` no servidor e valide `type` e `size`.
- Não confie apenas no MIME informado pelo cliente; verifique a extensão e, quando possível, o conteúdo.
- Defina permissões seguras ao mover arquivos para o servidor.

## Métodos principais

- `__construct(string $name)`
- `setSize(string $size)`
- `setProperty(string $name, $value)`
- `setValue($value)`
- `getValue()`

No servidor, valide `$_FILES` e trate upload com segurança.
