Filtros de Coluna
=================

Visão geral
-----------
Filtros (`TFilter`) são usados dentro de um `TCriteria` para selecionar registros no banco. Cada filtro representa uma comparação (ex: `name LIKE '%x%'`, `age >= 18`, `id IN (...)`).

API principal (`TFilter`)
- `__construct($variable, $operator, $value, $value2 = NULL)` — cria o filtro
- `dump($prepared = FALSE)` — retorna a expressão SQL (ou preparada)
- `getPreparedVars()` — retorna variáveis preparadas para binding
- `setCaseInsensitive(bool)` / `getCaseInsensitive()` — busca case-insensitive para operadores LIKE

Uso básico (exemplo)
```php
use Adianti\Database\TCriteria;
use Adianti\Database\TFilter;

$filter = new TFilter('name', 'LIKE', "'%john%'");
$criteria = new TCriteria();
$criteria->add($filter);

// usar com Repository/Active Record
$repository->load($criteria);
```

Prepared statements (safe)
```php
$filter = new TFilter('id', 'IN', [1,2,3]);
// ao chamar dump(true) o TFilter retorna placeholders e getPreparedVars() traz os valores
```

Boas práticas
- Prefira `dump(true)` e `getPreparedVars()` para binding quando montar queries complexas.
- Use `setCaseInsensitive(true)` antes de `dump()` para forçar UPPER(...) em `LIKE`.
- Ao aceitar entrada do usuário, use operadores e valores preparados para evitar injeção.

Onde olhar no código
- `lib/adianti/database/TFilter.php`
