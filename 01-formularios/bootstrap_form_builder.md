# BootstrapFormBuilder — Construtor de formulários Bootstrap

Descrição rápida

`BootstrapFormBuilder` é um builder que integra os componentes do Adianti com classes e grid do Bootstrap, facilitando layout responsivo e agrupamento de campos em colunas.

Contrato

- Entrada: campos TField adicionados via `addField()` ou `addFields()`.
- Saída: HTML compatível com Bootstrap; método `show()` renderiza o formulário.
- Erros: validação e mensagens seguem o padrão do framework.

Exemplo prático

```php
// arquivo: docs/01-formularios/examples/bootstrap_form_builder_example.php
require_once 'init.php';

$form = new BootstrapFormBuilder('user_form');
$form->setFormTitle('Cadastro de usuário');
$form->setFieldSizes('col-sm-6');

$name = new TEntry('name');
$email = new TEntry('email');
$password = new TPassword('password');

$form->addFields([new TLabel('Nome'), $name], [new TLabel('Email'), $email]);
$form->addFields([new TLabel('Senha'), $password]);

$saveAction = new TAction(['UserForm', 'onSave']);
$form->addAction('Salvar', $saveAction, 'fa:save');

$form->show();
```

Boas práticas

- Use `setFieldSizes()` para controlar colunas e responsividade.
- Para formulários com abas, combine com `appendPage()`.
- Ative CSRF com `enableCSRFProtection()` em formulários públicos.

Edge cases

- Campos dinâmicos podem exigir reindexação de nomes antes do `getData()`.
- Validações complexas preferir no servidor (model) e retornar mensagens ao formulário.

Referências

- Veja `docs/01-formularios/tform.md` e `tmodalform.md` para integração e exemplos adicionais.

## Métodos principais

- `__construct(string $name = 'my_form')`
- `setClientValidation(bool $bool)`
- `enableClientValidation()`
- `enableCSRFProtection()`
- `addFields(...$fields)` — adiciona um ou mais campos em colunas
- `addField(AdiantiWidgetInterface $field)`
- `setFieldSizes(string $size)` — ex: 'col-sm-6'
- `setFormTitle(string $title)`
- `appendPage(string $title)` — adiciona aba
- `validate()`
- `show()`

Use esses métodos para construir formulários complexos com layout responsivo.
