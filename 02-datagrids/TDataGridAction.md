TDataGridAction
================

Visão geral
-----------
`TDataGridAction` estende `TAction` para uso dentro de datagrids. Ajuda a configurar quais campos da linha serão passados, ícone, rótulo, comportamento de envio (POST) e condições de exibição.

Métodos principais
- `__construct($action, $parameters = null)` — cria a ação; parâmetros podem ser usados para mapear campos
- `enablePost()` — força envio via POST
- `setField($field)` / `getField()` — define um campo-chave a ser enviado (ex: id)
- `setFields($fields)` / `getFields()` — define múltiplos campos
- `fieldDefined()` — verifica se há ao menos um field definido
- `setImage($image)` / `getImage()` — define ícone
- `setLabel($label)` / `getLabel()` — define label visível
- `setTitle($title)` / `getTitle()` — define tooltip
- `setButtonClass($class)` / `getButtonClass()` — define classe do botão
- `setUseButton($bool)` / `getUseButton()` — obrigar renderizar como botão
- `setDisplayCondition($callback)` / `getDisplayCondition()` — define condição para exibir a ação
- `prepare($object)` — valida que os campos existem e prepara a ação para o objeto
- `serialize($format_action = TRUE, $check_permission = FALSE)` — converte para URL, preservando parâmetros de paginação e verificação de permissão

Exemplo
```php
$action = new \Adianti\Widget\Datagrid\TDataGridAction(['MyController','onEdit']);
$action->setField('id');
$action->setImage('fa:edit');
$action->setLabel('Editar');
$grid->addAction($action);
```

Notas
- Chame `setField` ou `setFields` antes de usar `prepare()`; caso contrário `prepare()` lança exceção.
- `serialize()` adiciona parâmetros de paginação automaticamente quando aplicável.

Onde olhar no código
- `lib/adianti/widget/datagrid/TDataGridAction.php`
