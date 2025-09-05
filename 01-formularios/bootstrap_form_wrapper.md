# BootstrapFormWrapper — Wrappers do Bootstrap

Descrição

`BootstrapFormWrapper` é um wrapper que adapta formulários do Adianti para classes e grid do Bootstrap. Ele facilita aplicar colunas, espaçamentos e estilos padronizados sem alterar a lógica do formulário.

Quando usar

- Quando você quer que formulários nativos do Adianti sigam o grid Bootstrap.
- Para aplicar estilos e classes de utilitários (margens, paddings, responsividade).

Exemplo

```php
// docs/01-formularios/examples/bootstrap_form_wrapper_example.php
require_once 'init.php';

$form = new BootstrapFormBuilder('user_form');
$form->setFormTitle('Cadastro de usuário');
$form->setFieldSizes('col-md-6');

// criar wrapper (exemplo conceitual)
$wrapper = new BootstrapFormWrapper($form);
$wrapper->setRowClass('g-3');
$wrapper->setLabelClass('col-form-label');

// renderiza com classes bootstrap aplicadas
$wrapper->show();
```

Métodos principais

- `__construct(TForm $form)`
- `setGrid(string $gridClass)` — define a classe do grid (ex: 'row')
- `setRowClass(string $class)` — define classes para linhas
- `setLabelClass(string $class)` — define classes para labels
- `setControlClass(string $class)` — define classes para controles
- `addClass(string $selector, string $class)` — adiciona classes customizadas
- `show()` — renderiza o formulário com o wrapper aplicado

Boas práticas

- Prefira aplicar regras de responsividade via `setFieldSizes()` do `BootstrapFormBuilder` quando possível.
- Use o wrapper para ajustes visuais; mantenha validação e lógica no backend.
