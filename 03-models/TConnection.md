# TConnection

Resumo curto (≤750 palavras):
TConnection gerencia a abertura de conexões PDO a partir de configurações (arquivos `.ini` ou `.php`) e fornece um cache simples de informações de conexão. Suporta vários drivers (mysql, pgsql, sqlite, oracle, sqlsrv, odbc, firebird) e aplica configurações específicas por driver (charset, time zone, pragmas).

Métodos principais:
- open($database) — abre conexão a partir do nome do arquivo de configuração (`app/config/<database>.ini` ou `.php`).
- setConfigPath($path) — altera o diretório onde as configurações são buscadas.
- openArray($db) — abre conexão a partir de um array de configuração.
- getDatabaseInfo($database) — lê e retorna as informações de conexão (array) a partir do arquivo .ini/.php.
- setDatabaseInfo($database, $info) — seta no cache a informação de conexão (útil para testes ou runtime dinâmico).

Observações práticas:
- A função `openArray` encapsula instâncias PDO específicas para cada driver e já define `PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION`.
- Para sqlite, o PRAGMA `foreign_keys = ON` é habilitado por padrão quando aplicável.
- `setConfigPath` permite apontar para um diretório alternativo (útil para deploys e testes).

Exemplo: abrir conexão e executar uma consulta simples

```php
TConnection::setConfigPath('app/config');
$conn = TConnection::open('my_database');

$stmt = $conn->query('SELECT COUNT(*) FROM produto');
$count = $stmt->fetchColumn();
```

Referência de código: `lib/adianti/database/TConnection.php`.
