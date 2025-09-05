TQuickGrid
=======

Visão geral
-----------
`TQuickGrid` é um wrapper simplificado sobre `TDataGrid` que fornece métodos convenientes para adicionar colunas e ações de forma rápida.

Métodos principais
- `addQuickColumn($label, $name, $align='left', $size=200, ?TAction $action=null, $param=null)` — cria internamente `TDataGridColumn` e registra na grid
- `addQuickAction($label, TDataGridAction $action, $field, $icon = NULL)` — adiciona uma ação pronta (label, ícone, campo de referência)

Exemplo rápido
```php
$grid = new \Adianti\Widget\Wrapper\TQuickGrid;
$grid->addQuickColumn('ID','id','right',50);
$grid->addQuickColumn('Nome','name', 'left', 200);
$grid->createModel();
$grid->addItems([ (object)['id'=>1,'name'=>'Ana'] ]);
$grid->show();
```

Notas
- Útil para listas simples quando não há necessidade de configurar transformadores ou edição inline.
- Internamente reutiliza `TDataGrid` para renderização completa.

Onde olhar no código
- `lib/adianti/widget/wrapper/TQuickGrid.php`
