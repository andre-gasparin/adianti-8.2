Critérios de Busca (TCriteria)
=============================

Visão geral
-----------
`TCriteria` agrupa `TFilter`s e propriedades (order, limit, offset, group) para construir consultas reutilizáveis.

API principal (`TCriteria`)
- `__construct()` — inicializa propriedades
- `add(TExpression $expression, $operator = TExpression::AND_OPERATOR)` — adiciona filtro/expressão
- `mergeCriteria(TCriteria $criteria)` — mescla outro critério
- `create($simple_filters, $properties = null)` — cria critério a partir de array simples
- `getPreparedVars()` / `dump($prepared = FALSE)` — preparar/extrair expressão final
- `setProperty($property,$value)` / `getProperty($property)` — manipular offset/limit/order
- `setCaseInsensitive(bool)` / `getCaseInsensitive()` — tornar buscas case-insensitive

Exemplo prático
```php
use Adianti\Database\TCriteria;
use Adianti\Database\TFilter;

$criteria = new TCriteria();
$criteria->add(new TFilter('age', '>=', 18));
$criteria->add(new TFilter('status', '=', 'active'));
$criteria->setProperty('order', 'name');
$criteria->setProperty('limit', 20);

$repository->load($criteria);
```

Boas práticas
- Use `create()` para montar critérios simples a partir de arrays de filtros.
- Use `mergeCriteria()` para compor filtros reutilizáveis.

Onde olhar no código
- `lib/adianti/database/TCriteria.php`
