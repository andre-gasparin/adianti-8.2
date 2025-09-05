Exportação de Dados
===================

Visão geral
-----------
O framework fornece helpers para exportar datagrids em CSV, XLS, XML e PDF via `AdiantiStandardListExportTrait`. Também há helpers em `TDatabase::exportToFile` para exportação de tabelas.

Principais pontos
- `AdiantiStandardListExportTrait::onExportCSV/XLS/XML/PDF()` — endpoints prontos para exportar a listagem atual
- `exportToCSV($output)` / `exportToXLS($output)` / `exportToXML($output)` / `exportToPDF($output)` — implementações internas chamadas pelos endpoints
- `TDataGridColumn::disablePrinting()` — marca colunas que não devem aparecer na exportação

Exemplo de uso
```php
use Adianti\Base\AdiantiStandardListExportTrait;

class MyList
{
    use AdiantiStandardListExportTrait;

    // implementar onReload() que retorna objetos
}

// Exportar via botão que chama onExportCSV
```

Notas
- `exportToCSV` usa `fputcsv` e abre uma transação falsa para carregar dados sem efeitos colaterais.
- `exportToPDF` utiliza Dompdf para converter o HTML preparado em PDF.

Onde olhar no código
- `lib/adianti/base/AdiantiStandardListExportTrait.php`
- `lib/adianti/database/TDatabase.php` (método exportToFile)
