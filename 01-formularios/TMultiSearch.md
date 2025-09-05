## TMultiSearch — Busca múltipla com autocomplete

Resumo
TMultiSearch é um componente de seleção com suporte a busca (autocomplete) e seleção múltipla (ou única), baseado em `select2`. Permite configuração de tamanho, limite de seleção, ações de mudança e callbacks JS.

Principais métodos
- __Construtor__: `new TMultiSearch(string $name)`
- `disableMultiple()` — remove seleção múltipla
- `disableClear()` — desliga a opção de limpar seleção
- `disableSearch()` — desliga a busca (apenas lista)
- `setSize($width, $height = NULL)` / `getSize()`
- `setMinLength(int $length)` — tamanho mínimo para iniciar busca
- `setMaxSize(int $maxsize)` — limita quantidade de itens selecionáveis
- `setValueSeparator(string $sep)` — define separador quando necessário
- `setValue($value)` / `getPostData()` — definir valor e obter POST
- `enableField($form_name, $field)` / `disableField($form_name, $field)` / `clearField($form_name, $field)` — helpers JS
- `setOption($option, $value)` — opções extras (passadas ao JS)
- `show()` — renderiza e inicia `tmultisearch_start()` no client

Comportamento/Opções relevantes
- `minlen` (minLength), `maxsize`, `placeholder`, `multiple`, `width`, `height`, `allowclear`, `allowsearch`, `with_titles`.
- `changeAction` — pode ser um `TAction` serializado para chamada de lookup (post) quando o valor muda.

Exemplo básico

```php
$ms = new TMultiSearch('tags');
$ms->setSize('100%', 120);
$ms->setMinLength(2);
$ms->setMaxSize(5);
$ms->setOption('placeholder', 'Busque tags...');
$ms->setValue(['php','framework']);
$form->addField($ms);
```

Exemplo com changeAction (servidor)

```php
$action = new TAction(['TagListService', 'onChange']);
$ms = new TMultiSearch('tags');
$ms->setChangeAction($action);
$form->addField($ms);
```

Observações
- Em compatibilidade com versões antigas, `setValue()` adapta formatos via `AdiantiApplicationConfig`.
- Para widgets baseados em DB (ex.: `TDBMultiSearch`) use os wrappers disponíveis que herdam `TMultiSearch`.

Fim
