TDataGrid
======

Visão geral
-----------
`TDataGrid` é o componente base para tabelas no Adianti Framework. Permite definir colunas, ações, agrupamentos, totais, navegação por páginas e renderização responsiva.

Contrato rápido
- Entrada: colunas (`TDataGridColumn`), ações (`TDataGridAction`), objetos (arrays de registros)
- Saída: HTML gerado pela árvore de `TElement`

Métodos principais
- `__construct()` — inicializa propriedades padrão
- `addColumn(TDataGridColumn $object, ?TAction $action = null)` — adiciona coluna
- `getColumns()` — retorna colunas
- `addAction(TDataGridAction $action, $label = null, $image = null)` — adiciona ação de linha
- `addActionGroup(TDataGridActionGroup $object)` — adiciona grupo de ações
- `createModel($create_header = true)` — constrói a estrutura (thead/tbody)
- `addItems(array $objects, $with_data_key = false)` — adiciona múltiplos objetos (chama `addItem`)
- `addItem($object)` — gera uma linha a partir do objeto
- `setHeight($height)` / `getHeight()` — define altura (px ou CSS)
- `makeScrollable()` / `isScrollable()` — ativa modo com corpo rolável
- `setPageNavigation($pageNavigation)` / `getPageNavigation()` — integra paginação
- `setSearchForm($form)` / `getSearchForm()` — integra formulário de busca
- `setMetadata($key,$value)` / `getMetadata($key)` — metadata arbitrária
- `setActionSide($side)` — define side das ações (`left`/`right`)
- `prepareForPrinting()` — prepara a grid para impressão (remove ações)
- `show()` — processa totais e renderiza a grid

Casos de uso (exemplo mínimo)
```php
$grid = new \Adianti\Widget\Datagrid\TDataGrid;
$grid->addColumn(new \Adianti\Widget\Datagrid\TDataGridColumn('id','ID','right',50));
$grid->addColumn(new \Adianti\Widget\Datagrid\TDataGridColumn('name','Nome','left',200));
$grid->createModel();
$rows = [ (object)['id'=>1,'name'=>'Ana'], (object)['id'=>2,'name'=>'Bruno'] ];
$grid->addItems($rows);
$grid->show();
```

Edge cases
- Chamar `addItem` antes de `createModel()` lança exceção
- `enableSearch()` deve ser chamado antes de `addItem()`

Onde olhar no código
- `lib/adianti/widget/datagrid/TDataGrid.php`
