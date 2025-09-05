# TFilter

Resumo curto (≤750 palavras):
TFilter representa um único predicado usado em `TCriteria`. Ele aceita variáveis (colunas), operadores e valores, produzindo a expressão SQL e, quando solicitado, o array de prepared vars. Suporta arrays (`IN`), `BETWEEN`, subselects, variáveis de sessão e valores não escapados (`NOESC:`), além de conversões para buscas case-insensitive.

Construtor
- __construct($variable, $operator, $value, $value2 = NULL)
  - `$variable`: nome da coluna ou expressão
  - `$operator`: exemplo: `=`, `>`, `<`, `LIKE`, `IN`, `BETWEEN`, `ILIKE` etc.
  - `$value`: valor ou array ou subselect
  - `$value2`: segundo valor para `BETWEEN`

Comportamento e transformações
- Arrays: valores em array viram `(v1,v2,...)`. Em modo `prepared` cada valor vira um placeholder `:par_N` e é colocado em `preparedVars`.
- Strings: por padrão são retornadas com aspas, mas em `prepared` vira `:par_N` em `preparedVars`.
- Subselects: se `$value` começa com `(SELECT`, é tratado como subselect (não é escapado) e `:[name]:` pseudo-params dentro do subselect são substituídos por placeholders preparados.
- NOESC: prefixo `NOESC:` permite passar SQL cru sem escaping.
- Sessão: `{session.var}` é substituído por `TSession::getValue('var')`.
- Booleanos e nulos: `TRUE`/`FALSE` e `NULL` são convertidos apropriadamente.

Prepared vars
- Chame `dump(TRUE)` em `TFilter` para obter a expressão usando placeholders, e `getPreparedVars()` para obter o array de binds.

Exemplos

1) IN (array)
```php
$f = new TFilter('id', 'IN', [1,2,3]);
// dump(FALSE) => "id IN (1,2,3)"
// dump(TRUE)  => "id IN (:par_1,:par_2,:par_3)" e getPreparedVars() = [':par_1'=>1,':par_2'=>2,':par_3'=>3]
```

2) BETWEEN
```php
$f = new TFilter('created_at', 'BETWEEN', '2020-01-01', '2020-12-31');
// dump(FALSE) => "created_at BETWEEN '2020-01-01' AND '2020-12-31'"
```

3) Subselect
```php
$f = new TFilter('id', 'IN', '(SELECT user_id FROM session WHERE active = 1)');
```

4) NOESC e sessão
```php
$f = new TFilter('status', '=', 'NOESC:CURRENT_TIMESTAMP');
$f2 = new TFilter('unit_id', '=', '{session.unitid}');
```

5) Case insensitive
```php
$f = new TFilter('name', 'ilike', '%joao%');
$f->setCaseInsensitive(true); // transforma em UPPER(col) LIKE UPPER(:par)
```

Boas práticas
- Para queries preparadas, sempre prefira `dump(TRUE)` + `getPreparedVars()`.
- Substitua `NOESC:` apenas quando tiver certeza da origem do valor para evitar SQL injection.
- `TFilter` é compatível com `TCriteria` e `TRepository` para compor consultas complexas.

Referência de código: `lib/adianti/database/TFilter.php`.
