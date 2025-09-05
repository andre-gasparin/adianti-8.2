# THidden — Campo oculto

Descrição

`THidden` é um campo que armazena valores invisíveis para o usuário, como ids, tokens ou estados temporários. Útil para passar dados sem exibir no formulário.

Exemplo

```php
// docs/01-formularios/examples/thidden_example.php
require_once 'init.php';

$form = new TForm('form_hidden');

$id = new THidden('id');
$id->setValue(123);

$token = new THidden('csrf_token');
$token->setValue(TSession::getValue('csrf_token'));

$form->addField($id);
$form->addField($token);

$form->addAction('Salvar', new TAction(['HiddenController', 'onSave']));

$form->show();
```

Cuidados

- Não confie em dados vindos de campos ocultos; sempre valide no servidor.
- Para proteção CSRF, combine `THidden` com tokens gerados e verificados server-side.

## Métodos principais

- `__construct(string $name)`
- `setValue($value)`
- `getValue()`

Campos ocultos são simples, mas sempre trate os valores no servidor como não confiáveis.
