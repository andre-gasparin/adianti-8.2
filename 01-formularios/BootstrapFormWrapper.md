## BootstrapFormWrapper — Wrappers do Bootstrap para formulários

Resumo
`BootstrapFormWrapper` decora um `TQuickForm` para renderizá-lo com classes e grid do Bootstrap (form-horizontal, form-inline, form-vertical). Ele delega a maior parte das chamadas ao formulário decorado e controla layout, rótulos e botões.

Principais métodos
- __Construtor__: `new BootstrapFormWrapper(TQuickForm $form, string $class = 'form-horizontal')`
- `setClientValidation(bool $bool)` — habilita/desabilita validação do HTML5 (`novalidate`)
- `getElement()` — retorna o elemento `form` decorado (TElement)
- Delegação via `__call()` para todos os métodos do `TQuickForm` (ex.: `addField`, `setData`, `show`, etc.)
- `show()` — renderiza com grid Bootstrap; controla `fieldsByRow`, `labelClass` e `fieldClass` e empacota campos em `row` e `col-sm-*`.

Comportamento e boas práticas
- Use `setName()`/`getName()` para sincronizar nome/ID do form.
- Para layouts diferentes, passe `'form-inline'` ou `'form-vertical'` no construtor e ajuste `setFieldsByRow()` no `TQuickForm`.
- O wrapper cuida de `ActionButtons` alinhados corretamente quando `form-horizontal`.

Exemplo

```php
$quick = new TQuickForm('myform');
$wrapper = new BootstrapFormWrapper($quick, 'form-horizontal');
$wrapper->setClientValidation(true);

$entry = new TEntry('name');
$wrapper->addField($entry);

$wrapper->show();
```

Fim
