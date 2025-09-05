TDataGridColumn
================

Visão geral
-----------
Representa uma coluna no `TDataGrid`. Controla label, alinhamento, largura, ações de ordenação, transformação de valores, propriedades de renderização e totais.

Métodos principais
- `__construct($name, $label, $align, $width = NULL)` — nome, rótulo, alinhamento e largura
- `setVisibility($bool)` — mostra/oculta coluna via CSS
- `enableAutoHide($width)` — auto-oculta em larguras pequenas
- `disablePrinting()` — exclui coluna na exportação
- `enableSearch()` / `isSearchable()` / `getInputSearch()` — habilita campo de busca por coluna
- `enableHtmlConversion()` / `disableHtmlConversion()` / `hasHtmlConversionEnabled()` — controle de htmlspecialchars
- `setProperty($name,$value)` / `getProperty()` / `getProperties()` — propriedades do cabeçalho
- `setDataProperty($name,$value)` / `getDataProperty()` / `getDataProperties()` — propriedades de células
- `setAction(TAction $action, $parameters = null)` / `getAction()` / `removeAction()` — ação de ordenação/ordenação por coluna
- `setEditAction(TDataGridAction $editaction)` / `getEditAction()` — ação de edição inline
- `setTransformer(Callable $callback)` / `getTransformer()` — transforma valor exibido
- `enableTotal($function, $prefix = null, $decimals = 2, $decimal_separator = ',', $thousand_separator = '.')` — ativa totais (sum e callbacks)
- `setTotalFunction(Callable $callback, $apply_transformer = true)` / `getTotalCallback()` — callback customizado para total
- `getName()` / `getLabel()` / `setLabel()` / `getAlign()` / `getWidth()` — getters e setter básicos

Exemplo — coluna com transformer e total
```php
$col = new \Adianti\Widget\Datagrid\TDataGridColumn('price','Preço','right',100);
$col->setTransformer(function($value){ return number_format($value,2,',','.'); });
$col->enableTotal('sum','R$');
$grid->addColumn($col);
```

Notas rápidas
- Use `setDataProperty` para atributos específicos da célula (ex: `style`, `data-*`).
- `enableSearch()` cria um `TEntry` interno usado com `TDataGrid::enableSearch()`.

Onde olhar no código
- `lib/adianti/widget/datagrid/TDataGridColumn.php`
