# Relacionamentos (Exemplo: Integrante)

Resumo curto (≤750 palavras):
O exemplo `Integrante` demonstra padrões comuns de relacionamentos no Adianti: 1:1 (set/get), 1:N (hasMany/loadComposite) e N:N (tabela de junção). O padrão segue métodos `set_<relation>`/`get_<relation>` na model para facilitar atribuição e carregamento preguiçoso.

1:1 — set/get helpers
- Em `Integrante.php` existem métodos como `set_cidade(Cidade $object)` e `get_cidade()`.
- `set_cidade` atribui o objeto e popula a FK (`$this->cidade_id = $object->id`).
- `get_cidade` carrega o objeto se não estiver presente: `if (empty($this->cidade)) $this->cidade = new Cidade($this->cidade_id);`.

1:N — carregar coleções
- Métodos gerados no exemplo:
  - `getCalendarioIntegrantes()` usa um `TCriteria` para `CalendarioIntegrante::getObjects($criteria)`.
  - `hasMany($class, $foreign_key)` (do TRecord) também é uma forma padrão para obter coleções.
- Padrões de persistência: para coleções dependentes, o exemplo apaga registros da tabela de junção e re-insere novos no `onSave` do form.

N:N — tabela de junção (aggregate/belongsToMany)
- Exemplo: `MotoclubeUnidadeIntegrante` liga `Integrante` e `MotoclubeUnidade`.
- Fluxo de salvamento no form:
  - `$repository = MotoclubeUnidadeIntegrante::where('integrante_id', '=', $object->id); $repository->delete();` — apaga vínculos antigos.
  - Itera os ids enviados e cria novos objetos `MotoclubeUnidadeIntegrante` com `store()`.
- `loadAggregate` / `saveAggregate` e `loadAggregateIds` (TRecord) suportam operações N:N de forma encapsulada.

Atributos "to_string" e arrays
- O exemplo inclui getters/setters que convertem arrays em strings (ex.: `set_calendario_integrante_integrante_to_string`) e vice-versa, armazenando valores em `vdata` para exibição sem persistência direta.

Boas práticas
- Para relações complexas, prefira `TRepository` + `TCriteria` para leitura paginada.
- Usar transação ao salvar objeto principal e suas relações para garantir atomicidade.
- Considere modelar métodos utilitários no AR para encapsular lógica de sincronização de relações (ex.: `syncMotoclubeUnidades(array $ids)`).

Referência: `example-crud/Integrante.php`, `example-crud/IntegranteForm.php`.
