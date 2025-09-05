# TModalForm — Formulário Modal

Descrição rápida

`TModalForm` é usado para exibir formulários em janelas modais. Ideal para edição rápida sem recarregar a página. Difere do `TForm` apenas na apresentação (modal) e integração com JavaScript para abertura/fechamento.

Contrato

- Entrada: um `TForm` ou campos adicionados ao modal
- Saída: mesmo comportamento de `TForm` (getData, validação)
- Erros: validação apresentada dentro do modal

Exemplo básico

```php
// arquivo: docs/01-formularios/examples/tmodalform_example.php
require_once 'init.php';

$modal = new TModalForm('modal_user');
$modal->setTitle('Editar usuário');

$name = new TEntry('name');
$email = new TEntry('email');

$modal->addField($name);
$modal->addField($email);

$saveAction = new TAction(['UserForm', 'onSave']);
$modal->addAction('Salvar', $saveAction, 'fa:save');

// abrir via JS (exemplo)
TScript::create("Adianti.openModal('modal_user');");

$modal->show();
```

Dicas de usabilidade

- Use modais para edições rápidas e confirmação.
- Ao submeter, feche o modal no callback de sucesso e atualize a lista via `Adianti.replaceRowById()` ou recarregue a grid.
- Garanta foco no primeiro campo ao abrir para acessibilidade.

Limitações

- Evite formulários muito extensos em modal. Se necessário, prefira páginas dedicadas.
- Scripts personalizados devem ser adicionados com `TScript::create()`.

## Métodos principais

- `__construct(string $name = 'modal')`
- `setTitle(string $title)`
- `addField(AdiantiWidgetInterface $field)`
- `addAction(string $label, TAction $action, string $icon = null)`
- `show()`
- `hide()`
- `setSize(int $width, int $height)`

Esses métodos cobrem a maior parte do uso prático do modal; verifique implementações locais caso precise de callbacks JS adicionais.
