TDataGridActionGroup
====================

Visão geral
-----------
`TDataGridActionGroup` organiza ações em um menu dropdown dentro de uma célula do datagrid, permitindo cabeçalhos e separadores internos.

API principal
- `__construct($label, $icon = NULL)` — rótulo e ícone do grupo
- `addAction(TAction $action)` — adiciona uma ação ao grupo
- `addSeparator()` — adiciona um separador entre itens
- `addHeader($header)` — adiciona um cabeçalho de seção dentro do dropdown
- `getActions()` / `getHeaders()` / `getSeparators()` — getters

Exemplo
```php
$group = new \Adianti\Widget\Datagrid\TDataGridActionGroup('Mais', 'fa:ellipsis-v');
$group->addHeader('Operações');
$group->addAction(new \Adianti\Widget\Datagrid\TDataGridAction(['MyController','onView']));
$group->addSeparator();
$group->addAction(new \Adianti\Widget\Datagrid\TDataGridAction(['MyController','onExport']));
$grid->addActionGroup($group);
```

Onde olhar no código
- `lib/adianti/widget/datagrid/TDataGridActionGroup.php`
