## Componentes de Grid (TDataGridColumn)

Resumo dos métodos e propriedades mais usados em `TDataGridColumn`.

Construtor:
- `new TDataGridColumn($name, $label, $align, $width = NULL)`

Principais métodos:
- `setVisibility($bool)` — mostra/oculta coluna.
- `enableAutoHide($width)` — esconde coluna automaticamente em larguras menores.
- `disablePrinting()` / `isPrintable()` — controla exportação.
- `enableSearch()` / `isSearchable()` / `getInputSearch()` — ativa campo de busca na coluna.
- `enableHtmlConversion()` / `disableHtmlConversion()` / `hasHtmlConversionEnabled()` — controla escape de HTML.
- `setProperty($name, $value)` / `getProperty($name)` — propriedades do header.
- `setDataProperty($name, $value)` / `getDataProperty($name)` — propriedades dos dados da coluna.
- `setAction(TAction $action, $parameters = null)` / `getAction()` / `removeAction()` — ação ao clicar no header.
- `setEditAction(TDataGridAction $editaction)` / `getEditAction()` — ação de edição direta.
- `setTransformer(Callable $callback)` / `getTransformer()` — transformação do valor antes de exibir.
- `enableTotal($function, $prefix = null, $decimals = 2, $decimal_separator = ',', $thousand_separator = '.')` — ativa totalizações (sum etc.).
- `setTotalFunction(Callable $callback, $apply_transformer = true)` — callback customizado para total.

Exemplo de uso:

```php
$col = new TDataGridColumn('price', 'Preço', 'right', 100);
$col->setTransformer(function($value){ return number_format($value,2,',','.'); });
$col->enableTotal('sum', 'Total');
$datagrid->addColumn($col);
```

Referências: `lib/adianti/widget/datagrid/TDataGridColumn.php`.
