## AdiantiDatabaseWidgetTrait

Trait auxiliar para widgets que precisam popular itens a partir do banco.

Principais métodos:
- `getItemsFromModel($database, $model, $key, $value, $ordercolumn = NULL, ?TCriteria $criteria = NULL)` — retorna array key=>value para popular selects/combos.
- `getObjectsFromModel($database, $model, $key, $ordercolumn = NULL, ?TCriteria $criteria = NULL)` — retorna objetos carregados do modelo.

Comportamento:
- Abre transação fake se necessário para trocar de conexão.
- Aceita `TCriteria` para filtrar/ordernar.

Referência: `lib/adianti/widget/wrapper/AdiantiDatabaseWidgetTrait.php`.
