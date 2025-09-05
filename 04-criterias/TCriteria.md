# TCriteria

Resumo curto (≤750 palavras):
TCriteria é a classe que representa condições (filtros) usadas em consultas do Adianti. Ela agrega expressões (normalmente `TFilter`) e operadores lógicos (AND/OR), carrega propriedades de paginação/ordenação e produz a expressão final (com suporte a prepared vars). Use `TCriteria` para construir consultas compostas e reutilizáveis, e para passar parâmetros a `TRepository`, `TSqlSelect` e widgets de listagem.

Métodos principais e comportamento
- __construct() — inicializa a lista de expressões, operadores e propriedades (order, offset, direction, group).
- static create($simple_filters, $properties = null) — fábrica conveniente que converte um array simples em filtros `TFilter` e aplica propriedades.
- add(TExpression $expression, $operator = TExpression::AND_OPERATOR) — adiciona uma expressão (TFilter ou outra TCriteria) com operador lógico; o primeiro não recebe operador.
- mergeCriteria(TCriteria $criteria) — incorpora expressões/outros operadores de outro `TCriteria`.
- isEmpty() — verifica se não existem expressões.
- getPreparedVars() — retorna o array com todos os valores preparados (útil para prepared statements).
- dump($prepared = FALSE) — concatena e retorna a expressão SQL final (ex.: "(name LIKE ? AND age > ?)"), respeitando case-insensitive quando ativado.
- setProperty($property, $value) / getProperty($property) — manipula propriedades pontuais (limit, offset, order).
- setProperties($properties) — aplica várias propriedades (usado por controllers para aplicar order/offset/direction).
- resetProperties() — zera propriedades de paginação/ordenação.
- setCaseInsensitive(bool) / getCaseInsensitive() — forçar buscas case-insensitive, propagado às expressões.

Exemplos práticos

1) Criar critérios simples

```php
$criteria = new TCriteria;
$criteria->add(new TFilter('name', 'like', '%João%'));
$criteria->add(new TFilter('active', '=', 1));
```

2) Usar a fábrica `create()` com array simples

```php
$simple = ['name' => 'João', 'active' => 1];
$props = ['order' => 'name', 'direction' => 'asc', 'limit' => 20];
$criteria = TCriteria::create($simple, $props);
```

3) Combinar critérios (merge) e operadores OR

```php
$c1 = new TCriteria;
$c1->add(new TFilter('country', '=', 'BR'));

$c2 = new TCriteria;
$c2->add(new TFilter('role', '=', 'admin'));
// mescla c2 em c1 (expressões de c2 serão adicionadas)
$c1->mergeCriteria($c2);

// usar OR entre expressões
$cOr = new TCriteria;
$cOr->add(new TFilter('type', '=', 'A'), TExpression::OR_OPERATOR);
$cOr->add(new TFilter('type', '=', 'B'), TExpression::OR_OPERATOR);
```

4) Usar com `TRepository` para paginação e ordenação

```php
$repository = new TRepository('Integrante');
$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'like', '%Silva%'));
$criteria->setProperties(['order'=>'nome','direction'=>'asc','offset'=>0]);
$criteria->setProperty('limit', 20);
$objects = $repository->load($criteria);
```

Boas práticas e pontos importantes
- Prefira usar `getPreparedVars()` + `dump(TRUE)` ao executar queries preparadas.
- Use `setProperties` para aplicar parâmetros vindos de UI (order, offset, direction) de forma segura.
- `mergeCriteria` é útil para combinar filtros padrão (prefilters) com filtros da UI.
- Ative `setCaseInsensitive(true)` quando desejar buscas insensíveis a maiúsculas/minúsculas (propaga para filters que suportam isso).

Referência de código: `lib/adianti/database/TCriteria.php`.
