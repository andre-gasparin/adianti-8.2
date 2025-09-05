## AdiantiStandardCollectionTrait

Trait com a lógica central para coleções/listagens (filtros, ordenação, carregamento).

Principais métodos e responsabilidades:
- `addFilterField($filterField, $operator = 'like', $formFilter = NULL, $filterTransformer = NULL, $logic_operator = TExpression::AND_OPERATOR)` — registra campos de filtro.
- `onSearch($param = null)` — constrói filtros a partir do formulário, armazena em sessão e chama `onReload`.
- `onReload($param = NULL)` — constrói `TCriteria`, instancia `TRepository` e popula `$this->datagrid` com objetos.
- `setTransformer($callback)` / `setAfterLoadCallback($callback)` — hooks para pós-processamento dos objetos carregados.

Comportamento: trata paginação, contagem de registros, e integração com `TPageNavigation` quando presente.

Referência: `lib/adianti/base/AdiantiStandardCollectionTrait.php`.
