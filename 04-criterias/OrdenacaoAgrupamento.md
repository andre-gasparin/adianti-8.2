# ORDER BY e GROUP BY (TCriteria)

Resumo curto (≤750 palavras):
`TCriteria` possui propriedades para ordenação (`order`, `direction`) e agrupamento (`group`) que são aplicadas por `TRepository` e `TSqlSelect`. Use `setProperty`/`setProperties` para definir `order`, `direction`, `offset` e `limit`. `GROUP BY` pode ser definido diretamente em `TSqlSelect` ou em `TCriteria` através da propriedade `group`.

Como usar
- Ordenação
  - `$criteria->setProperty('order', 'nome');`
  - `$criteria->setProperty('direction', 'asc');`
  - Ou `$criteria->setProperties(['order'=>'nome','direction'=>'asc']);`
- Limite e offset
  - `$criteria->setProperty('limit', 20);`
  - `$criteria->setProperty('offset', 40);`
- Agrupamento
  - `$criteria->setProperty('group', 'categoria');`

Exemplo prático
```php
$criteria = new TCriteria;
$criteria->add(new TFilter('ativo', '=', 1));
$criteria->setProperties(['order'=>'nome','direction'=>'asc']);
$criteria->setProperty('limit', 20);

$repo = new TRepository('Produto');
$produtos = $repo->load($criteria);
```

Notas e boas práticas
- Valide e escape nomes de colunas ao gerar `order` dynâmico para evitar injeção (use whitelist quando aceitar valores da UI).
- Para consultas com `GROUP BY`, use `TSqlSelect` diretamente quando precisar de expressões ou aliases complexos.
- `TCriteria::resetProperties()` zera order/offset/limit/group.

Referência: `lib/adianti/database/TCriteria.php` e `lib/adianti/database/TSqlSelect.php`.
