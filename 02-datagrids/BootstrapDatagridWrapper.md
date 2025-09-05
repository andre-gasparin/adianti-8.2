BootstrapDatagridWrapper
=======================

Visão geral
-----------
Decorator que aplica classes e pequenas adaptações visuais do Bootstrap sobre um `TDataGrid` ou `TQuickGrid`. Define classes, remove classes internas conflitantes e ajusta estilos para a renderização com Bootstrap.

Comportamento
- No construtor, atribui `class = 'table table-striped table-hover'`, marca o widget como `bootstrapdatagridwrapper` e `type = 'bootstrap'`.
- Redireciona chamadas (`__call`, `__get`, `__set`) para o objeto decorado.
- No `show()`, limpa classes internas de linhas e converte grupos (`tdatagrid_group`) para `info` (estilo Bootstrap).

Uso
```php
$datagrid = new \Adianti\Widget\Datagrid\TDataGrid;
$wrapper = new \Adianti\Wrapper\BootstrapDatagridWrapper($datagrid);
$wrapper->addColumn(new \Adianti\Widget\Datagrid\TDataGridColumn('id','ID'));
$wrapper->createModel();
$wrapper->addItems([ (object)['id'=>1] ]);
$wrapper->show();
```

Onde olhar no código
- `lib/adianti/wrapper/BootstrapDatagridWrapper.php`
