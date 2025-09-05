## AdiantiMasterDetailTrait

Resumo das operações de master-detail encontradas em `lib/adianti/base/AdiantiMasterDetailTrait.php`.

Principais métodos:
- `storeItems($model, $foreign_key, $master_object, $detail_id, ?Callable $transformer = null)` — persiste itens do detalhe armazenados em sessão, assinalando chave estrangeira e removendo itens não presentes.
- `loadItems($model, $foreign_key, $master_object, $detail_id, ?Callable $transformer = null)` — carrega itens do banco para sessão, preparando o formgrid.

Comportamento:
- Os itens de detalhe são mantidos na sessão (`TSession::setValue("{$detail_id}_items", ...)`) até a persistência.
- Aceita `transformer` para ajustes entre master e detail antes de armazenar.

Referência: `lib/adianti/base/AdiantiMasterDetailTrait.php`.
