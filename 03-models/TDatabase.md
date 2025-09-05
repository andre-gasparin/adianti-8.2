# TDatabase

Resumo curto (≤750 palavras):
TDatabase é uma coleção de utilitários estáticos para tarefas de manipulação e migração de dados: criação/remoção de tabelas e colunas, inserção/atualização em massa, extração de dados brutos e funções de cópia entre conexões.

Métodos principais:
- dropTable($conn, $table, $ifexists = false)
- createTable($conn, $table, $columns)
- dropColumn($conn, $table, $column)
- addColumn($conn, $table, $column, $type, $options)
- insertData($conn, $table, $values, $avoid_criteria = null)
- updateData($conn, $table, $values, $criteria = null)
- clearData($conn, $table, $criteria = null)
- execute($conn, $query)
- getData($conn, $query, $mapping = null, $prepared_values = null, ?Closure $action = null)
- getRowData(PDO $conn, $table, $criteria = null)
- countData(PDO $conn, $table, $criteria = null)
- copyData(PDO $source_conn, PDO $target_conn, ...)

Notas rápidas:
- A maioria dos métodos usa `TSql*` helpers (TSqlSelect/Insert/Update/Delete) e respeita prepared statements se o `TTransaction` está configurado com 'prep' = 1.
- `getData` suporta mapeamento de colunas e um callback opcional para processar cada linha (útil para grandes volumes sem carregar tudo na memória).
- `copyData` oferece bulk inserts e mapeamento de colunas entre tabelas, cuidando de drivers diferentes (ex.: OCI limita bulk_inserts).

Exemplo: leitura customizada e inserção de dados

```php
// conexão obtida via TConnection or TTransaction
$conn = TConnection::open('my_database');

// consulta customizada e mapeamento
$query = 'SELECT id, name, price FROM produto WHERE active = 1';
$data = TDatabase::getData($conn, $query, null);

foreach ($data as $row) {
    // transformar antes de inserir em outra tabela
    $values = [ 'produto_id' => $row['id'], 'descricao' => $row['name'], 'valor' => $row['price'] ];
    TDatabase::insertData($conn, 'produto_backup', $values);
}
```

Quando usar:
- Migrações simples, scripts de manutenção, cópia entre bases e operações ad-hoc onde não se quer construir um repositório.
- Para consultas e listagens paginadas ou modeladas, prefira `TRepository` + `TCriteria`.

Referência de código: `lib/adianti/database/TDatabase.php`.
