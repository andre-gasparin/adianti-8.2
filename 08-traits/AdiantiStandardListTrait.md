## AdiantiStandardListTrait

Resumo das funcionalidades implementadas em `lib/adianti/base/AdiantiStandardListTrait.php`.

Principais recursos:
- `enableTotalRow()` — adiciona uma linha de total/contagem ao `DataGrid` após carregamento.
- `onInlineEdit($param)` — edição inline de campos: atualiza registro direto e recarrega listagem.
- `onDelete($param)` / `Delete($param)` — confirma e efetua exclusão de registro.
- `onDeleteCollection($param)` / `deleteCollection($param)` — exclusão em massa a partir de seleção na grid.

Integração:
- A trait usa `AdiantiStandardCollectionTrait` e `AdiantiStandardListExportTrait` (exportação suportada).

Exemplo rápido: `enableTotalRow()` pode ser chamado para exibir contagem no rodapé da tabela.

Referência: `lib/adianti/base/AdiantiStandardListTrait.php`.
