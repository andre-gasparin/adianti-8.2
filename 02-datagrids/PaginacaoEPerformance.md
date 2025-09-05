Paginação e Performance
=======================

Paginacao (TPageNavigation)
---------------------------
`TPageNavigation` gera os controles de paginação para `TDataGrid`. Principais métodos:
- `setLimit($limit)` / `getLimit()` — itens por página
- `setCount($count)` / `getCount()` — total de registros
- `setPage($page)` / `getPage()` — página atual
- `setFirstPage($first_page)` — primeira página exibida no cursor
- `setOrder($order)` / `setDirection($direction)` — ordenação
- `setAction($action)` — ação (TAction) chamada ao navegar
- `show()` — renderiza o componente

Performance e boas práticas
--------------------------
- Limite por página: sempre pagine grandes consultas (`setLimit`) para evitar OOM.
- Use `TCriteria` com `limit` e `offset` para leitura eficiente.
- Prefira carregar apenas os campos necessários no SELECT (projeção).
- Use índices no banco para colunas filtradas/ordenadas frequentemente.
- Evite transformers pesados em grids com milhares de linhas; prefira renderização do lado do cliente para visualizações muito densas.

Exemplo de integração
```php
$page = new \Adianti\Widget\Datagrid\TPageNavigation();
$page->setLimit(20);
$page->setCount($total_count);
$page->setAction(new \Adianti\Control\TAction(['MyController','onReload']));
$grid->setPageNavigation($page);
```

Onde olhar no código
- `lib/adianti/widget/datagrid/TPageNavigation.php`
