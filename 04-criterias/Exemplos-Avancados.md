# Exemplos Avançados de Criterias e Filters

Resumo curto (≤750 palavras):
Este arquivo reúne padrões práticos para consultas mais complexas usando `TCriteria` e `TFilter`: subconsultas, JOINs com `TSqlSelect`, UNIONs, e como combinar filtros dinâmicos e prepared vars de forma segura.

1) Subconsulta e IN

```php
// carregar usuários que aparecem em uma subconsulta
$sub = new TSqlSelect;
$sub->setEntity('session');
$sub->addColumn('user_id');
$sub->setCriteria( TCriteria::create(['active'=>1]) );

// usar subselect como valor de TFilter
$criteria = new TCriteria;
$criteria->add( new TFilter('id', 'IN', '(' . $sub->getInstruction() . ')') );
```

2) JOINs e agregação (TSqlSelect)

Para consultas com JOINs complexos e agregações use `TSqlSelect` e aplique `TCriteria` para filtros dinâmicos:

```php
$sql = new TSqlSelect;
$sql->setEntity('pedido');
$sql->addColumn('pedido.id');
$sql->addColumn('cliente.nome');
$sql->addColumn('sum(item.valor) as total');
$sql->setJoin('JOIN cliente ON cliente.id = pedido.cliente_id');
$sql->setJoin('JOIN item ON item.pedido_id = pedido.id');

$criteria = new TCriteria;
$criteria->add(new TFilter('pedido.data', '>=', '2024-01-01'));
$sql->setCriteria($criteria);
$sql->setGroupBy('pedido.id, cliente.nome');
```

3) UNION de selects

Use `TSqlSelect` para criar instruções e concatene o SQL manualmente quando necessário; depois use `TDatabase::getData()` para executar.

4) Combinar critérios padrão + UI

```php
$prefilters = TCriteria::create(['unit_id' => TSession::getValue('unitid')]);
$uiCriteria = new TCriteria;
$uiCriteria->add(new TFilter('nome', 'like', "%{$q}%"));

$uiCriteria->mergeCriteria($prefilters);
$repo = new TRepository('Integrante');
$objects = $repo->load($uiCriteria);
```

5) Prepared vars e segurança

- Para queries preparadas, prefira `dump(TRUE)` nas expressões e `getPreparedVars()` para obter os binds.
- Ao aceitar `order` dinâmico da UI, valide contra whitelist de colunas antes de aplicar em `setProperty('order', $value)`.

6) Exemplo real rápido (filtro composto + paginação)

```php
$criteria = new TCriteria;
$criteria->add(new TFilter('nome', 'like', "%{$search}%"));
$criteria->add(new TFilter('status', '=', 1));
$criteria->setProperties(['order'=>'nome','direction'=>'asc','offset'=>$offset]);
$criteria->setProperty('limit', 20);

$repo = new TRepository('Integrante');
$objects = $repo->load($criteria);
$count = $repo->count($criteria);
```

Referências: `lib/adianti/database/TCriteria.php`, `lib/adianti/database/TFilter.php`, `lib/adianti/database/TSqlSelect.php`.
